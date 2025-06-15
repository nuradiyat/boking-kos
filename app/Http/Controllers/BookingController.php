<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerInformationStoreRequest;
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

    public function saveInformation(CustomerInformationStoreRequest $request, $slug)
    {
        $data = $request->validated();

        $this->transactionRepository->saveTransactionDataToSession($data);

        return redirect()->route('booking.checkout', $slug);
        // dd($this->transactionRepository->getTransactionDataFromSession());

    }

    public function checkout($slug)
    {
        $transaction = $this->transactionRepository->getTransactionDataFromSession();
        $boardingHouse = $this->boardingHouseRepository->getBoardingHouseBySlug($slug);
        // tadikan data room id sudah di simpan ke dalamtransaction jadi tinggal kita panggil aja (($transaction['room_id']))
        $room = $this->boardingHouseRepository->getBoardingHouseRoomById(($transaction['room_id']));

        return view('pages.booking.checkout', compact('transaction', 'boardingHouse', 'room', 'slug'));
    }


    // public function showPaymentMethod($slug)
    // {
    //     return view('pages.booking.select-payment', compact('slug'));
    // }

    public function selectPayment($slug)
    {
        $transaction = $this->transactionRepository->getTransactionDataFromSession();
        $boardingHouse = $this->boardingHouseRepository->getBoardingHouseBySlug($slug);
        $room = $this->boardingHouseRepository->getBoardingHouseRoomById($transaction['room_id']);

        return view('pages.booking.select-payment', compact('slug', 'transaction', 'boardingHouse', 'room'));
    }



    public function processPayment(Request $request, $slug)
    {
        $request->validate([
            'payment_channel' => 'required|in:qris,debit,credit,e-wallet',
        ]);

        // Ini hanya untuk tampilan (tidak disimpan ke DB)
        $selectedChannel = $request->input('payment_channel');

        // Ambil data dari session (sudah termasuk payment_method: full_payment/down_payment)
        $transactionData = $this->transactionRepository->getTransactionDataFromSession();

        // ❗ Penting: jangan timpa $transactionData['payment_method'] dengan inputan `qris`!
        // Jadi langsung simpan:
        $transaction = $this->transactionRepository->saveTransaction($transactionData);

        $boardingHouse = $this->boardingHouseRepository->getBoardingHouseBySlug($slug);
        $room = $this->boardingHouseRepository->getBoardingHouseRoomById($transactionData['room_id']);

        return view('pages.boarding-house.payment', compact('transaction', 'boardingHouse', 'room', 'selectedChannel'));
    }





    public function check()
    {
        return view('pages.check-booking');
    }
}
