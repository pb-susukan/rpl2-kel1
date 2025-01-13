<navbar class="sticky top-0 flex items-center justify-between md:justify-normal py-[1.58rem] md:h-[130px] w-full xl:mb-[26px] px-[24px] md:px-[48px] text-[#ed7e35] bg-white z-10">
    <!-- Logo Section -->
    <div class="max-w-36 max-h-18 md:max-w-44 md:max-h-24 overflow-hidden">
        <a href="/" class="block w-full h-full">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="object-contain w-[100px] h-[100px]">
        </a>
    </div>

    <!-- Navigation Links for Desktop -->
    <div class="hidden md:flex w-full justify-center items-center gap-8">
        <div class="w-7/12 flex justify-end gap-[53px]">
            <a class="text-lg" href="{{ route('home') }}">Home</a>
            <a class="text-lg" href="{{ route('home') }}#jadwal">Jadwal Lapangan</a>
            <a class="text-lg" href="{{ route('home') }}#about">Tentang Kami</a>
        </div>
        <div class="w-5/12 flex gap-[32px] justify-end">
            <span class="text-xl font-semibold bg-[#FFC300AD] px-7 py-2 flex items-center justify-center rounded-xl text-[#000000]">
                <a href="/booking">Booking</a>
            </span>
            <span class="text-xl font-semibold bg-[#ed7e35] px-7 py-2 flex items-center justify-center rounded-xl text-[#ffffff]">
                <a href="/login">Login</a>
            </span>
        </div>
    </div>

    <!-- Mobile Menu Button -->
    <div class="flex items-center md:hidden">
        <button class="h-8 w-8 flex items-center justify-center" id="menu">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>

    <!-- Mobile Navigation Menu -->
    <div class="hidden w-full h-full bg-white fixed top-0 left-0 z-20" id="mobile-menu">
        <div class="flex flex-col items-center justify-center gap-8 h-full">
            <a class="text-lg" href="{{ route('home') }}">Home</a>
            <a class="text-lg" href="{{ route('home') }}#jadwal">Jadwal Lapangan</a>
            <a class="text-lg" href="{{ route('home') }}#about">Tentang Kami</a>
            <span class="text-xl font-semibold bg-[#FFC300AD] px-7 py-2 flex items-center justify-center rounded-xl">
                <a href="/booking">Booking</a>
            </span>
            <span class="text-xl font-semibold bg-[#2E3190] px-7 py-2 flex items-center justify-center rounded-xl text-[#FFC300]">
                <a href="/login">Login</a>
            </span>
        </div>
    </div>
</navbar>