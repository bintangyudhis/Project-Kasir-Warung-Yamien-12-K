<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLog;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class ActivityLogController extends Controller
{
    public function index(Request $request)
    {
        $query = ActivityLog::with('user')->orderBy('created_at', 'desc');


        if ($request->has('date') && $request->date) {
            $query->whereDate('created_at', $request->date);
        }

        $activityLogs = $query->paginate(50);

        return view('activity-logs.index', compact('activityLogs'));
    }

    public function exportPdf(Request $request)
    {
        $query = ActivityLog::with('user')->orderBy('created_at', 'desc');

        if ($request->has('date') && $request->date) {
            $query->whereDate('created_at', $request->date);
        }

        $activityLogs = $query->get();

        $pdf = Pdf::loadView('activity-logs.pdf', compact('activityLogs'))
            ->setPaper('a4', 'landscape');

        $filename = 'activity-log-' . date('Y-m-d');
        if ($request->has('date') && $request->date) {
            $filename .= '-' . $request->date;
        }

        return $pdf->download($filename . '.pdf');
    }

    public function exportExcel(Request $request)
    {


        $query = ActivityLog::with('user')->orderBy('created_at', 'desc');

        if ($request->has('date') && $request->date) {
            $query->whereDate('created_at', $request->date);
        }

        $activityLogs = $query->get();

        $filename = 'activity-log-' . date('Y-m-d') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($activityLogs) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['No', 'Waktu', 'User', 'Aktivitas', 'Tipe', 'Deskripsi']);

            $no = 1;
            foreach ($activityLogs as $log) {
                fputcsv($file, [
                    $no++,
                    $log->created_at->format('Y-m-d H:i:s'),
                    $log->user->fullname ?? 'Unknown',
                    $log->activity_type,
                    $this->getStatusLabel($log->activity_type),
                    $log->description
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    private function getStatusLabel($type)
    {
        $labels = [
            'login' => 'Berhasil',
            'logout' => 'Logout',
            'make order' => 'Diperbarui',
            'check payment' => 'Info',
            'create' => 'Ditambahkan',
            'update' => 'Diperbarui',
            'delete' => 'Dihapus',
        ];

        return $labels[$type] ?? 'Info';
    }
}
