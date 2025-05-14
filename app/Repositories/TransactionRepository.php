<?php

namespace App\Repositories;

use App\Interfaces\TransactionRepositoryInterface;
use App\Models\Transaction;

class TransactionRepository implements TransactionRepositoryInterface
{

    // dia akan nge get data transaction dari session 
    public function getTransactionDataFromSession()
    {
        return session()->get('transaction');
    }

    // kalau ini dia save ke session transaction
    public function saveTransactionDataToSession($data)
    {
        $transaction = session()->get('transaction', []);

        // kita akan value pada transaction ini
        foreach($data as $key => $value){
            $transaction[$key] = $value;
        }

        // lalu kita masukan data nya
        session()->put('transaction', $transaction);
    }
}
