<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SmsService
{
    protected $apiKey;
    protected $sender;

    public function __construct()
    {
        $this->apiKey = env('SMS_API_KEY', 'blkRgIHB3G0nbbpr4r0PlxLbNzLLXulmWqDt6H6O');
        $this->sender = env('SMS_SENDER_ID', '8809617614972');
    }

    /**
     * Send SMS to one or more recipients
     *
     * @param array|string $contacts
     * @param string $message
     * @return array
     */
    public function send($contacts, string $message)
    {
        $success = 0;
        $failed = 0;
        $responses = [];

        // Accept both array and string
        if (is_array($contacts)) {
            // Convert to comma-separated for API
            $contacts = implode(',', array_map(function ($phone) {
                $phone = preg_replace('/\D/', '', $phone);
                if (strpos($phone, '88') !== 0) {
                    $phone = '88' . $phone;
                }
                return $phone;
            }, $contacts));
        } else {
            // Sanitize single number input
            $contacts = preg_replace('/\D/', '', $contacts);
            if (strpos($contacts, '88') !== 0) {
                $contacts = '88' . $contacts;
            }
        }

        $postData = [
            'api_token'       => $this->apiKey,
            'senderid'        => $this->sender,
            'message'         => $message,
            'contact_number'  => $contacts,
        ];

        try {
            $response = Http::asForm()->post('https://api.smsinbd.com/sms-api/sendsms', $postData);

            $responseData = json_decode(
                preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $response->body()),
                true
            );

            if (isset($responseData['status']) && strtolower($responseData['status']) === 'success') {
                $success = $responseData['success'] ?? 1;
                $failed = $responseData['failed'] ?? 0;
            } else {
                $failed++;
                Log::warning('SMS Failed', ['response' => $responseData]);
            }

            $responses[] = $responseData;
        } catch (\Exception $e) {
            $failed++;
            Log::error('SMS Exception: ' . $e->getMessage());
            $responses[] = ['status' => 'error', 'message' => $e->getMessage()];
        }

        return [
            'success'   => $success,
            'failed'    => $failed,
            'responses' => $responses,
        ];
    }

    /**
     * Get SMS account balance
     */
    public function getBalance()
    {
        try {
            $url = 'https://api.smsinbd.com/sms-api/balance?api_token=' . $this->apiKey;
            $response = Http::get($url);
            $responseData = json_decode(
                preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $response->body()),
                true
            );

            if (isset($responseData['status']) && strtolower($responseData['status']) !== 'success') {
                Log::warning('SMS Balance Fetch Failed', ['response' => $responseData]);
                return 0;
            }

            return [
                'masking_balance' => $responseData['mask'] ?? 0,
                'non_masking_balance' => $responseData['nonmask'] ?? 0,
                'voice_balance' => $responseData['voice'] ?? 0,
            ];
        } catch (\Exception $e) {
            Log::error('SMS Balance Exception: ' . $e->getMessage());
            return 0;
        }
    }
}
