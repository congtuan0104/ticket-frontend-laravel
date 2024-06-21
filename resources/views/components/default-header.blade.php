<header class="bg-gradient-to-r from-[#2C4DA3] to-[#40D04F] fixed top-0 inset-x-0 z-10">
    <div class="max-w-screen-xl mx-auto flex justify-between items-center h-[60px] gap-8">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="h-[46px]">
        </a>
        <label class="input input-bordered flex items-center gap-2 flex-1 max-w-screen-sm">
            <input type="text" class="grow border-none" placeholder="Tìm kiếm sự kiện" />
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-6 h-6 opacity-70">
                <path fill-rule="evenodd"
                    d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                    clip-rule="evenodd" />
            </svg>
        </label>

        @if (session()->has('user'))
            <div class="flex items-center gap-8">
                <div class="dropdown dropdown-bottom dropdown-end">
                    <div tabindex="0" role="button" class="btn m-1 btn-ghost text-white">
                        <i class="fas fa-user-circle fa-2x"></i>
                        Xin chào, {{ session('user')['name'] }}
                        <i class="fas fa-sort-down mb-[6px]"></i>
                    </div>
                    <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                        <li><a href="{{ route('profile.edit') }}">Tài khoản</a></li>
                        {{-- <li><a href="{{ route('user-ticket') }}">Vé của tôi</a></li>
                        <li><a href="{{ route('user-event') }}">Sự kiện của tôi</a></li> --}}
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit" class="text-red-600 ">
                                    Đăng xuất
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        @else
            <div class="text-white font-medium">
                <a href="{{ route('register') }}" class="text-white mr-4 hover:opacity-85">Đăng ký</a>
                <a href="{{ route('login.create') }}" class="text-white hover:opacity-85">Đăng nhập</a>
            </div>
        @endif
    </div>
</header>
