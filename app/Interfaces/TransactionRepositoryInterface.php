<?php

namespace App\Interfaces;

use ReflectionFunctionAbstract;

interface TransactionRepositoryInterface
{
    public function getTransactionDataFromSession();

    public function saveTransactionDataToSession($data);
    
    public function saveTransaction($data);
}