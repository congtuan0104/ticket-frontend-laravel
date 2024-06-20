<header class="bg-gradient-to-r from-[#2C4DA3] to-[#40D04F] fixed top-0 inset-x-0 z-10">
    <div class="max-w-screen-xl mx-auto flex justify-between items-center h-[60px] gap-8">
        <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="h-[46px]">
        <label class="input input-bordered flex items-center gap-2 flex-1 max-w-screen-sm">
            <input type="text" class="grow border-none" placeholder="Tìm kiếm sự kiện" />
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-6 h-6 opacity-70">
                <path fill-rule="evenodd"
                    d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                    clip-rule="evenodd" />
            </svg>
        </label>
        <div class="text-white font-medium">
            <a href="{{ route('register') }}" class="text-white mr-4 hover:opacity-85">Đăng ký</a>
            <a href="{{ route('login') }}" class="text-white hover:opacity-85">Đăng nhập</a>
        </div>
    </div>
</header>
