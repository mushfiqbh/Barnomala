<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\AttendanceService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class AttendanceCheckCommand extends Command
{
    protected $signature = 'attendance:check';
    protected $description = 'Fetch attendance and send SMS for check-ins';

    public function handle(AttendanceService $attendanceService)
    {
        $begin = now()->startOfDay()->toIso8601String();
        $end = now()->endOfDay()->toIso8601String();

        $data = $attendanceService->fetchAttendance($begin, $end);

        // Example: send SMS to each person who checked in
        foreach ($data['data'] ?? [] as $record) {
            $phone = $record['personPhone'] ?? null;
            if ($phone) {
                Http::post('https://sms-provider-api/send', [
                    'to' => $phone,
                    'message' => "Hello {$record['personName']}, your check-in was recorded successfully!"
                ]);
            }
        }

        Log::info('Attendance check completed.', ['records' => count($data['data'] ?? [])]);
    }
}
