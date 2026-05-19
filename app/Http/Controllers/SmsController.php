<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SmsService;

class SmsController extends Controller
{
    protected $smsService;

    public function __construct(SmsService $smsService)
    {
        $this->smsService = $smsService;
    }

    public function index()
    {
        $balance = $this->smsService->getBalance();
        return view('sms.index', compact('balance'));
    }

    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'contacts' => 'required|array|min:1',
        ]);

        $result = $this->smsService->send($request->contacts, $request->message);

        return back()->with([
            'status' => "SMS Sent. Success: {$result['success']}, Failed: {$result['failed']}}",
        ]);
    }
}
