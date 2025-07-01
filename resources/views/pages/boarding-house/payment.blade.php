@extends('layouts.app')

@section('content')
    <div class="w-screen min-h-screen flex justify-center items-center" id="">
        <div class="swiper-slide !w-fit" id="bukti-transaksi">
            <div
                class="flex flex-col w-[500px] shrink-0 rounded-[30px] border border-[#F1F2F6] p-4 pb-5 gap-[10px] hover:border-[#91BF77] transition-all duration-300">
                <div class="flex w-full h-[150px] shrink-0 rounded-[30px] bg-[#D9D9D9] overflow-hidden">

                    <img src="{{ asset('storage/' . $boardingHouse->thumbnail) }}" class="w-full h-full object-cover"
                        alt="thumbnail">
                </div>
                <div class="flex flex-col gap-3">
                    <h3 class="font-semibold text-lg leading-[27px] line-clamp-2 min-h-[54px]">Bukti Transaksi</h3>
                    <hr class="border-[#F1F2F6]">
                    <div class="flex items-center gap-[6px]">
                                            <p class="text-sm text-ngekos-grey">Kos :

                            {{ $boardingHouse->name }}</p>
                    </div>
                    <div class="flex items-center gap-[6px]">
                                            <p class="text-sm text-ngekos-grey">Room : {{ $room->name }}</p>
                    </div>
                    <div class="flex items-center gap-[6px]">
                                         <p class="text-sm text-ngekos-grey">Nama :{{ $transaction->name }}</p>
                    </div>
                    <div class="flex items-center gap-[6px]">
                        
                        <p class="text-sm text-ngekos-grey">Durasi : {{ $transaction->duration }} </p>
                    </div>
                    <div class="flex items-center gap-[6px]">
                        
                        <p class="text-sm text-ngekos-grey">Mulai :
                            {{ \Carbon\Carbon::parse($transaction->start_date)->isoFormat('D MMMM YYYY') }}
                        </p>
                    </div>
                    <div class="flex items-center gap-[6px]">
                        
                        {{-- karena data durarasi saya bertipe bukan int tidak bisa di jumlahlah jadi eeror kita 
                        Solusi: lakukan casting menjadi integer sebelum dipakai di addMonths()
Anda bisa ubah: addMonths((int) atau addMonths(intval($transaction->duration)) --}}
                        <p class="text-sm text-ngekos-grey">Berakhir :
                            {{ \Carbon\Carbon::parse($transaction->start_date)->addMonths((int) $transaction->duration)->isoFormat('D MMMM YYYY') }}
                        </p>

                    </div>
                    <div class="flex items-center gap-[6px]">
                        

                        <p class="text-sm text-ngekos-grey">Total : Rp
                            {{ number_format($transaction->total_amount, 0, ',', '.') }}</p>
                    </div>
                    <hr class="border-[#F1F2F6]">

                    <button onclick="downloadTransaksiPDF()"
                        class="bg-green-500 hover:bg-green-600 text-ngekos-grey py-2 px-4 rounded-lg transition-all duration-300">
                        Download Bukti Transaksi
                    </button>
                </div>
            </div>

        </div>

    </div>

    <script>
        function downloadTransaksiPDF() {
            const element = document.getElementById('bukti-transaksi');
            const opt = {
                margin: 0.5,
                filename: 'bukti-transaksi.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'a4',
                    orientation: 'portrait'
                }
            };
            html2pdf().set(opt).from(element).save().then(() => {
                button.style.display = 'block'; // tampilkan lagi setelah selesai
            });
        }
    </script>



    {{-- <div class="min-h-screen w-100% flex items-center justify-cente">
        <div class="p-6">
            <h1 class="text-green-600 text-2xl font-bold mb-4">✅ Pembayaran Berhasil!</h1>

            <div class="bg-white p-4 rounded-xl shadow-md">
                <p><strong>Kos:</strong> {{ $boardingHouse->name }}</p>
                <p><strong>Room:</strong> {{ $room->name }}</p>
                <p><strong>Nama:</strong> {{ $transaction->name }}</p>
                <p><strong>Durasi:</strong> {{ $transaction->duration }} bulan</p>
                <p><strong>Mulai:</strong> {{ \Carbon\Carbon::parse($transaction->start_date)->isoFormat('D MMMM YYYY') }}
                </p>
                <p><strong>Metode Pembayaran:</strong> {{ ucfirst(str_replace('_', ' ', $transaction->payment_method)) }}
                </p>
                <p><strong>Total:</strong> Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}</p>
            </div>
        </div>
    </div> --}}
@endsection
