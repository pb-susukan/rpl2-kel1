@extends('layouts.master')
@section('content')
<div class="lg:h-[104px] lg:w-[803px] mx-auto text-center">
    <h1 class="lg:text-[48px] text-[36px] font-[500]">Ingin Bermain Futsal?<br />Booking Lapangan Mudah dan Cepat Hanya di Garuda Futsal!</h1>
</div>

<div class="relative w-full xl:w-[1280px] h-[218px] lg:h-[426px] mx-auto mt-[26px] lg:mt-[53px] border">
    <div class="absolute inset-0 shadow-[inset_0px_4px_4px_0px_rgba(0,0,0,0.25)] bg-[linear-gradient(180deg,_rgba(46,49,144,0)_0%,_rgba(46,49,144,0.66)_100%)]"></div>
    <img src="{{ asset('assets/images/homepage.jpg') }}" alt="Banner" class="object-cover w-full h-full">
</div>

<div class="mt-[26px] xl:mt-[53px]" id="jadwal">
    <span class="text-[#000000] xl:ml-[45px] xl:mr-[70px] text-[24px] xl:text-[36px] font-[500]">Jadwal Lapangan</span>
</div>

<div class="mt-[26px] xl:mt-[31px] bg-[#ed7e35] h-[120px] flex py-[35px] mb-[26px] xl:mb-[52px]">
    <div class="flex justify-start items-center ml-10 px-5 py-2 bg-[#ffffff] border border-[#DADADA] rounded-[10px] shadow-md">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-[#000000] mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="4" width="18" height="16" rx="2" ry="2"></rect>
            <line x1="16" y1="2" x2="16" y2="6"></line>
            <line x1="8" y1="2" x2="8" y2="6"></line>
            <line x1="3" y1="10" x2="21" y2="10"></line>
        </svg>
        <span id="currentDate" class="text-[20px] lg:text-[15px] font-[500] text-[#000000]"></span>
    </div>
</div>

<div class="max-h-[856px] max-w-full xl:ml-[45px] xl:mr-[70px] overflow-auto">
    <div id="dp" class="overflow-auto w-full h-full"></div>
</div>

<div class="mt-[54px] xl:mt-[154px] xl:max-h-[594px] xl:ml-[45px] xl:mr-[70px]" id="about">
    <div class="text-center mb-[23px] xl:mb-[57px]">
        <h1 class="text-[36px] md:text-[48px] xl:text-[64px] font-[700]">Tentang Kami</h1>
    </div>
    <div class="flex md:flex-row flex-col items-center gap-8 xl:gap-0">
        <div class="w-full lg:w-6/12">
            <img src="{{ asset('assets/images/tentang-kami.jpg') }}" alt="About" class="object-cover w-[600px] h-[483px] m-auto md:w-[400px] md:h-[400px] xl:w-[504px] xl:h-[483px] rounded-[3%]">
        </div>
        <div class="w-full lg:w-7/12 flex items-center">
            <p class="text-[16px] xl:text-[20px] font-[500] text-justify leading-[32px] xl:leading-[40px]">
                Garuda Futsal Arena, yang terletak di Pabuaran (Bojonggede), merupakan lapangan futsal pertama di kawasan tersebut. Fasilitas yang disediakan meliputi dua lapangan futsal indoor dengan material flooring, satu lapangan futsal indoor dengan material rumput sintetis, dan dua lapangan badminton indoor dengan material flooring. Kami mengundang Anda untuk merasakan pengalaman berolahraga di fasilitas terbaik yang kami sediakan, dengan ketersediaan lapangan dan fasilitas yang dapat disesuaikan dengan kebutuhan acara dan aktivitas Anda.
            </p>
        </div>
    </div>
</div>
@endsection

@push('bottom-script')

<style>
    #dp {
        border-radius: 1rem;
        overflow: hidden;
    }
</style>
@endpush