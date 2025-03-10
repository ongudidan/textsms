<?php

namespace TextSms;

use Yii;
use GuzzleHttp\Client;

class Sms
{
    // textsms send SMS
    public static function send($mobile, $message)
    {
        $url = 'https://sms.textsms.co.ke/api/services/sendsms/';

        $data = [
            'partnerID' => Yii::$app->params['textsmsPartnerID'],
            'apikey' => Yii::$app->params['textsmsApiKey'],
            'mobile' => $mobile,
            'message' => $message,
            'shortcode' => Yii::$app->params['textsmsShortcode'],
        ];

        return self::sendRequest($url, $data);
    }

    // check balance for textsms
    public static function balance()
    {
        $url = 'https://sms.textsms.co.ke/api/services/getbalance/';

        $data = [
            'partnerID' => Yii::$app->params['textsmsPartnerID'],
            'apikey' => Yii::$app->params['textsmsApiKey'],
        ];

        return self::sendRequest($url, $data);
    }

    // check status for textsms
    public static function status($messageId)
    {
        $url = 'https://sms.textsms.co.ke/api/services/getdlr/';

        $data = [
            'partnerID' => Yii::$app->params['textsmsPartnerID'],
            'apikey' => Yii::$app->params['textsmsApiKey'],
            'messageID' => $messageId,
        ];

        return self::sendRequest($url, $data);
    }

    // Make sendRequest static and use Guzzle instead of curl
    private static function sendRequest($url, $data)
    {
        $client = new Client();
        $response = $client->post($url, [
            'json' => $data,
            'headers' => ['Content-Type' => 'application/json']
        ]);

        return $response->getBody()->getContents();
    }
}
