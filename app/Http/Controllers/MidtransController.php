<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MidtransController extends Controller
{
    public function handleNotification(Request $request)
    {
        // Decode the notification from Midtrans
        $notification = $request->all();

        // Log notification data (for debugging purposes)
        Log::info('Midtrans Notification:', $notification);

        // Verify notification signature
        $serverKey = env('MIDTRANS_SERVER_KEY');
        $signatureKey = $notification['signature_key'];

        // Calculate expected signature
        $expectedSignature = hash('sha512', $notification['order_id'] . $notification['gross_amount'] . $serverKey);

        if ($signatureKey !== $expectedSignature) {
            Log::error('Invalid signature key.');
            return response()->json(['status' => 'error'], 400);
        }

        // Find the reservation
        $reservation = Reservation::where('order_id', $notification['order_id'])->first();

        if ($reservation) {
            // Update reservation status based on notification status
            $status = $notification['transaction_status'];

            if ($status === 'success') {
                $reservation->status = 'Complete';
            } elseif ($status === 'pending') {
                $reservation->status = 'Pending';
            } elseif ($status === 'failed') {
                $reservation->status = 'Failed';
            }

            $reservation->save();
        } else {
            Log::error('Reservation not found.');
        }

        return response()->json(['status' => 'success']);
    }
}
