<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\Kamar;
use Carbon\Carbon;

class RentalController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'kamar_id' => 'required|exists:kamars,id',
            'duration_month' => 'required|in:6,12'
        ]);

        $kamar = Kamar::find($request->kamar_id);

        if ($kamar->status !== 'AVAILABLE') {
            return response()->json([
                'message' => 'Kamar tidak tersedia'
            ], 400);
        }

        $startDate = Carbon::today();

        $endDate = Carbon::today()
            ->addMonths($request->duration_month);

        $totalPrice =
            $kamar->harga *
            $request->duration_month;

        $rental = Rental::create([
            'user_id' => $request->user_id,
            'kamar_id' => $request->kamar_id,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'duration_month' => $request->duration_month,
            'total_price' => $totalPrice,
            'status' => 'ACTIVE'
        ]);

        $kamar->update([
            'status' => 'OCCUPIED'
        ]);

        return response()->json([
            'message' => 'Rental berhasil dibuat',
            'data' => $rental
        ]);
    }

    public function index()
    {
        return Rental::with([
            'user',
            'kamar'
        ])->get();
    }
}