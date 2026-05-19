<?php

namespace App\Http\Controllers;

use App\Services\AttendanceService;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    protected $attendanceService;

    public function __construct(AttendanceService $attendanceService)
    {
        $this->attendanceService = $attendanceService;
    }

    public function index()
    {
        return view('attendance');
    }

    public function fetch()
    {
        try {
            $begin = "2025-01-01T00:00:00 08:00";
            $end = "2025-12-31T23:59:59 08:00";

            $data = $this->attendanceService->fetchAttendance($begin, $end);

            if ($data === null) {
                return response()->json([
                    'success' => false,
                    'message' => 'No response body received from HikCentral.',
                    'data' => null,
                ], 502);
            }

            return response()->json([
                'success' => true,
                'fetched_at' => now()->toIso8601String(),
                'data' => $data,
            ], 200, [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        } catch (\Throwable $th) {
            report($th);

            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch attendance data.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
