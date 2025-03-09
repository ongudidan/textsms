<?php

namespace TextSms;

class TextSms
{


    // textsms send SMS
    public function send($mobile, $message)
    {
        $url = 'https://sms.textsms.co.ke/api/services/sendsms/';

        $data = array(

            //Fill in the request parameters with valid values
            'partnerID' => $_SERVER['TEXTSMS_PARTNER_ID'],
            'apikey' => $_SERVER['TEXTSMS_API_KEY'],
            'mobile' => $mobile,
            'message' => $message,
            'shortcode' => $_SERVER['TEXTSMS_SHORTCODE'],
        );


        $smsService = $this->sendRequest($url, $data);

        return $smsService;
    }

    // check balance for textsms
    public function balance()
    {
        $url = 'https://sms.textsms.co.ke/api/services/getbalance/';

        $data = array(
            //Fill in the request parameters with valid values
            'partnerID' => $_SERVER['TEXTSMS_PARTNER_ID'],
            'apikey' => $_SERVER['TEXTSMS_API_KEY'],
        );

        $smsService = $this->sendRequest($url, $data);

        return $smsService;
    }

    // check status for textsms
    public function status($messageId)
    {
        $url = 'https://sms.textsms.co.ke/api/services/getdlr/';

        $data = array(
            //Fill in the request parameters with valid values
            'partnerID' => $_SERVER['TEXT_SMS_PARTNER_ID'],
            'apikey' => $_SERVER['TEXTSMS_API_KEY'],
            'messageID' => $messageId,
        );
        $smsService = $this->sendRequest($url, $data);

        return $smsService;
    }

    private function sendRequest($url, $data)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}