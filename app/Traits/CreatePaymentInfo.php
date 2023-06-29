<?php

namespace App\Traits;

use App\Models\Payment;

trait CreatePaymentInfo
{
    /**
     * this function creates a user
     */
    public static function saveToPayments($user_id, $amount)
    {
        Payment::create([
            'user_id' => $user_id,
            'amount' => $amount,
        ]);
    }
}
