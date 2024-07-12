<dialog id="create_ticket_modal" class="modal">
    <div class="bg-white modal-box">
        <p class="font-semibold text-xl">Thiết lập thời gian</p>
        <form class="flex flex-col justify-between items-center gap-3 mt-2 w-full px-12" method="post"
            action="{{route('ticket.store')}}">
            @csrf

            <label class="form-control w-full" for="ticketName">
                <div class="label">
                    <span class="label-text">Tên vé</span>
                </div>
                <input type="text" class="input input-bordered" id="ticketName" name="ticketName">
            </label>

            <label class="form-control w-full mt-2" for="inStock">
                <div class="label">
                    <span class="label-text">Số lượng</span>
                </div>
                <input type="number" class="input input-bordered" id="inStock" name="inStock">
            </label>

            <label class="form-control w-full mt-2" for="price">
                <div class="label">
                    <span class="label-text">Giá tiền</span>
                </div>
                <input type="number" class="input input-bordered" id="price" name="price">
            </label>

            <label class="form-control w-full mt-2" for="description">
                <div class="label">
                    <span class="label-text">Mô tả</span>
                </div>
                <textarea class="textarea textarea-bordered w-full" placeholder="Thông tin sự kiện" id="description"
                    name="description"></textarea>
            </label>

            <div class="flex w-full gap-3 justify-end">
                <button type="submit" class="btn btn-neutral mt-4 self-end">
                    Xác nhận
                </button>
                <button onclick="create_ticket_modal.close()" type="button" class="btn mt-4">
                    Hủy
                </button>
            </div>

        </form>
    </div>
</dialog>