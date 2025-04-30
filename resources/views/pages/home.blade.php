{{-- kita memberi tahu kita akan menggunakan ini --}}
@extends('layouts.app')

{{-- lalu kita panggil --}}
@section('content')
    {{-- background --}}
    <div id="Background"
        class="absolute top-0 w-full h-[280px] rounded-bl-[75px] bg-[linear-gradient(180deg,#F2F9E6_0%,#D2EDE4_100%)]">
    </div>

    {{-- navbar --}}
    <div id="TopNav" class="relative flex items-center justify-between px-5 mt-[60px]">
        <div class="flex flex-col gap-1">
            <p>Good day,</p>
            <h1 class="font-bold text-xl leading-[30px]">Explore Cozy Home</h1>
        </div>
        <a href="#" class="w-12 h-12 flex items-center justify-center shrink-0 rounded-full overflow-hidden bg-white">
            <img src="assets/images/icons/notification.svg" class="w-[28px] h-[28px]" alt="icon">
        </a>
    </div>

    {{-- category --}}
    <div id="Categories" class="swiper w-full overflow-x-hidden mt-[30px]">
        <div class="swiper-wrapper">
            {{-- agar data terus bertambah sesuai dengan yg di database --}}
            @foreach ($categories as $category )
            <div class="swiper-slide !w-fit pb-[30px]">
                <a href="categories.html" class="card">
                    <div
                        class="flex flex-col items-center w-[120px] shrink-0 rounded-[40px] p-4 pb-5 gap-3 bg-white shadow-[0px_12px_30px_0px_#0000000D] text-center">
                        <div class="w-[70px] h-[70px] rounded-full flex shrink-0 overflow-hidden">
                            {{-- memanggil gambar nya sebelum assets/images/thumbnails/flats.png
                            ganti jadi kalau memanggil gambar/asset sedikit berbeda 
                            {{ asset('storage/' . $category->image) }} --}}
                            <img src="{{ asset('storage/' . $category->image) }}" class="w-full h-full object-cover"
                                alt="thumbnail">
                        </div>
                        <div class="flex flex-col gap-[2px]">
                            {{-- memanggil nama kategori --}}
                            <h3 class="font-semibold">{{ $category->name }}</h3>
                            <p class="text-sm text-ngekos-grey">1,304 Kos</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>

    {{-- populer kos --}}
    <section id="Popular" class="flex flex-col gap-4">
        <div class="flex items-center justify-between px-5">
            <h2 class="font-bold">Popular Kos</h2>
            <a href="#">
                <div class="flex items-center gap-2">
                    <span>See all</span>
                    <img src="assets/images/icons/arrow-right.svg" class="w-6 h-6 flex shrink-0" alt="icon">
                </div>
            </a>
        </div>
        <div class="swiper w-full overflow-x-hidden">
            {{-- data Boarding house --}}
            @foreach ($popularBoardingHouses as $boardingHouse)     
            <div class="swiper-wrapper">
                <div class="swiper-slide !w-fit">
                    <a href="details.html" class="card">
                        <div
                            class="flex flex-col w-[250px] shrink-0 rounded-[30px] border border-[#F1F2F6] p-4 pb-5 gap-[10px] hover:border-[#91BF77] transition-all duration-300">
                            <div class="flex w-full h-[150px] shrink-0 rounded-[30px] bg-[#D9D9D9] overflow-hidden">
                                <img src="{{ asset('storage/' . $boardingHouse->thumbnail) }}" class="w-full h-full object-cover"
                                    alt="thumbnail">
                            </div>
                            <div class="flex flex-col gap-3">
                                <h3 class="font-semibold text-lg leading-[27px] line-clamp-2 min-h-[54px]">
                                    {{ $boardingHouse->name }}</h3>
                                <hr class="border-[#F1F2F6]">
                                <div class="flex items-center gap-[6px]">
                                    <img src="assets/images/icons/location.svg" class="w-5 h-5 flex shrink-0"
                                        alt="icon">
                                    <p class="text-sm text-ngekos-grey">Singapore City</p>
                                </div>
                                <div class="flex items-center gap-[6px]">
                                    <img src="assets/images/icons/3dcube.svg" class="w-5 h-5 flex shrink-0"
                                        alt="icon">
                                    <p class="text-sm text-ngekos-grey">In Hotels</p>
                                </div>
                                <div class="flex items-center gap-[6px]">
                                    <img src="assets/images/icons/profile-2user.svg" class="w-5 h-5 flex shrink-0"
                                        alt="icon">
                                    <p class="text-sm text-ngekos-grey">4 People</p>
                                </div>
                                <hr class="border-[#F1F2F6]">
                                <p class="font-semibold text-lg text-ngekos-orange">Rp 4.593.444<span
                                        class="text-sm text-ngekos-grey font-normal">/bulan</span></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection
