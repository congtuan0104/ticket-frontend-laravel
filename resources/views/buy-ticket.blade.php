<x-app-layout>
    <div class="relative flex justify-between gap-5 min-w-screen-xl">
        <div class="w-[70%] pt-5">
            <div class="bg-white rounded-lg p-3 flex gap-4">
                <img width="40%"
                    src="https://ticketbox.vn/_next/image?url=https%3A%2F%2Fimages.tkbcdn.com%2F2%2F608%2F332%2Fts%2Fds%2Ff0%2F38%2F15%2Ff009dd87ed00495db2377515923b910f.png&w=1920&q=75"
                    alt="Event" class="rounded-md" />
                <div class="flex flex-col">
                    <h3 class="uppercase font-bold text-lg">Sự kiện 123</h3>
                    <p>Thông tin sự kiện</p>
                </div>

            </div>

        </div>

        <aside
            class="bg-white shadow-sm sticky top-[80px] mt-5 flex-1 flex flex-col max-h-[calc(100vh_-_100px)] overflow-auto z-2 rounded-lg">
            <div class="flex justify-between items-center">
                <div class="w-full">
                    <div class="p-4 px-5 bg-yellow-600 font-semibold text-white">
                        THÔNG TIN NGƯỜI ĐẶT VÉ
                    </div>
                    <div class="flex justify-between">
                        <span>Họ và tên:</span>
                        <span>{{ $user->name }}</span>
                    </div>
                </div>
            </div>
        </aside>
    </div>

</x-app-layout>
