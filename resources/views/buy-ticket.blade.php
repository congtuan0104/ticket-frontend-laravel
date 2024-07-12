<x-app-layout>
    <form method="POST" action="{{ route('booking.store') }}">
        @csrf
        <div class="relative flex justify-between gap-5 min-w-screen-xl">
            <div class="w-[70%] pt-5">
                <div class="bg-white rounded-lg p-3 flex gap-4">
                    <object width="40%" data="{{ asset('images/Thumbnail_placeholder.png') }}" type="image/png"
                        class="rounded-md">
                        <img width="40%" src="{{ $event['src_eventThumbnail'] }}" alt="Event" class="rounded-md" />
                    </object>
                    <div class="flex flex-col">
                        <h3 class="uppercase font-bold text-lg">Mua vé {{ $event['eventName'] }}</h3>
                        <p>Thông tin sự kiện</p>
                        <p>{{ date_format(new DateTime($event['startTime']), 'd/m/Y') }} -
                            {{ date_format(new DateTime($event['endTime']), 'd/m/Y') }}
                        </p>
                        <p>{{ $event['eventAddress'] }}, {{ $event['locationName'] }}</p>
                    </div>
                </div>

                <div class="mt-5">
                    <div class="flex justify-between px-3">
                        <h3 class="uppercase font-bold text-lg">LOẠI VÉ</h3>
                        <h3 class="uppercase font-bold text-lg">SỐ LƯỢNG</h3>
                    </div>
                    <div class="bg-white rounded-lg p-3">
                        <div class="flex flex-col gap-3 mt-3">
                            @foreach ($tickets as $item)
                                <div class="flex justify-between items-center border-b border-gray-300 pb-3">
                                    <div class="flex flex-col">
                                        <span class="uppercase text-lg">{{ $item['ticketName'] }}</span>
                                        <span class="currency text-green-600">{{ $item['price'] }}</span>
                                    </div>
                                    <input type="number" name="ticket[{{ $item['eventTicketId'] }}][price]"
                                        id="ticket[{{ $item['eventTicketId'] }}][price]" class="hidden"
                                        value="{{ $item['price'] }}" />
                                    <div class="flex items center gap-3">
                                        <button type="button"
                                            class="btn rounded-full size-12 text-3xl flex justify-center items-center"
                                            onclick="decrease('{{ $item['eventTicketId'] }}')">-</button>
                                        <input type="number" name="ticket[{{ $item['eventTicketId'] }}][qty]"
                                            id="ticket[{{ $item['eventTicketId'] }}][qty]"
                                            class="input input-bordered w-full max-w-20" min="0"
                                            onchange="calculateTotal()" value="0" />
                                        <button type="button"
                                            class="btn rounded-full size-12 text-3xl flex justify-center items-center"
                                            onclick="increase('{{ $item['eventTicketId'] }}')">+</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>


            </div>

            <aside
                class="bg-white shadow-sm sticky top-[80px] mt-5 flex-1 flex flex-col max-h-[calc(100vh_-_100px)] overflow-auto z-2 rounded-lg">
                <div class="flex justify-between items-center">
                    <div class="w-full pb-4">
                        <div class="p-4 px-5 bg-yellow-600 font-semibold text-white">
                            THÔNG TIN NGƯỜI ĐẶT VÉ
                        </div>
                        <div class="flex justify-between px-4 py-3">
                            <span>Họ và tên:</span>
                            <span>{{ $user['name'] }}</span>
                        </div>
                        <div class="flex justify-between px-4 py-3">
                            <span>Tổng tiền:</span>
                            <span class="currency" id="total">0</span>
                            <input type="hidden" name="total" id="totalMoney" value="0" />
                        </div>
                        <div class="px-4">
                            <button type="submit" class="btn btn-primary w-full rounded-md">ĐẶT VÉ</button>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </form>

    <script>
        function decrease(id) {
            let input = document.getElementById('ticket[' + id + '][qty]');
            if (input.value > 0) {
                input.value = parseInt(input.value) - 1;
            }
            calculateTotal();
        }

        function increase(id) {
            let input = document.getElementById('ticket[' + id + '][qty]');
            input.value = parseInt(input.value) + 1;
            calculateTotal();
        }

        function calculateTotal() {
            let total = 0;
            const ticketElements = document.querySelectorAll('input[name^="ticket"]');

            ticketElements.forEach(element => {
                if (element.name.endsWith('[qty]')) {
                    const qty = parseInt(element.value);
                    const priceInput = document.getElementById(element.id.replace('qty', 'price'));
                    const price = parseFloat(priceInput.value);
                    total += qty * price;
                }
            });
            document.getElementById('total').innerText = total.toLocaleString("vi-VN", {
                style: "currency",
                currency: "VND",
            });
            document.getElementById('totalMoney').value = total;
        }
    </script>

</x-app-layout>
