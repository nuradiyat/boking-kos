<!-- select-payment.blade.php -->
@extends('layouts.app')

@section('content')
<h2>Pilih Metode Pembayaran</h2>
<form action="{{ route('booking.payment.process', $slug) }}" method="POST">
    @csrf
    <label><input type="radio" name="payment_channel" value="qris" required> QRIS</label><br>
    <label><input type="radio" name="payment_channel" value="e-wallet"> E-Wallet</label><br>
    <label><input type="radio" name="payment_channel" value="debit"> Debit</label><br>
    <label><input type="radio" name="payment_channel" value="credit"> Kartu Kredit</label><br>

    <button type="submit">Bayar Sekarang</button>
</form>



@endsection
