@extends('layouts.master')
@section('content')

<div class="w-full lg:px-[55px] flex md:flex-row flex-col xl:gap-4 gap-2">
    <div class="w-full md:w-6/12 flex flex-col items-center md:px-0 px-4 gap-8">
        <div class="w-full h-full m-auto  items-center flex justify-center">
            <img src="{{ asset('assets/images/booking.jpg') }}" alt="Banner" class="object-cover w-[494px] h-[317px]  rounded-[10px]">
        </div>
        <div class="w-full h-full font-bold text-[16px] leading-[19.2px] m-auto ">
            <h3 class="text-center">Tata Tertib Lapangan</h3>
            <ol class="list-decimal list-inside mt-[27px] text-justify">
                <li>Dilarang meludah di area lapangan.</li>
                <li>Disarankan menggunakan sepatu khusus olahraga.</li>
                <li>Harap menjaga keamanan dan ketertiban serta kebersihan lapangan.</li>
                <li>Dilarang membuang sampah sembarangan.</li>
                <li>Dilarang membawa minuman beralkohol / narkoba / barang ilegal.</li>
                <li>Harap menjaga barang bawaan masing-masing.</li>
            </ol>
        </div>
    </div>
    <div class="w-full md:w-6/12 flex">
        <div class="w-full bg-[#ed7e35] rounded-[15px] h-full p-[15px] md:py-[30px] md:px-[40px]">
            <div class="bg-white rounded-[10px] pt-[37px] pb-[37px]">
                <h2 class="text-center text-[#ed7e35] text-[24px] md:text-[36px] font-[600] leading-[43.2px] ">isi data berikut ini</h2>
                <form action="{{route('booking.action')}}" method="POST" class="mx-[40px] mt-[42px]">
                    @csrf
                    <div class="flex flex-wrap gap-[20px]">
                        <div class="w-full h-[50px] relative">
                            <svg width="17" height="19" viewBox="0 0 17 19" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute top-[50%] left-[21px] transform -translate-y-1/2">
                                <path d="M10.3214 11.0203H6.67857C2.99018 11.0203 0 13.7291 0 17.0705C0 17.6779 0.543772 18.1705 1.21429 18.1705H15.7857C16.4562 18.1705 17 17.6779 17 17.0705C17 13.7291 14.0098 11.0203 10.3214 11.0203ZM1.859 16.5205C2.15877 14.3513 4.20446 12.6704 6.67857 12.6704H10.3214C12.794 12.6704 14.8408 14.3531 15.1406 16.5205H1.859ZM8.5 9.37028C11.1824 9.37028 13.3571 7.4002 13.3571 4.97017C13.3571 2.54015 11.1824 0.570068 8.5 0.570068C5.81757 0.570068 3.64286 2.54015 3.64286 4.97017C3.64286 7.40055 5.81719 9.37028 8.5 9.37028ZM8.5 2.22011C10.1738 2.22011 11.5357 3.45386 11.5357 4.97017C11.5357 6.48649 10.1738 7.72024 8.5 7.72024C6.82618 7.72024 5.46429 6.48615 5.46429 4.97017C5.46429 3.45386 6.82656 2.22011 8.5 2.22011Z" fill="#DADADA" />
                            </svg>
                            <input type="text" name="name" id="name" class="pl-[63px] w-full h-full border-[1px] border-[#DADADA] rounded-[5px] py-[12px] px-[10px] placeholder:text-[#000000] placeholder:text-[20px] placeholder:font-[400] placeholder:leading-[24px]" placeholder="Nama" required>
                        </div>
                        <div class="w-full h-[50px] relative">
                            <svg width="21" height="15" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute top-[50%] left-[21px] transform -translate-y-1/2">
                                <path d="M0 2.48025C0 1.11583 1.1751 0.0100098 2.625 0.0100098H18.375C19.8229 0.0100098 21 1.11583 21 2.48025V12.3612C21 13.7237 19.8229 14.8314 18.375 14.8314H2.625C1.1751 14.8314 0 13.7237 0 12.3612V2.48025ZM1.96875 2.48025V3.33325L9.04395 8.79865C9.88887 9.4548 11.1111 9.4548 11.9561 8.79865L19.0312 3.33325V2.44551C19.0312 2.14059 18.7359 1.82795 18.375 1.82795H2.625C2.26242 1.82795 1.96875 2.14059 1.96875 2.44551V2.48025ZM1.96875 5.73015V12.3612C1.96875 12.7008 2.26242 12.9787 2.625 12.9787H18.375C18.7359 12.9787 19.0312 12.7008 19.0312 12.3612V5.73015L13.207 10.2306C11.632 11.4464 9.36797 11.4464 7.75605 10.2306L1.96875 5.73015Z" fill="#DADADA" />
                            </svg>
                            <input type="email" name="email" id="email" class="pl-[63px] w-full h-full border-[1px] border-[#DADADA] rounded-[5px] py-[12px] px-[10px] placeholder:text-[#000000] placeholder:text-[20px] placeholder:font-[400] placeholder:leading-[24px]" placeholder="E-mail" required>
                        </div>
                        <div class="w-full h-[50px] relative">
                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute top-[50%] left-[21px] transform -translate-y-1/2">
                                <path d="M7.25361 19.4544L7.97834 19.877C9.18909 20.583 10.5651 20.96 12.001 20.96C16.4193 20.96 20.001 17.3783 20.001 12.96C20.001 8.54168 16.4193 4.95996 12.001 4.95996C7.5827 4.95996 4.00098 8.54168 4.00098 12.96C4.00098 14.3963 4.37821 15.7728 5.08466 16.9838L5.50704 17.7078L4.85355 20.1094L7.25361 19.4544ZM2.00516 22.96L3.35712 17.9915C2.49494 16.5136 2.00098 14.7945 2.00098 12.96C2.00098 7.43711 6.47813 2.95996 12.001 2.95996C17.5238 2.95996 22.001 7.43711 22.001 12.96C22.001 18.4828 17.5238 22.96 12.001 22.96C10.1671 22.96 8.44851 22.4664 6.97086 21.6047L2.00516 22.96ZM8.39232 8.26829C8.5262 8.25888 8.66053 8.25744 8.79459 8.26398C8.84875 8.26754 8.90265 8.2738 8.95659 8.28003C9.11585 8.29842 9.29098 8.39541 9.34986 8.5289C9.64818 9.20532 9.93764 9.88561 10.2182 10.5696C10.2801 10.7206 10.2428 10.9163 10.125 11.1057C10.0652 11.2028 9.97128 11.339 9.86248 11.4783C9.74939 11.623 9.50599 11.8891 9.50599 11.8891C9.50599 11.8891 9.40738 12.0073 9.44455 12.1544C9.45903 12.21 9.50521 12.291 9.54708 12.3591C9.57027 12.3968 9.5918 12.4305 9.60577 12.4538C9.86169 12.8811 10.2057 13.3143 10.6259 13.7216C10.7463 13.8383 10.8631 13.9574 10.9887 14.068C11.457 14.4809 11.9868 14.8183 12.559 15.0682L12.5641 15.0705C12.6486 15.1069 12.692 15.1268 12.8157 15.1793C12.8781 15.2057 12.9419 15.2285 13.0074 15.2458C13.0311 15.252 13.0554 15.2555 13.0798 15.2572C13.2415 15.2669 13.335 15.1632 13.3749 15.1155C14.0984 14.239 14.1646 14.1818 14.1696 14.1822V14.1838C14.2647 14.0836 14.4142 14.0488 14.5476 14.057C14.6085 14.0607 14.6691 14.0724 14.7245 14.0977C15.2563 14.3403 16.1258 14.7187 16.1258 14.7187L16.7073 14.9801C16.8047 15.0271 16.8936 15.1378 16.8979 15.2454C16.9005 15.3123 16.9077 15.4203 16.8838 15.6179C16.8525 15.8766 16.7738 16.1881 16.6956 16.3513C16.6406 16.4658 16.5694 16.5674 16.4866 16.6534C16.3743 16.77 16.2909 16.8408 16.1559 16.9414C16.0737 17.0026 16.0311 17.0314 16.0311 17.0314C15.8922 17.119 15.8139 17.1628 15.6484 17.2509C15.391 17.388 15.1066 17.4668 14.8153 17.4818C14.6296 17.4913 14.4444 17.5047 14.2589 17.4947C14.2507 17.4942 13.6907 17.4082 13.6907 17.4082C12.2688 17.0342 10.9538 16.3336 9.85034 15.362C9.62473 15.1634 9.4155 14.9485 9.20194 14.7359C8.31288 13.8508 7.63982 12.8964 7.23169 11.9936C7.03043 11.5484 6.90299 11.0716 6.90098 10.5809C6.89729 9.97401 7.09599 9.38316 7.46569 8.90182C7.53857 8.80693 7.60774 8.70851 7.72709 8.59582C7.85348 8.47647 7.93392 8.4124 8.02057 8.36807C8.13607 8.30898 8.26293 8.27738 8.39232 8.26829Z" fill="#DADADA" />
                            </svg>
                            <input type="number" name="no_whatsapp" id="no_whatsapp" class="pl-[63px] w-full h-full border-[1px] border-[#DADADA] rounded-[5px] py-[12px] px-[10px] placeholder:text-[#000000] placeholder:text-[20px] placeholder:font-[400] placeholder:leading-[24px]" minlength="9" maxlength="13" placeholder="No. WhatsApp" required>
                        </div>
                        <div class="w-full h-[50px] relative">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute top-[50%] left-[21px] transform -translate-y-1/2">
                                <path d="M7 0V2H13V0H15V2H19C19.5523 2 20 2.44772 20 3V19C20 19.5523 19.5523 20 19 20H1C0.44772 20 0 19.5523 0 19V3C0 2.44772 0.44772 2 1 2H5V0H7ZM18 10H2V18H18V10ZM5 4H2V8H18V4H15V6H13V4H7V6H5V4Z" fill="#DADADA" />
                            </svg>
                            <input type="date" name="tanggal" min="{{ date('Y-m-d') }}" id="tanggal" class="pl-[63px] w-full h-full border-[1px] border-[#DADADA] rounded-[5px] py-[12px] px-[10px] text-[#000000] text-[20px] font-[400] leading-[24px]" placeholder="Tanggal" required>

                        </div>
                        <div class="w-full h-[50px] relative">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute top-[50%] left-[21px] transform -translate-y-1/2">
                                <path d="M10 20C4.47715 20 0 15.5228 0 10C0 4.47715 4.47715 0 10 0C15.5228 0 20 4.47715 20 10C20 15.5228 15.5228 20 10 20ZM10 18C14.4183 18 18 14.4183 18 10C18 5.58172 14.4183 2 10 2C5.58172 2 2 5.58172 2 10C2 14.4183 5.58172 18 10 18ZM11 10H15V12H9V5H11V10Z" fill="#DADADA" />
                            </svg>
                            <select name="jam" id="jam" class="pl-[63px] w-full h-full border-[1px] border-[#DADADA] rounded-[5px] py-[12px] px-[10px] text-[#000000] text-[20px] font-[400] leading-[24px]" required>
                                <option value="" disabled selected>Jam</option>
                                @for ($i = 6; $i <= 23; $i++) <option value="{{ $i }}">{{ $i }}:00</option>
                                    @endfor
                            </select>
                        </div>
                        <div class="w-full h-[50px] relative">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute top-[50%] left-[21px] transform -translate-y-1/2">
                                <path d="M17.422 20.394c-.177-.415-.219-.698-.289-1.118.625-.697 1.189-1.432 1.692-2.204.58-.196 1.271-.438 2.281-.956-.795 1.756-2.08 3.239-3.684 4.278m-8.181 1.212c1.039-.558 1.89-1.193 2.831-1.899 1.012.253 2.079.395 3.194.443l.001.007c.083.435.205.803.362 1.153-1.987.777-4.182.93-6.388.296m-7.24-9.619l1.273 1.217c-.194 1.076-.248 2.069-.234 3.214-.659-1.334-1.04-2.83-1.04-4.418l.001-.013m11.371-9.882l-.758 1.737c-2.139.56-3.384 1.125-5.214 2.107l-2.863-.586c2.128-2.389 5.337-3.74 8.835-3.258m-1.804 11.769c-1.083-.726-1.941-1.464-3.466-2.727l.546-3.576c1.446-.848 2.566-1.239 4.477-1.849.999.687 1.984 1.428 2.934 2.216l-.002.023c-.138 1.739-.42 3.066-.845 4.495-1.196.524-2.41.998-3.644 1.418m-4.758 6.661c-.555-.339-1.072-.728-1.549-1.164-.256-1.921-.361-3.89-.003-5.865l.001-.004 1.716-.745c1.211 1.126 2.346 2.004 3.676 2.928l.063 2.525c-1.323 1.046-2.369 1.738-3.904 2.325m15.108-7.311c-1 .722-1.776 1.225-3.025 1.683l-1.734-2.007c.451-1.449.738-3 .866-4.727l2.499-1.381c1.147 1.872 1.681 4.066 1.394 6.432m-9.918-13.224c-6.623 0-12 5.377-12 12s5.377 12 12 12 12-5.377 12-12-5.377-12-12-12" fill="#DADADA"/>
                            </svg>
                            <select name="jenis_lapangan" id="jenis_lapangan" class="pl-[63px] w-full h-full border-[1px] border-[#DADADA] rounded-[5px] py-[12px] px-[12px] text-[#000000] text-[20px] font-[400] leading-[24px]" required>
                                <option value="" disabled selected>Jenis Lapangan</option>
                                <option value="plester">Plester</option>
                                <option value="sintetis">Sintetis</option>
                            </select>
                        </div>
                        <div class="w-full h-[50px] relative">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute top-[50%] left-[21px] transform -translate-y-1/2">
                                <path d="M10 20C4.47715 20 0 15.5228 0 10C0 4.47715 4.47715 0 10 0C15.5228 0 20 4.47715 20 10C20 15.5228 15.5228 20 10 20ZM10 18C14.4183 18 18 14.4183 18 10C18 5.58172 14.4183 2 10 2C5.58172 2 2 5.58172 2 10C2 14.4183 5.58172 18 10 18ZM11 10H15V12H9V5H11V10Z" fill="#DADADA" />
                            </svg>
                            <input type="number" name="duration" id="duration" min="1" max="100" class="pl-[63px] pr-[32px] w-full h-full border-[1px] border-[#DADADA] rounded-[5px] py-[12px] px-[10px] text-[#000000] text-[20px] font-[400] leading-[24px]" placeholder="Durasi (Jam)" oninput="validateDuration(this)" required>
                        </div>
                        <div class="ml-auto w-7/12 h-[50px] relative">
                            <svg width="22" height="19" viewBox="0 0 22 19" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute top-[50%] left-[21px] transform -translate-y-1/2">
                                <path d="M0.653071 14V0.4H5.39307C6.17974 0.4 6.89974 0.58 7.55307 0.939999C8.2064 1.3 8.7264 1.79333 9.11307 2.42C9.51307 3.04667 9.71307 3.76667 9.71307 4.58C9.71307 5.35333 9.5464 6.04 9.21307 6.64C8.87974 7.22667 8.43307 7.7 7.87307 8.06C7.3264 8.42 6.69974 8.64667 5.99307 8.74L10.0131 14H7.63307L3.81307 8.8H2.59307V14H0.653071ZM2.59307 7.12H5.35307C5.83307 7.12 6.25307 7.00667 6.61307 6.78C6.97307 6.55333 7.25307 6.24667 7.45307 5.86C7.6664 5.47333 7.77307 5.04 7.77307 4.56C7.77307 4.08 7.6664 3.65333 7.45307 3.28C7.25307 2.90667 6.97307 2.61333 6.61307 2.4C6.25307 2.18667 5.83307 2.08 5.35307 2.08H2.59307V7.12ZM11.6673 19V5.2H13.5873V6.56C13.974 6.05333 14.4406 5.66667 14.9873 5.4C15.534 5.13333 16.1406 5 16.8073 5C17.6473 5 18.3873 5.22 19.0273 5.66C19.6806 6.08667 20.194 6.64667 20.5673 7.34C20.9406 8.03333 21.1273 8.78667 21.1273 9.6C21.1273 10.4 20.9406 11.1533 20.5673 11.86C20.194 12.5533 19.6806 13.12 19.0273 13.56C18.3873 13.9867 17.6473 14.2 16.8073 14.2C16.3673 14.2 15.9473 14.14 15.5473 14.02C15.1473 13.9 14.7806 13.72 14.4473 13.48C14.1273 13.24 13.8406 12.96 13.5873 12.64V19H11.6673ZM16.3673 12.46C16.9006 12.46 17.374 12.3267 17.7873 12.06C18.2006 11.7933 18.5273 11.4467 18.7673 11.02C19.0073 10.58 19.1273 10.1067 19.1273 9.6C19.1273 9.09333 19.0073 8.62667 18.7673 8.2C18.5273 7.76 18.2006 7.40667 17.7873 7.14C17.374 6.87333 16.9006 6.74 16.3673 6.74C15.834 6.74 15.354 6.87333 14.9273 7.14C14.514 7.40667 14.1873 7.76 13.9473 8.2C13.7073 8.62667 13.5873 9.09333 13.5873 9.6C13.5873 10.1067 13.7073 10.58 13.9473 11.02C14.1873 11.4467 14.514 11.7933 14.9273 12.06C15.354 12.3267 15.834 12.46 16.3673 12.46Z" fill="#DADADA" />
                            </svg>

                            <input type="number" name="price" id="price" class="pl-[63px] w-full h-full border-[1px] border-[#DADADA] rounded-[5px] py-[12px] px-[10px] text-[#000000] text-[20px] font-[400] leading-[24px] disabled:bg-gray-100" placeholder="Harga" disabled>
                        </div>

                        <button type="submit" class="w-full h-[50px] bg-[#ed7e35] rounded-[10px] text-white font-bold text-[18px] md:text-[24px] leading-[28.8px] mt-[20px] uppercase">Booking</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('bottom-script')
<script>
    const duration = document.getElementById('duration');
    const jam = document.getElementById('jam');
    const price = document.getElementById('price');
    const tanggal = document.getElementById('tanggal');
    const jenisLapangan = document.getElementById('jenis_lapangan');

    // Jika tanggal berubah, atur opsi jam berdasarkan hari
    if (tanggal) {
        tanggal.addEventListener('change', function () {
            const date = new Date(tanggal.value);
            const day = date.getDay();
            jam.innerHTML = '<option value="" disabled selected>Jam</option>';
            const startJam = (day == 0 || day == 6) ? 6 : 15;
            for (let i = startJam; i <= 23; i++) {
                jam.innerHTML += `<option value="${i}">${i}:00</option>`;
            }
        });
    }

    // Fungsi untuk menghitung harga
    function calculatePrice() {
        if (jenisLapangan.value && duration.value) {
            let hargaPerJam = 0;

            if (jenisLapangan.value === 'plester') {
                hargaPerJam = 80000;
            } else if (jenisLapangan.value === 'sintetis') {
                hargaPerJam = 100000;
            }

            if (hargaPerJam > 0) {
                price.value = hargaPerJam * duration.value;
            } else {
                price.value = 0; // Harga default jika jenis lapangan tidak valid
            }
        } else {
            price.value = 0; // Jika belum ada durasi atau jenis lapangan
        }
    }

    // Hitung harga saat jenis lapangan berubah
    if (jenisLapangan) {
        jenisLapangan.addEventListener('change', calculatePrice);
    }

    // Hitung harga saat durasi berubah
    if (duration) {
        duration.addEventListener('change', calculatePrice);
    }

    // Validasi durasi berdasarkan jam yang dipilih
    if (jam && duration) {
        jam.addEventListener('change', function () {
            const selectedJam = parseInt(jam.value);
            duration.setAttribute('max', 24 - selectedJam);
        });
    }

    // Validasi durasi input
    function validateDuration(input) {
        if (input.value < parseInt(input.min)) {
            input.value = input.min;
        }
        if (input.value > parseInt(input.max)) {
            input.value = input.max;
        }
    }
</script>
@endpush