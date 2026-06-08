<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\Kamar;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RentalController extends Controller
{
    public function index(Request $request)
    {
        return Rental::with(['user', 'kamar'])
            ->where('user_id', $request->user()->id)
            ->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'kamar_id' => 'required|exists:kamars,id',
            'duration_month' => 'required|in:6,12',
        ]);

        $kamar = Kamar::findOrFail($request->kamar_id);

        if ($kamar->status !== 'AVAILABLE') {
            return response()->json([
                'message' => 'Kamar tidak tersedia'
            ], 400);
        }

        $activeRental = Rental::where('kamar_id', $kamar->id)
            ->where('status', 'ACTIVE')
            ->exists();

        if ($activeRental) {
            return response()->json([
                'message' => 'Kamar sudah disewa'
            ], 400);
        }

        $startDate = Carbon::today();
        $endDate = Carbon::today()->addMonths($request->duration_month);

        $totalPrice = $kamar->harga * $request->duration_month;

        DB::transaction(function () use ($request, $kamar, $startDate, $endDate, $totalPrice) {

            Rental::create([
                'user_id' => $request->user()->id,
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
        });

        return response()->json([
            'message' => 'Rental berhasil dibuat'
        ]);
    }
}