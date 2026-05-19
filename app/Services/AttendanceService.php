<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AttendanceService
{
    protected $baseUri = 'https://172.29.96.1:444';
    protected $uri = '/artemis/api/attendance/v1/report';
    protected $appKey;
    protected $appSecret;
    protected $userId;

    public function __construct()
    {
        $this->appKey = config('services.hikcentral.app_key');
        $this->appSecret = config('services.hikcentral.app_secret');
        $this->userId = config('services.hikcentral.user_id');
    }

    public function fetchAttendance($beginTime, $endTime)
    {
        $body = [
            "attendanceReportRequest" => [
                "pageNo" => 1,
                "pageSize" => 100,
                "queryInfo" => [
                    "beginTime" => $beginTime,
                    "endTime" => $endTime,
                    "sortInfo" => [
                        "sortField" => 1,
                        "sortType" => 1
                    ]
                ]
            ]
        ];

        $bodyString = json_encode($body, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        $contentMD5 = base64_encode(md5($bodyString, true));

        $accept = "*/*";
        $contentType = "application/json;charset=UTF-8";
        $timestamp = round(microtime(true) * 1000);
        $headersToSign = ['x-ca-key', 'x-ca-timestamp'];
        $signatureHeaders = implode(',', $headersToSign);
        $headerString = "x-ca-key:{$this->appKey}\n" . "x-ca-timestamp:{$timestamp}\n";

        $stringToSign =
            "POST\n" .
            "{$accept}\n" .
            "{$contentMD5}\n" .
            "{$contentType}\n" .
            "{$headerString}" .
            "{$this->uri}";

        $signature = base64_encode(
            hash_hmac('sha256', $stringToSign, $this->appSecret, true)
        );

        $headers = [
            'Accept' => $accept,
            'Content-Type' => $contentType,
            'Content-MD5' => $contentMD5,
            'userId' => $this->userId,
            'X-Ca-Key' => $this->appKey,
            'X-Ca-Timestamp' => $timestamp,
            'X-Ca-Signature-Headers' => $signatureHeaders,
            'X-Ca-Signature' => $signature,
        ];

        $response = Http::withHeaders($headers)
            ->withOptions(['verify' => false]) // disable SSL check for localhost
            ->post($this->baseUri . $this->uri, $body);

        return $response->json();
    }
}
