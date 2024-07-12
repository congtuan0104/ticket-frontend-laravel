<x-app-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <div class="bg-white w-[500px] p-5 mt-10 mx-auto rounded-lg">
            <div role="tablist" class="tabs tabs-boxed">
                <a onclick="changeRole('user')" role="tab" class="tab tab-active tab-user">Tài khoản khách
                    hàng</a>
                <a onclick="changeRole('organize')" role="tab" class="tab tab-organize">Tài khoản doanh
                    nghiệp</a>
            </div>
            <input id="role" name="role" value="user" type="text" class="hidden" />

            <h3 class="font-semibold text-[28px] mt-3">Đăng ký</h3>
            <p>Bạn đã có tài khoản? Tới trang <b><a href="{{ route('login.create') }}">đăng nhập</a></b></p>

            <label class="flex items-center gap-2 mt-5 flex-col cursor-pointer hover:opacity-85">
                <div class="shrink-0">
                    <img id='preview_img' class="size-32 object-cover rounded-full"
                        src="https://i.pinimg.com/originals/e2/7c/87/e27c8735da98ec6ccdcf12e258b26475.png"
                        alt="Avatar" />
                </div>
                <span class="">Chọn ảnh đại diện</span>
                <input type="file" accept="image/*" onchange="loadFile(event)" class="hidden" name="avatar"
                    id="avatar" placeholder="Tải avatar của bạn" />
            </label>

            <label class="input input-bordered flex items-center gap-2 mt-5">
                <input type="text" name="name" id="name" required
                    class="grow border-none outline-none focus:border-none focus:outline-none"
                    placeholder="Họ và tên" />
            </label>

            <label class="input input-bordered flex items-center gap-2 mt-5">
                <input type="email" name="email" required
                    class="grow border-none outline-none focus:border-none focus:outline-none" placeholder="Email" />
            </label>

            <label class="input input-bordered flex items-center gap-2 mt-5">
                <input type="tel" name="phoneNumber" required
                    class="grow border-none outline-none focus:border-none focus:outline-none"
                    placeholder="Số điện thoại" />
            </label>

            <label class="input input-bordered flex items-center gap-2 mt-6">
                <input type="password" name="password" required
                    class="grow border-none outline-none focus:border-none focus:outline-none" placeholder="Mật khẩu" />
            </label>

            <label class="input input-bordered flex items-center gap-2 mt-6">
                <input type="password" name="confirmPassword" required
                    class="grow border-none outline-none focus:border-none focus:outline-none"
                    placeholder="Xác nhận mật khẩu" />
            </label>

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

            <label for="remember_me" class="inline-flex items-center mt-5">
                <input id="remember_me" type="checkbox" checked
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">Tôi đồng ý với các điều khoản</span>
            </label>


            <button type="submit" class="btn btn-block btn-primary mt-5">Đăng ký</button>
        </div>

    </form>

    <script>
        function changeRole(role) {
            var roleInput = document.getElementById('role');
            roleInput.value = role;

            var tabs = document.querySelectorAll('.tab');
            tabs.forEach(tab => {
                tab.classList.remove('tab-active');
            });

            var tab = document.querySelector('.tab-' + role);
            tab.classList.add('tab-active');

            var nameInput = document.getElementById('name');
            if (role === 'organize') {
                nameInput.placeholder = 'Tên tổ chức, doanh nghiệp';
            } else {
                nameInput.placeholder = 'Họ và tên';
            }
        }

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
