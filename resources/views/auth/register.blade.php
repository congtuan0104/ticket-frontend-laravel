<x-app-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="bg-white w-[500px] p-5 m-10 rounded-lg">
            {{-- <div role="tablist" class="tabs tabs-boxed">
                <button role="tab" class="tab tab-active">Tài khoản khách hàng</button>
                <button role="tab" class="tab">Tài khoản doanh nghiệp</button>
            </div> --}}
            <h3 class="font-semibold text-[28px] mt-3">Đăng ký</h3>
            <p>Bạn đã có tài khoản? Tới trang <b><a href="{{ route('login.create') }}">đăng nhập</a></b></p>

            <select required name="role" id="role" class="select select-bordered w-full mt-5 pl-6">
                <option selected disabled>Loại tài khoản</option>
                <option value="user">Tài khoản khách hàng</option>
                <option value="organize">Tài khoản doanh nghiệp</option>
            </select>

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
        document.addEventListener('DOMContentLoaded', function() {
            var roleSelect = document.getElementById('role');
            var nameInput = document.getElementById('name');

            roleSelect.addEventListener('change', function() {
                if (roleSelect.value === 'organize') {
                    nameInput.placeholder = 'Tên tổ chức, doanh nghiệp';
                } else {
                    nameInput.placeholder = 'Họ và tên';
                }
            });
        });
    </script>
</x-app-layout>
