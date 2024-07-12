<x-app-layout>
    <div class="relative flex justify-between gap-5">
        <aside class="bg-white shadow-sm sticky top-[60px] w-[300px] max-h-[calc(100vh_-_80px)] overflow-auto z-2">
            <div>
                <div class="p-4 px-5 bg-yellow-600 font-semibold text-white">
                    DANH MỤC SỰ KIỆN
                </div>
                @foreach ($categories as $category)
                    <a href="{{ route('search', ['cate' => $category['eventCategoryId']]) }}"
                        class="mx-4 py-2 pl-1 border-b border-solid border-gray-500 block cursor-pointer hover:font-semibold">
                        {{ $category['eventCategoryName'] }}
                    </a>
                @endforeach
            </div>

            <div>
                <div class="p-4 px-5 bg-yellow-600 font-semibold text-white">
                    ĐỊA ĐIỂM TỔ CHỨC
                </div>
                @foreach ($cities as $city)
                    <a href="{{ route('search', ['city' => $city['cityId']]) }}"
                        class="mx-4 py-2 pl-1 border-b border-solid border-gray-500 block cursor-pointer hover:font-semibold">
                        {{ $city['cityName'] }}
                    </a>
                @endforeach
            </div>

        </aside>
        <div class="flex-1 pt-5">
            <div class="carousel w-full">
                <div id="slide1" class="carousel-item relative w-full">
                    <img src="https://img.daisyui.com/images/stock/photo-1625726411847-8cbb60cc71e6.jpg"
                        class="w-full" />
                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide4" class="btn btn-circle">❮</a>
                        <a href="#slide2" class="btn btn-circle">❯</a>
                    </div>
                </div>
                <div id="slide2" class="carousel-item relative w-full">
                    <img src="https://img.daisyui.com/images/stock/photo-1609621838510-5ad474b7d25d.jpg"
                        class="w-full" />
                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide1" class="btn btn-circle">❮</a>
                        <a href="#slide3" class="btn btn-circle">❯</a>
                    </div>
                </div>
                <div id="slide3" class="carousel-item relative w-full">
                    <img src="https://img.daisyui.com/images/stock/photo-1414694762283-acccc27bca85.jpg"
                        class="w-full" />
                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide2" class="btn btn-circle">❮</a>
                        <a href="#slide4" class="btn btn-circle">❯</a>
                    </div>
                </div>
                <div id="slide4" class="carousel-item relative w-full">
                    <img src="https://img.daisyui.com/images/stock/photo-1665553365602-b2fb8e5d1707.jpg"
                        class="w-full" />
                    <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                        <a href="#slide3" class="btn btn-circle">❮</a>
                        <a href="#slide1" class="btn btn-circle">❯</a>
                    </div>
                </div>
            </div>

            <div class="my-3">
                <div class="flex justify-between">
                    <span class="font-semibold">Sự kiện ca nhạc</span>
                    <a class="cursor-pointer text-gray-700 hover:opacity-75">Xem thêm</a>
                </div>
                <div class="grid grid-cols-3 mt-3 gap-3">
                    @foreach ($events['events'] as $event)
                        <a href="{{ route('event-detail', ['id' => $event['eventId']]) }}"
                            class="border border-gray-600 rounded-lg hover:border-green-600">
                            <object width="100%" data="{{ asset('images/Thumbnail_placeholder.png') }}"
                                type="image/png" class="rounded-lg">
                                <img width="100%" src="{{ $event['src_eventThumbnail'] }}" alt="Event"
                                    class="rounded-lg" />
                            </object>

                            <div class="p-2">
                                <div class="font-semibold line-clamp-1">{{ $event['eventName'] }}</div>
                                <div class="text-green-700 currency">{{ $event['basePrice'] }}</div>
                                <div class="flex justify-between text-gray-700">
                                    <span>{{ date_format(new DateTime($event['startTime']), 'd/m/Y') }}</span>
                                    <span>{{ $event['locationName'] }}</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
