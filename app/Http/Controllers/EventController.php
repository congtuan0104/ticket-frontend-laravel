<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class EventController extends Controller
{

    public function index(): View
    {
        // gọi api lấy danh sách sự kiện
        $events = Http::get('http://localhost:8080/api/event/event')->json();
        $categories = Http::get('http://localhost:8080/api/event/eventCategory')->json();
        $cities = Http::get('http://localhost:8080/api/event/city')->json();

        return view('home', [
            'events' => $events,
            'categories' => $categories,
            'cities' => $cities
        ]);
    }


    // trang chi tiết sự kiện
    public function show(string $id): View
    {
        // gọi api lấy thông tin chi tiết sự kiện
        $event = Http::get('http://localhost:8080/api/event/event/' . $id)->json();
        $organization = Http::get('http://localhost:8080/api/organization/' . $event['organizationId'])->json();
        $cate = Http::get('http://localhost:8080/api/event/eventCategory/' . $event['eventCategoryId'])->json();
        $tickets = Http::get('localhost:8080/api/ticket/eventTicketType/eventId/' . $event['eventId'])->json();
        $evaluates = Http::get('localhost:8080/api/event/eventEvaluate/search?eventId=' . $event['eventId'])->json();
        // dd($tickets);
        return view('event-detail', [
            'event' => $event,
            'organization' => $organization,
            'cate' => $cate,
            'tickets' => $tickets,
            'evaluates' => $evaluates
        ]);
    }

    //Trang tạo sự kiện
    public function create(): View
    {
        $categories = Http::get('http://localhost:8080/api/event/eventCategory')->json();
        $cities = Http::get('http://localhost:8080/api/event/city')->json();
        return view('create-event', compact(["categories", "cities"]));
    }

    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'eventName' => 'required|max:255',
            'eventCategoryId' => 'required|max:255',
            'thumbnail' => 'required',
            'logo' => 'required',
            'eventAddress' => 'required|max:255',
            'event_location_1' => 'required|max:255',
            'event_location_2' => 'required|max:255',
            'cityId' => 'required|max:255',
            'eventDescription' => 'nullable'
        ]);


        $thumbnailFile = $request->file('thumbnail');
        $uploadThumbnail = Http::attach('file', file_get_contents($thumbnailFile->getRealPath()), $thumbnailFile->getClientOriginalName())
            ->post('http://localhost:8080/api/upload');

        $logoFile = $request->file('logo');

        $uploadLogo = Http::attach('file', file_get_contents($logoFile->getRealPath()), $logoFile->getClientOriginalName())
            ->post('http://localhost:8080/api/upload');

        $inputEvent = ([
            "eventName" => $request->eventName,
            "eventAddress" => $request->eventAddress,
            "eventDescription" => $request->eventDescription ?? '',
            "eventCategoryId" => $request->eventCategoryId,
            "organizationId" => "1",
            "locationName" => $request->event_location_1 . ", " . $request->event_location_2,
            "src_eventThumbnail" => $uploadThumbnail->json()['fileUrl'] ?? '',
            "src_eventLogo" => $uploadLogo->json()['fileUrl'] ?? '',
        ]);

        $res = Http::post('http://localhost:8080/api/event/event', $inputEvent);
        if ($res->successful()) {
            if (empty($request->session()->get('createdEvent'))) {
                $request->session()->put('createdEvent', $res->json());
            } else {
                $request->session()->forget('createdEvent');
                $request->session()->put('createdEvent', $res->json());
            }
            return redirect()->route('event.create.step.two');
        } else
            return redirect()->back();
    }

    public function createStepTwo(Request $request): View
    {
        $createdEvent = $request->session()->get('createdEvent');
        // $eventId = $createdEvent['eventId'];
        $eventId = $createdEvent['eventId'];
        $ticketTypes
            = Http::get('http://localhost:8080/api/ticket/eventTicketType/eventId/' . $eventId)->json();
        return view('create-event-step-two', compact('createdEvent', 'ticketTypes'));
    }

    public function postCreateStepTwo(Request $request): RedirectResponse
    {
        $createdEvent = $request->session()->get('createdEvent');
        $eventId = $createdEvent['eventId'];
        $validate = $request->validate([
            'startTime' => "required",
            "endTime" => "required",
        ]);
        if ($request->startTime > $request->endTime) {
            redirect()->back()->with("error", "Thời gian bắt đầu không thể sau thời gian kết thúc");
        }
        $ticketTypes
            = Http::get('http://localhost:8080/api/ticket/eventTicketType/eventId/' . $eventId)->json();
        if (!$ticketTypes || count($ticketTypes) == 0) {
            redirect()->back()->with("error", "Cần tạo ít nhất 1 loại vé");
        }
        usort($ticketTypes, function ($a, $b) {
            return $a['price'] <=> $b['price'];
        });
        $createdEvent['startTime'] = $request->startTime;
        $createdEvent['endTime'] = $request->endTime;
        $createdEvent['basePrice'] = $ticketTypes[0]['price'];
        $res = Http::put('http://localhost:8080/api/event/event', $createdEvent);
        if ($res->successful()) {
            if (!empty($request->session()->get('createdEvent'))) {
                $request->session()->forget('createdEvent');
            }
            return redirect()->route('organization-event');
        } else {
            return redirect()->back()->with("errors", "Cập nhật thời gian thất bại");
        }
    }

    public function destroy($id)
    {
        $event = Http::get('http://localhost:8080/api/event/event/' . $id);
        if ($event) {
            $res = Http::delete('http://localhost:8080/api/event/event?eventId=' . $id);
            if ($res->successful()) {
                return redirect()->route('organization-event')->with("success", "Đã xóa thành công");
            }
        }
        return redirect()->route('organization-event')->with("error", "Xóa thất bại");
    }

    public function edit($id)
    {
        $event = Http::get('http://localhost:8080/api/event/event/' . $id)->json();
        $categories = Http::get('http://localhost:8080/api/event/eventCategory')->json();
        $cities = Http::get('http://localhost:8080/api/event/city')->json();
        return view('event-edit', compact(['event', 'categories', 'cities']));
    }

    public function update($id, Request $request)
    {
        $event = Http::get('http://localhost:8080/api/event/event/' . $id)->json();
        $validate = $request->validate([
            'eventName' => 'required|max:255',
            'eventCategoryId' => 'required|max:255',
            'eventAddress' => 'required|max:255',
            'thumbnail' => 'nullable',
            'logo' => 'nullable',
            'locationName' => 'required|max:255',
            'cityId' => 'required|max:255',
            'eventDescription' => 'nullable',
            'startTime' => 'required',
            'endTime' => 'required'
        ]);
        if ($event) {
            $inputEvent = ([
                "eventId" => $event['eventId'],
                "eventName" => $request->eventName,
                "eventAddress" => $request->eventAddress,
                "eventDescription" => $request->eventDescription ?? '',
                "eventCategoryId" => $request->eventCategoryId,
                "organizationId" => "1",
                'locationName' => $request->locationName,
                "src_eventThumbnail" => $event['src_eventThumbnail'],
                "src_eventLogo" => $event['src_eventLogo'],
                "startTime" => $request->startTime,
                "endTime" => $request->endTime,
            ]);

            $res = Http::put('http://localhost:8080/api/event/event', $inputEvent);
            if ($res->successful()) {
                return redirect()->route('organization-event')->with("success", "Cập nhật thành công");
            }
        }
        return redirect()->back()->with("error", "Cập nhật thất bại");
    }

}
