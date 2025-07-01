<!-- select-payment.blade.php -->
@extends('layouts.app')

@section('content')
    <!-- Payment Modal -->
    <div class="min-h-screen w-100% flex items-center justify-center bg-gray-50">
        <form action="{{ route('booking.payment.process', $slug) }}" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-4 mb-11">
                <!-- Debit -->
                <label for="debit"
                    class="cursor-pointer group relative flex flex-col items-center p-4 border rounded-lg transition-shadow duration-300 hover:shadow-lg">
                    <input type="radio" name="payment_channel" value="debit" required id="debit" />
                    <img src="https://img.icons8.com/ios-filled/64/0000ff/bank-card-back-side.png" alt="Debit"
                        class="w-[35%] h-auto mb-2" />
                    <span class="text-gray-700 font-medium">Debit</span>
                    <span
                        class="absolute top-2 right-2 w-5 h-5 border-2 rounded-full border-gray-300 peer-checked:border-blue-600 peer-checked:bg-blue-600 transition"></span>
                </label>

                <!-- Kredit -->
                <label for="kredit"
                    class="cursor-pointer group relative flex flex-col items-center p-4 border rounded-lg transition-shadow duration-300 hover:shadow-lg">
                    <input type="radio" name="payment_channel" value="credit" id="kredit" />
                    <img src="https://img.icons8.com/ios-filled/64/0000ff/bank-card-back-side.png" alt="Kredit"
                        class="w-[35%] h-auto mb-2" />
                    <span class="text-gray-700 font-medium">Kredit</span>
                    <span
                        class="absolute top-2 right-2 w-5 h-5 border-2 rounded-full border-gray-300 peer-checked:border-blue-600 peer-checked:bg-blue-600 transition"></span>
                </label>

                <!-- QRIS -->
                <label for="qris"
                    class="cursor-pointer group relative flex flex-col items-center p-4 border rounded-lg transition-shadow duration-300 hover:shadow-lg">
                    <input type="radio" name="payment_channel" value="qris" required id="qris" />
                    <img src="https://img.icons8.com/ios-filled/64/0000ff/wallet--v1.png" alt="QRIS"
                        class="w-[35%] h-auto mb-2 object-contain" />
                    <span class="text-gray-700 font-medium">QRIS</span>
                    <span
                        class="absolute top-2 right-2 w-5 h-5 border-2 rounded-full border-gray-300 peer-checked:border-blue-600 peer-checked:bg-blue-600 transition"></span>
                </label>

                <!-- E-Wallet -->
                <label for="ewallet"
                    class="cursor-pointer group relative flex flex-col items-center p-4 border rounded-lg transition-shadow duration-300 hover:shadow-lg">
                    <input type="radio" name="payment_channel" value="e-wallet" id="ewallet" />
                    <img src="https://img.icons8.com/ios-filled/64/0000ff/wallet--v1.png" alt="E-Wallet"
                        class="w-[35%] h-auto mb-2" />
                    <span class="text-gray-700 font-medium">E-Wallet</span>
                    <span
                        class="absolute top-2 right-2 w-5 h-5 border-2 rounded-full border-gray-300 peer-checked:border-blue-600 peer-checked:bg-blue-600 transition"></span>
                </label>
            </div>




            <button type="submit"
                class="w-full flex shrink-0 rounded-full px-5 bg-ngekos-orange font-bold text-white">Pay
                Now</button>

                <style>
                    button {
                        margin-top: 20px;
                        font-size: 15px;
                        padding: 10px;
                        text-align: center
                    }
                </style>


        </form>
    </div>


    {{-- <h2>Pilih Metode Pembayaran</h2>
<form action="{{ route('booking.payment.process', $slug) }}" method="POST">
    @csrf
    <label><input type="radio" name="payment_channel" value="qris" required> QRIS</label><br>
    <label><input type="radio" name="payment_channel" value="e-wallet"> E-Wallet</label><br>
    <label><input type="radio" name="payment_channel" value="debit"> Debit</label><br>
    <label><input type="radio" name="payment_channel" value="credit"> Kartu Kredit</label><br>

    <button type="submit">Bayar Sekarang</button>
</form> --}}
@endsection
