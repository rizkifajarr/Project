<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use App\Models\Hour;
use Midtrans\Config;
use App\Models\Table;
use Midtrans\Notification;
use App\Models\Reservation;
use App\Models\TableNumber;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create($table_id, $hour_id)
    {
        $table = TableNumber::find(request()->table_id);
        $hour = Hour::find(request()->hour_id);
        return view('customers.reservations.create', compact('table', 'hour'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'table_id' => 'required|exists:table_numbers,id',
            'hour_id' => 'required|exists:hours,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email',
            'reservation_date' => 'required|date',
            'duration' => 'required|integer|min:1',
        ]);

        $isAvailable = Table::where('table_id', $request->table_id)
            ->where('hour_id', $request->hour_id)
            ->where('is_available', true)
            ->exists();

        if (!$isAvailable) {
            return redirect()->back()->withErrors(['message' => 'The selected table is not available at the chosen time.']);
        }

        $totalPrice = $request->duration * 25000;

        $reservation = Reservation::create([
            'user_id' => auth()->id(),
            'table_id' => $request->table_id,
            'hour_id' => $request->hour_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'reservation_date' => $request->reservation_date,
            'total_price' => $totalPrice,
            'duration' => $request->duration,
            'status' => 'Pending',
            'order_id' => uniqid(),
        ]);
        return redirect()->route('customers.reservations.show', $reservation->id);
    }
    public function show(string $id)
    {
        $reservation = Reservation::with(['table', 'hour'])->findOrFail($id);
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        Config::$isSanitized = env('MIDTRANS_IS_SANITIZED', true);
        Config::$is3ds = env('MIDTRANS_IS_3DS', true);

        $params = [
            'transaction_details' => [
                'order_id' => uniqid(),
                'gross_amount' => $reservation->total_price,
            ],
            'item_details' => [
                [
                    'id' => $reservation->table->table_number,
                    'price' => 25000,
                    'quantity' => $reservation->duration,
                    'name' => 'Meja: ' . $reservation->table->table_number,
                ],
            ],
            'customer_details' => [
                'first_name' => $reservation->name,
                'email' => $reservation->email,
                'phone' => $reservation->phone,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);

        $reservation->save();

        return view('customers.reservations.show', compact('reservation', 'snapToken'));
    }
}
