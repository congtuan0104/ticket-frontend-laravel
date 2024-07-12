<x-app-layout>
    <div class="relative flex justify-between gap-5">

        <div class="w-[70%] pt-5">
            <object width="100%" data="https://img.daisyui.com/images/stock/photo-1625726411847-8cbb60cc71e6.jpg"
                type="image/png" class="rounded-md">
                <img width="100%" src="{{ $event['src_eventLogo'] }}" alt="Event" class="rounded-md" />
            </object>

            <div class="my-5">
                <span class="font-semibold text-xl bg-white ml-4 px-3 pt-1 rounded-t-xl">ĐƠN VỊ TỔ CHỨC</span>
                <div class="bg-white rounded-lg p-4 flex gap-5">
                    <div class="size-[200px] rounded-xl border border-green-600">
                        <object width="200" height="200"
                            data="https://images.crunchbase.com/image/upload/c_pad,f_auto,q_auto:eco,dpr_1/qp8rxi2jae4uinry2dv7"
                            type="image/png" class="rounded-xl">
                            <img width="200"
                                src="{{ $organization['avatar'] ? $organization['avatar'] : 'https://images.crunchbase.com/image/upload/c_pad,f_auto,q_auto:eco,dpr_1/qp8rxi2jae4uinry2dv7' }}"
                                alt="Logo đơn vị tổ chức" class="rounded-xl" />
                        </object>
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
                    @if (is_null($tickets) || count($tickets) == 0)
                        <p class="text-center">Chưa có vé nào</p>
                    @else
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
                    @endif

                </div>
            </div>
            <div class="my-5" id="event-evalute">
                <span class="font-semibold text-xl bg-white ml-4 px-3 pt-1 rounded-t-xl">ĐÁNH GIÁ SỰ KIỆN</span>
                <div class="flex flex-col bg-white rounded-lg p-4">
                    @foreach ($evaluates as $evaluate)
                        <div class="flex flex-col border-b border-gray-300 py-2">
                            <div class="flex mb-2">
                                <img src="{{ $evaluate['avatar'] }}" alt="Avatar"
                                    class="size-[50px] rounded-full bg-gray-300" />
                                <div class="flex flex-col ml-3">
                                    <p class="font-semibold text-lg">{{ $evaluate['username'] }}</p>
                                    <div class="rating rating-sm">
                                        <input type="radio" name="rating-{{ $evaluate['evaluateId'] }}"
                                            class="mask mask-star" />
                                        <input type="radio" name="rating-{{ $evaluate['evaluateId'] }}"
                                            class="mask mask-star" />
                                        <input type="radio" name="rating-{{ $evaluate['evaluateId'] }}"
                                            class="mask mask-star" />
                                        <input type="radio" name="rating-{{ $evaluate['evaluateId'] }}"
                                            class="mask mask-star" />
                                        <input type="radio" name="rating-{{ $evaluate['evaluateId'] }}"
                                            class="mask mask-star" />

                                    </div>
                                </div>
                            </div>
                            <p>{{ $evaluate['evaluateContent'] }}</p>
                            <p class="text-gray-500 text-xs mt-2">Đánh giá lúc
                                {{ date_format(new DateTime($evaluate['time']), 'H:i d/m/Y') }}</p>
                        </div>
                    @endforeach

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

            <a type="button" href="{{ route('booking', ['id' => $event['eventId']]) }}"
                class="btn btn-primary w-full flex justify-center items-center gap-2">
                <i class="fas fa-ticket-alt"></i>
                <span>Mua vé sự kiện</span>
            </a>
        </aside>
    </div>

</x-app-layout>
