<x-app-layout>
    <div class="relative flex justify-between gap-5">

        <div class="w-[70%] pt-5">
            <img src="https://img.daisyui.com/images/stock/photo-1625726411847-8cbb60cc71e6.jpg" alt="Ảnh mô tả"
                class="w-full rounded-lg mb-3" />

            <div class="my-5">
                <span class="font-semibold text-xl bg-white ml-4 px-3 pt-1 rounded-t-xl">ĐƠN VỊ TỔ CHỨC</span>
                <div class="bg-white rounded-lg p-4 flex gap-5">
                    <div class="size-[200px] rounded-xl border border-green-600">
                        <img width="200" height="200"
                            src={{ $organization['avatar'] ? $organization['avatar'] : 'https://vn4u.vn/wp-content/uploads/2023/09/logo-co-tinh-nhat-quan-2.png' }}
                            alt="Logo đơn vị tổ chức" class="rounded-xl" />
                    </div>

                    <div class="flex-1">
                        <p class="text-lg">{{ $organization['name'] }}</p>

                        <p class="text-justify mt-3">
                            {{ $organization['description'] }}
                        </p>

                    </div>
                </div>
            </div>

            <div class="my-5">
                <span class="font-semibold text-xl bg-white ml-4 px-3 pt-1 rounded-t-xl">GIỚI THIỆU SỰ KIỆN</span>
                <div class="bg-white rounded-lg p-4 flex gap-5 text-justify">
                    {{ $event['eventDescription'] }}
                </div>
            </div>

            <div class="my-5" id="event-ticket">
                <span class="font-semibold text-xl bg-white ml-4 px-3 pt-1 rounded-t-xl">CÁC LOẠI VÉ</span>
                <div class="flex flex-col bg-white rounded-lg p-4 ">
                    @foreach ($tickets as $ticket)
                        <div class="flex justify-between border-b border-gray-300 py-3">
                            <div class="flex flex-col gap-4">
                                <p class="uppercase text-lg">{{ $ticket['ticketName'] }}</p>
                                <p>{{ $ticket['description'] }}</p>
                            </div>
                            <div class="flex flex-col gap-2 items-end">
                                <p class="text-green-700 text-md mr-2 currency">{{ $ticket['price'] }}</p>
                                <button class="btn rounded-full"><i class="fas fa-cart-plus mr-1"></i> MUA</button>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="my-5" id="event-evalute">
                <span class="font-semibold text-xl bg-white ml-4 px-3 pt-1 rounded-t-xl">ĐÁNH GIÁ SỰ KIỆN</span>
                <div class="flex flex-col bg-white rounded-lg p-4">
                    <div class="flex flex-col border-b border-gray-300 py-2">
                        <div class="flex mb-2">
                            <div class="size-[50px] rounded-full bg-gray-300"></div>
                            <div class="flex flex-col ml-3">
                                <p class="font-semibold text-lg">Nguyễn Văn A</p>
                                <div class="rating rating-sm">
                                    <input type="radio" disabled name="rating-2" class="mask mask-star-2" />
                                    <input type="radio" disabled name="rating-2" class="mask mask-star-2" checked />
                                    <input type="radio" disabled name="rating-2" class="mask mask-star-2" />
                                    <input type="radio" disabled" class="mask mask-star-2" />
                                    <input type="radio" disabled name="rating-2" class="mask mask-star-2" />
                                </div>
                            </div>
                        </div>
                        <p>Tốt, đáng giá tham gia Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent
                            scelerisque semper eros .</p>
                        <p class="text-gray-500 text-xs">Đánh giá lúc 10:24 01/06/2024</p>
                    </div>
                    <div class="flex flex-col border-b border-gray-300 py-2">
                        <div class="flex mb-2">
                            <div class="size-[50px] rounded-full bg-gray-300"></div>
                            <div class="flex flex-col ml-3">
                                <p class="font-semibold text-lg">Nguyễn Văn A</p>
                                <div class="rating rating-sm">
                                    <input type="radio" disabled name="rating-2" class="mask mask-star-2" />
                                    <input type="radio" disabled name="rating-2" class="mask mask-star-2" checked />
                                    <input type="radio" disabled name="rating-2" class="mask mask-star-2" />
                                    <input type="radio" disabled" class="mask mask-star-2" />
                                    <input type="radio" disabled name="rating-2" class="mask mask-star-2" />
                                </div>
                            </div>
                        </div>
                        <p>Tốt, đáng giá tham gia Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent
                            scelerisque semper eros .</p>
                        <p class="text-gray-500 text-xs">Đánh giá lúc 10:24 01/06/2024</p>
                    </div>
                    <div class="flex flex-col border-b border-gray-300 py-2">
                        <div class="flex mb-2">
                            <div class="size-[50px] rounded-full bg-gray-300"></div>
                            <div class="flex flex-col ml-3">
                                <p class="font-semibold text-lg">Nguyễn Văn A</p>
                                <div class="rating rating-sm">
                                    <input type="radio" disabled name="rating-2" class="mask mask-star-2" />
                                    <input type="radio" disabled name="rating-2" class="mask mask-star-2" checked />
                                    <input type="radio" disabled name="rating-2" class="mask mask-star-2" />
                                    <input type="radio" disabled" class="mask mask-star-2" />
                                    <input type="radio" disabled name="rating-2" class="mask mask-star-2" />
                                </div>
                            </div>
                        </div>
                        <p>Tốt, đáng giá tham gia Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent
                            scelerisque semper eros .</p>
                        <p class="text-gray-500 text-xs">Đánh giá lúc 10:24 01/06/2024</p>
                    </div>
                </div>
            </div>

        </div>
        <aside
            class="bg-white shadow-sm sticky top-[80px] flex-1 flex flex-col max-h-[calc(100vh_-_100px)] overflow-auto z-2 p-4 rounded-lg">
            <h3 class="font-bold text-[20px] line-clamp-2 uppercase">{{ $event['eventName'] }}</h3>

            <div class="flex flex-col mt-3 flex-1 gap-5">
                <div class="flex gap-3">
                    <div class="bg-blue-50 rounded-full flex justify-center items-center size-10">
                        <i class="fas fa-calendar-alt text-green-500"></i>
                    </div>
                    <div class="flex flex-col">
                        <p class="text-gray-400 text-[12px]">Thời gian</p>
                        <p class="font-bold text-[16px]">
                            {{ date_format(new DateTime($event['startTime']), 'd/m/Y') }} -
                            {{ date_format(new DateTime($event['endTime']), 'd/m/Y') }}
                        </p>
                    </div>
                </div>
                <div class="flex gap-3">
                    <div class="bg-blue-50 rounded-full flex justify-center items-center size-10">
                        <i class="fas fa-map-marker-alt text-green-500"></i>
                    </div>
                    <div class="flex flex-col flex-1">
                        <p class="text-gray-400 text-[12px]">Địa điểm</p>
                        <p class="font-bold text-[16px]">{{ $event['eventAddress'] }}, {{ $event['locationName'] }}
                        </p>
                    </div>
                </div>
                <div class="flex gap-3">
                    <div class="bg-blue-50 rounded-full flex justify-center items-center size-10">
                        <i class="fab fa-mendeley text-green-500"></i>
                    </div>
                    <div class="flex flex-col flex-1">
                        <p class="text-gray-400 text-[12px]">Loại sự kiện</p>
                        <a href="{{ route('search', ['cate' => $cate['eventCategoryId']]) }}"
                            class="font-bold text-[16px] hover:opacity-85">{{ $cate['eventCategoryName'] }}</a>
                    </div>
                </div>
            </div>

            <a type="button" href="#event-ticket"
                class="btn btn-primary w-full flex justify-center items-center gap-2">
                <i class="fas fa-ticket-alt"></i>
                <span>Mua vé sự kiện</span>
            </a>
        </aside>
    </div>

</x-app-layout>
