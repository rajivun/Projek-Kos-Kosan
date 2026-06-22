<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function store(Request $request)
    {

        $payment = Payment::create([

            'user_id' => $request->user_id,

            'rental_id' => $request->rental_id,

            'amount' => $request->amount,

            'method' => $request->method,

            'status' => 'pending'

        ]);

        return response()->json([

            'message' => 'Pembayaran berhasil dibuat',

            'payment' => $payment

        ]);

    }
}