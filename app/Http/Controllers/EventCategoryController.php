<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class EventCategoryController extends Controller
{
    //Call API to get Event Category List
     public function eventCategory(Request $request): View
     {
        $eventCategories = Http::get("http://localhost:8080/api/event/eventCategory")->json();

        return view('eventCategory',
            [
                'eventCategories'=> $eventCategories
            ] 
        );
     }

     public function addEventCategory(Request $request)
     {
        
 
         $response = Http::post('http://localhost:8080/api/event/eventCategory', [
             'eventCategoryName' => $request->input('eventCategoryName'),
             'eventCategoryDescription'=> $request->input('eventCategoryDescription')
         ]);
 
         if ($response->successful()) {
             return redirect()->route('eventCategories')->with('success', 'Event Category added successfully!');
         } else {
             return redirect()->route('eventCategories')->with('error', 'Error adding Event Category!');
         }
     }
 
     // Handle deleting a city
     public function deleteEventCategory(Request $request)
     {
        //dd($request->input("eventCategoryId"));
        $req = $request->all();
         $response = Http::delete("http://localhost:8080/api/event/eventCategory?eventCategoryId=".$req["eventCategoryId"]);
         
 
         if ($response->successful()) {
             return redirect()->route('eventCategories')->with('success', 'Event Category deleted successfully!');
         } else {
             return redirect()->route('eventCategories')->with('error', 'Error deleting Event Category!');
         }
     }
 
     // Show edit city form
     public function editEventCategory($id): View
     {
         $eventCategory = Http::get("http://localhost:8080/api/event/eventCategory/{$id}")->json();
         return view('edit-eventCategory', [
             'eventCategory' => $eventCategory
         ]);
     }
 
     // Handle updating a city
     public function updateEventCategory(Request $request)
     {
        //dd($request->all());
        
         $response = Http::put("http://localhost:8080/api/event/eventCategory",
         [
            "eventCategoryId"=> $request->input("eventCategoryId"),
             "eventCategoryName"=> $request->input("eventCategoryName"),
             "eventCategoryDescription" => $request->input("eventCategoryDescription")
         ]
         );
 
         if ($response->successful()) {
            return redirect()->route('eventCategories')->with('success', 'Event Category deleted successfully!');
        } else {
            return redirect()->route('eventCategories')->with('error', 'Error deleting Event Category!');
        }
     }
}
