<x-app-layout>
    <div class="flex flex-col items-center justify-center px-12 py-4 w-screen">
        <div class="w-full flex justify-between border-black border-b border-solid pb-2 items-end">
            <div class="font-bold text-2xl">
                Các sự kiện đã tạo
            </div>
            <a class="btn btn-neutral" href="{{route('event.create', [])}}">
                <i class="fa fa-plus-circle"></i>
                Tạo sự kiện
            </a>
        </div>
        <div class="flex w-full mt-12 grid grid-cols-3 gap-3">
            @foreach ($events['events'] as $event)
                <div class="border border-gray-600 rounded-lg hover:border-green-600">
                    <img class="rounded-lg"
                        src="https://ticketbox.vn/_next/image?url=https%3A%2F%2Fimages.tkbcdn.com%2F2%2F608%2F332%2Fts%2Fds%2Ff0%2F38%2F15%2Ff009dd87ed00495db2377515923b910f.png&w=1920&q=75" />

                    <div class="p-2">
                        <div class="font-semibold line-clamp-1">{{ $event['eventName'] }}</div>
                        <div class="text-green-700 currency">{{ $event['basePrice'] }}</div>
                        <div class="flex justify-between text-gray-700">
                            <span>{{ date_format(new DateTime($event['startTime']), 'd/m/Y') }}</span>
                            <span>{{ $event['locationName'] }}</span>
                        </div>

                        <div class="flex justify-end gap-4">
                            <a href="" class="btn btn-outline btn-info"><i class="fa fa-edit"></i></a>
                            <form method="post" action="{{route('event.destroy', $event['eventId'])}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Bạn có muốn xóa sự kiện này không')"
                                    class="btn btn-outline btn-error"><i class="fa fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>