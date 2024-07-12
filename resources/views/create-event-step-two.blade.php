<x-app-layout>
    <div class="flex flex-col items-center justify-center px-12 mt-2 py-4 w-screen">
        <div class="bg-white w-full flex items-center py-4">
            <ul class="steps w-full">
                <li class="step step-primary">Thông tin sự kiện</li>
                <li class="step step-primary">Thời gian và loại vé</li>
                <!-- <li class="step">Khuyến mãi</li> -->
            </ul>
        </div>
        <div class="bg-white w-full px-12 py-4 mt-2">
            <p class="font-semibold text-xl">Thiết lập thời gian</p>
            <form class="w-full flex flex-col justify-between items-center gap-3 mt-2" method="post"
                action="{{route('event.create.step.two.post')}}">
                @csrf

                <div class="flex justify-between w-full">
                    <label class="form-control" for="startTime">
                        <div class="label">
                            <span class="label-text">Thời gian bắt đầu</span>
                        </div>
                        <input type="datetime-local" class="input input-bordered" id="startTime" name="startTime">
                    </label>

                    <label class="form-control" for="endTime">
                        <div class="label">
                            <span class="label-text">Thời gian kết thúc</span>
                        </div>
                        <input type="datetime-local" class="input input-bordered" id="endTime" name="endTime">
                    </label>
                </div>
                <button class="btn btn-neutral self-end mt-2" type="submit">
                    Xác nhận
                </button>
            </form>
        </div>

        <div class="bg-white w-full px-12 py-4 mt-2">
            <p class="font-semibold text-xl">Số lượng vé</p>

            <div class="w-full flex items-center justify-end">
                @include('modals.create-ticket-modal')
                <button class="btn btn-neutral mt-3" onclick="create_ticket_modal.showModal()">
                    Thêm vé
                </button>
            </div>

            <table class="table mt-4">
                <thead>
                    <tr class="bg-gray-100">
                        <th>
                            <div class="px-2 py-3 flex justify-center text-lg items-center">Tên vé</div>
                        </th>
                        <th>
                            <div class="px-2 py-3 flex justify-center text-lg items-center">Mô tả</div>
                        </th>
                        <th>
                            <div class="px-2 py-3 flex justify-center text-lg items-center">Giá vé</div>
                        </th>
                        <th>
                            <div class="px-2 py-3 flex justify-center text-lg items-center">Số lượng tồn</div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($ticketTypes))
                        @foreach ($ticketTypes as $ticketType)
                            <tr>
                                <td>
                                    <div class="px-1 py-2 flex text-md items-center justify-center">
                                        {{$ticketType['ticketName']}}
                                    </div>
                                </td>
                                <td>
                                    <div class="px-1 py-2 flex text-md items-center justify-center">
                                        {{$ticketType['description']}}
                                    </div>
                                </td>
                                <td>
                                    <div class="px-1 py-2 flex text-md items-center justify-center">
                                        {{$ticketType['price']}}
                                    </div>
                                </td>
                                <td>
                                    <div class="px-1 py-2 flex text-md items-center justify-center">
                                        {{$ticketType['inStock']}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>