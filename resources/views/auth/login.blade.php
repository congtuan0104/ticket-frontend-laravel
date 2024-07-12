<x-app-layout>
    <!-- Session Status -->
    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

    <form method="POST" action="{{ route('login.store') }}">
        @csrf

        <div class="bg-white w-[500px] p-5 mt-10 mx-auto rounded-lg">
            <h3 class="font-semibold text-[28px]">Đăng nhập</h3>
            <p>hoặc <b><a href="{{ route('register') }}">đăng ký</a></b> tài khoản mới</p>
            <label class="input input-bordered flex items-center gap-2 mt-5">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email"
                    class="grow border-none outline-none focus:border-none focus:outline-none" placeholder="Email" />
            </label>
            <label class="input input-bordered flex items-center gap-2 mt-6">
                <i class="fas fa-key"></i>
                <input type="password" name="password"
                    class="grow border-none outline-none focus:border-none focus:outline-none" placeholder="Mật khẩu" />
            </label>
            <!-- Remember Me -->
            <div class="flex justify-between items-center mt-5">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">Lưu thông tin</span>
                </label>

                <a class="link link-hover text-sm">Quên mật khẩu</a>
            </div>

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

            <button type="submit" class="btn btn-block btn-primary mt-5">Đăng nhập</button>
        </div>


        {{-- <div class="flex items-center justify-end mt-4"> --}}
        {{-- @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif --}}

        {{-- </div> --}}
    </form>
</x-app-layout>
