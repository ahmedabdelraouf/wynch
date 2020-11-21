<?php


use GuzzleHttp\Client;

if (!function_exists('sendMessage')) {

    function sendMessage(array $mobile, string $message, int $language)
    {
        $client = new Client();
//        try {
        $res = $client->request('POST', 'https://smsmisr.com/api/webapi/',
            [
                'query' => [
                    'username' => 'jNQawLuV',
                    'password' => 'fUSoH6mTqw',
                    'language' => $language,
                    'sender' => 'wynch',
                    'mobile' => $mobile,
                    'message' => $message,
                ]
            ]
        );
        $responseBody = json_decode($res->getBody());
        if ($responseBody->code == '1901')
            return true;
        return false;
//        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
//            return false;
//        }
    }
}

if (!function_exists('generateCode')) {

    function generateCode()
    {
        return 123456;
//        return rand(1000, 9999);
    }
}
