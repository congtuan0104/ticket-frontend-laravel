<x-app-layout>
    <div class="bg-white w-[500px] p-5 m-10 rounded-lg">
        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <h3 class="font-semibold text-[28px] mt-3">
                @if (session('user')['role'] == 'organize')
                    Hồ sơ doanh nghiệp
                @else
                    Thông tin tài khoản
                @endif
            </h3>

            @if (session('status') === 'profile-updated')
                <p class="text-sm text-gray-600">{{ __('Hồ sơ đã được cập nhật thành công.') }}</p>
            @endif

            <input type="text" value={{ session('user')['id'] }} class="hidden" name="userId" id="userId" />

            <label class="flex items-center gap-2 mt-5 flex-col cursor-pointer hover:opacity-85">
                <div class="shrink-0">
                    <img id='preview_img' class="size-32 object-cover rounded-full border border-gray-300"
                        src="{{ session('user')['avatar'] ? session('user')['avatar'] : 'https://i.pinimg.com/originals/e2/7c/87/e27c8735da98ec6ccdcf12e258b26475.png' }}"
                        alt="Avatar" />
                </div>
                <span class="">Thay đổi ảnh đại diện</span>
                <input type="file" accept="image/*" onchange="loadFile(event)" class="hidden" name="avatar"
                    id="avatar" placeholder="Tải avatar của bạn" />
            </label>

            <label class="input input-bordered flex items-center gap-2 mt-5">
                <input type="text" name="name" id="name" required value="{{ session('user')['name'] }}"
                    class="grow border-none outline-none focus:border-none focus:outline-none"
                    placeholder="Họ và tên" />
            </label>

            <label class="input input-bordered flex items-center gap-2 mt-5">
                <input type="email" name="email" required value="{{ session('user')['email'] }}"
                    class="grow border-none outline-none focus:border-none focus:outline-none" placeholder="Email" />
            </label>

            <label class="input input-bordered flex items-center gap-2 mt-5">
                <input type="tel" name="phoneNumber" required value="{{ session('user')['phoneNumber'] }}"
                    class="grow border-none outline-none focus:border-none focus:outline-none"
                    placeholder="Số điện thoại" />
            </label>

            @if (session('user')['role'] == 'organize' && $organize)
                <textarea class="textarea textarea-bordered mt-5 w-full" value="{{ $organize['description'] }}" rows="3"
                    placeholder="Thông tin tổ chức"></textarea>

                <input type="number" value={{ $organize['id'] }} class="hidden" name="oraganizeId" id="oraganizeId" />
            @endif

            {{-- hiện thông báo lỗi từ withError (nếu có) --}}
            @if ($errors->any())
                <div class="alert alert-error mt-5 rounded-md">
                    <div class="flex-1">
                        @foreach ($errors->all() as $error)
                            <p class="text-white">
                                <i class="fas fa-exclamation-triangle mr-1"></i> {{ $error }}
                            </p>
                        @endforeach
                    </div>
                </div>
            @endif

            <button type="submit" class="btn btn-block btn-primary mt-5">Lưu thay đổi</button>

        </form>

        <button class="btn mt-5 btn-block" onclick="change_password.showModal()">Đổi mật khẩu</button>
        <dialog id="change_password" class="modal">
            <div class="modal-box">
                <h3 class="text-lg font-bold">Đổi mật khẩu</h3>
                {{-- <p class="py-4">Press ESC key or click the button below to close</p> --}}
                <div class="modal-action">
                    <form method="POST" action="{{ route('password.update') }}" class="w-full">
                        @csrf
                        @method('PATCH')
                        <!-- if there is a button in form, it will close the modal -->
                        <label class="input input-bordered flex items-center gap-2">
                            <i class="fas fa-key"></i>
                            <input type="password" name="oldPassword" required
                                class="grow border-none outline-none focus:border-none focus:outline-none"
                                placeholder="Mật khẩu cũ" />
                        </label>

                        <label class="input input-bordered flex items-center gap-2 mt-6">
                            <i class="fas fa-key"></i>
                            <input type="password" name="newPassword" required
                                class="grow border-none outline-none focus:border-none focus:outline-none"
                                placeholder="Mật khẩu mới" />
                        </label>

                        <label class="input input-bordered flex items-center gap-2 mt-6">
                            <i class="fas fa-key"></i>
                            <input type="password" name="confirmPassword" required
                                class="grow border-none outline-none focus:border-none focus:outline-none"
                                placeholder="Xác nhận mật khẩu" />
                        </label>
                        <div class="mt-6 flex justify-end">
                            <button type="button" class="btn" onclick="change_password.close()">Hủy</button>
                            <button type="submit" class="btn btn-primary ml-2" type="submit" class="btn">Xác
                                nhận</button>
                        </div>
                    </form>
                </div>
            </div>
        </dialog>
    </div>

    <script>
        function loadFile(event) {
            var input = event.target;
            var file = input.files[0];
            var type = file.type;

            var output = document.getElementById('preview_img');

            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
</x-app-layout>
