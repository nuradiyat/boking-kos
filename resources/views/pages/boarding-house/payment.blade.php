@extends('layouts.app')

@section('content')
    @extends('layouts.app')

@section('content')
    <div class="p-6">
        <h1 class="text-green-600 text-2xl font-bold mb-4">✅ Pembayaran Berhasil!</h1>

        <div class="bg-white p-4 rounded-xl shadow-md">
            <p><strong>Kos:</strong> {{ $boardingHouse->name }}</p>
            <p><strong>Room:</strong> {{ $room->name }}</p>
            <p><strong>Nama:</strong> {{ $transaction->name }}</p>
            <p><strong>Durasi:</strong> {{ $transaction->duration }} bulan</p>
            <p><strong>Mulai:</strong> {{ \Carbon\Carbon::parse($transaction->start_date)->isoFormat('D MMMM YYYY') }}</p>
            <p><strong>Metode Pembayaran:</strong> {{ ucfirst(str_replace('_', ' ', $transaction->payment_method)) }}</p>
            <p><strong>Total:</strong> Rp {{ number_format($transaction->total_amount, 0, ',', '.') }}</p>
        </div>
    </div>
@endsection
@endsection
