<?php

namespace App\Http\Controllers;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\TransactionRepositoryInterface;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //
    private BoardingHouseRepositoryInterface $boardingHouseRepository;
    private TransactionRepositoryInterface $transactionRepository;

    public function __construct(
        BoardingHouseRepositoryInterface $boardingHouseRepository,
        TransactionRepositoryInterface $transactionRepository

    ) {
        $this->boardingHouseRepository = $boardingHouseRepository;
        $this->transactionRepository = $transactionRepository;
    }

    public function booking(Request $request, $slug)
    {
        // kita panggil transactionRepository yg fungsi saveTransactionDataToSession($request->all)
        // lalu kita ambil  dari $request->all
        $this->transactionRepository->saveTransactionDataToSession($request->all());

        // lalu redirect ke bagian 
        return redirect()->route('booking.information', $slug);
    }

    // tadi kan kita udh nge save $this->transactionRepository->saveTransactionDataToSession($request->all());
    // ke dalam session biar g makan data di sata kalao udh chekout baru di masukin ke database
    // lalu tinggal kita panggil aja 
    public function information($slug)
    {
        $transaction = $this->transactionRepository->getTransactionDataFromSession();
        $boardingHouse = $this->boardingHouseRepository->getBoardingHouseBySlug($slug);
        // tadikan data room id sudah di simpan ke dalamtransaction jadi tinggal kita panggil aja (($transaction['room_id']))
        $room = $this->boardingHouseRepository->getBoardingHouseRoomById(($transaction['room_id']));

        return view('pages.booking.information', compact('transaction', 'boardingHouse', 'room'));
    }
    
    public function check() 
    {
        return view('pages.check-booking');
    }
}
