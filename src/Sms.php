<?php

namespace TextSms;


use GuzzleHttp\Client;

class Sms
{
    /**
     * Send SMS
     * 
     * @param string $partnerID
     * @param string $apikey
     * @param string $shortcode
     * @param string $mobile
     * @param string $message
     * @return mixed
     */
    public static function send($partnerID, $apikey, $shortcode, $mobile, $message)
    {
        $url = 'https://sms.textsms.co.ke/api/services/sendsms/';

        $data = [
            'partnerID' => $partnerID,
            'apikey' => $apikey,
            'mobile' => $mobile,
            'message' => $message,
            'shortcode' => $shortcode,
        ];

        return self::sendRequest($url, $data);
    }

    /**
     * Check Balance
     * 
     * @param string $partnerID
     * @param string $apikey
     * @return mixed
     */
    public static function balance($partnerID, $apikey)
    {
        $url = 'https://sms.textsms.co.ke/api/services/getbalance/';

        $data = [
            'partnerID' => $partnerID,
            'apikey' => $apikey,
        ];

        return self::sendRequest($url, $data);
    }

    /**
     * Check Delivery Status
     * 
     * @param string $partnerID
     * @param string $apikey
     * @param string $messageId
     * @return mixed
     */
    public static function status($partnerID, $apikey, $messageId)
    {
        $url = 'https://sms.textsms.co.ke/api/services/getdlr/';

        $data = [
            'partnerID' => $partnerID,
            'apikey' => $apikey,
            'messageID' => $messageId,
        ];

        return self::sendRequest($url, $data);
    }

    private static function sendRequest($url, $data)
    {
        $client = new Client();
        try {
            $response = $client->post($url, [
                'json' => $data,
                'headers' => ['Content-Type' => 'application/json']
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            return [
                'response-code' => 500,
                'response-description' => $e->getMessage()
            ];
        }
    }
}
