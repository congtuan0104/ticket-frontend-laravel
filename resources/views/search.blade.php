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

            <div class="mt-3 mb-5">
                <p class="font-semibold mb-1">Bộ lọc</p>
                <div class="flex gap-3">
                    <select name="cate" class="select select-bordered w-full max-w-xs">
                        <option disabled selected>Thể loại sự kiện</option>
                        <option>Han Solo</option>
                        <option>Greedo</option>
                    </select>

                    <select name="location" class="select select-bordered w-full max-w-xs">
                        <option disabled selected>Địa điểm tổ chức</option>
                        <option>Han Solo</option>
                        <option>Greedo</option>
                    </select>

                    <select name="data" class="select select-bordered w-full max-w-xs">
                        <option disabled selected>Ngày tổ chức</option>
                        <option>Han Solo</option>
                        <option>Greedo</option>
                    </select>

                    <select name="price" class="select select-bordered w-full max-w-xs">
                        <option disabled selected>Giá vé</option>
                        <option>Han Solo</option>
                        <option>Greedo</option>
                    </select>

                    <button class="btn btn-primary"> <i class="fas fa-filter mr-1"></i>Lọc</button>
                </div>
            </div>

            <div class="my-3">
                <span class="font-semibold">Kết quả tìm kiếm của sự kiện <b>{{ $keyword }}</b></span>

                <div class="grid grid-cols-3 mt-3 gap-3">
                    <a href="{{ route('event-detail', ['id' => '12361273']) }}"
                        class="border border-gray-600 rounded-lg hover:border-green-600">
                        <img class="rounded-lg"
                            src="https://ticketbox.vn/_next/image?url=https%3A%2F%2Fimages.tkbcdn.com%2F2%2F608%2F332%2Fts%2Fds%2Ff0%2F38%2F15%2Ff009dd87ed00495db2377515923b910f.png&w=1920&q=75" />

                        <div class="p-2">
                            <div class="font-semibold line-clamp-1">Piano solo</div>
                            <div class="text-green-700">Giá vé</div>
                            <div class="flex justify-between text-gray-700">
                                <span>01/06/2024</span>
                                <span>Tp.Hồ Chí Minh</span>
                            </div>
                        </div>
                    </a>
                    <div class="border border-gray-600 rounded-lg">
                        <img class="rounded-lg"
                            src="https://ticketbox.vn/_next/image?url=https%3A%2F%2Fimages.tkbcdn.com%2F2%2F608%2F332%2Fts%2Fds%2Ff0%2F38%2F15%2Ff009dd87ed00495db2377515923b910f.png&w=1920&q=75" />

                        <div class="p-2">
                            <div class="font-semibold line-clamp-1">Piano solo</div>
                            <div class="text-green-700">Giá vé</div>
                            <div class="flex justify-between text-gray-700">
                                <span>01/06/2024</span>
                                <span>Tp.Hồ Chí Minh</span>
                            </div>
                        </div>
                    </div>
                    <div class="border border-gray-600 rounded-lg">
                        <img class="rounded-lg"
                            src="https://ticketbox.vn/_next/image?url=https%3A%2F%2Fimages.tkbcdn.com%2F2%2F608%2F332%2Fts%2Fds%2Ff0%2F38%2F15%2Ff009dd87ed00495db2377515923b910f.png&w=1920&q=75" />

                        <div class="p-2">
                            <div class="font-semibold line-clamp-1">Piano solo</div>
                            <div class="text-green-700">Giá vé</div>
                            <div class="flex justify-between text-gray-700">
                                <span>01/06/2024</span>
                                <span>Tp.Hồ Chí Minh</span>
                            </div>
                        </div>
                    </div>
                    <div class="border border-gray-600 rounded-lg">
                        <img class="rounded-lg"
                            src="https://ticketbox.vn/_next/image?url=https%3A%2F%2Fimages.tkbcdn.com%2F2%2F608%2F332%2Fts%2Fds%2Ff0%2F38%2F15%2Ff009dd87ed00495db2377515923b910f.png&w=1920&q=75" />

                        <div class="p-2">
                            <div class="font-semibold line-clamp-1">Piano solo</div>
                            <div class="text-green-700">Giá vé</div>
                            <div class="flex justify-between text-gray-700">
                                <span>01/06/2024</span>
                                <span>Tp.Hồ Chí Minh</span>
                            </div>
                        </div>
                    </div>
                    <div class="border border-gray-600 rounded-lg">
                        <img class="rounded-lg"
                            src="https://ticketbox.vn/_next/image?url=https%3A%2F%2Fimages.tkbcdn.com%2F2%2F608%2F332%2Fts%2Fds%2Ff0%2F38%2F15%2Ff009dd87ed00495db2377515923b910f.png&w=1920&q=75" />

                        <div class="p-2">
                            <div class="font-semibold line-clamp-1">Piano solo</div>
                            <div class="text-green-700">Giá vé</div>
                            <div class="flex justify-between text-gray-700">
                                <span>01/06/2024</span>
                                <span>Tp.Hồ Chí Minh</span>
                            </div>
                        </div>
                    </div>
                    <div class="border border-gray-600 rounded-lg">
                        <img class="rounded-lg"
                            src="https://ticketbox.vn/_next/image?url=https%3A%2F%2Fimages.tkbcdn.com%2F2%2F608%2F332%2Fts%2Fds%2Ff0%2F38%2F15%2Ff009dd87ed00495db2377515923b910f.png&w=1920&q=75" />

                        <div class="p-2">
                            <div class="font-semibold line-clamp-1">Piano solo</div>
                            <div class="text-green-700">Giá vé</div>
                            <div class="flex justify-between text-gray-700">
                                <span>01/06/2024</span>
                                <span>Tp.Hồ Chí Minh</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="join mt-3 inline-block">
                        <a type="button" class="join-item btn btn-ghost">«</a>
                        <div class="join-item btn btn-ghost">Trang {{ $page }}</div>
                        <a href="/search?key={{ $keyword }}&page={{ $page + 1 }}" type="button"
                            class="join-item btn btn-ghost">»</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
