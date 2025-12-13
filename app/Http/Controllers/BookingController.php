<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Booking;
use App\Models\Table;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function toggleStatus(Table $table)
    {
        $activeBooking = $table->activeBooking;

        if ($activeBooking) {

            $activeBooking->status = 'empty';
            $activeBooking->save();

            ActivityLog::create([
                'activity_type' => 'update',
                'description' => 'Mengubah ' . $table->table_number . ' menjadi kosong',
                'user_id' => Auth::id(),
            ]);

            $message = "Meja $table->table_number ditandai kosong.";
        } else {
            Booking::create([
                'table_id' => $table->id,
                'user_id' => Auth::id(),
                'status' => 'filled',
            ]);

            ActivityLog::create([
                'activity_type' => 'update',
                'description' => 'Mengubah ' . $table->table_number . ' menjadi terisi',
                'user_id' => Auth::id(),
            ]);

            $message = "Meja $table->table_number ditandai terisi.";
        }

        return redirect()->route('tables.index')->with('success', $message);
    }
}
