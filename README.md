📩 TextSMS - Simple SMS Integration for Yii2



TextSMS is a Yii2 package that provides a seamless way to integrate SMS functionality into your application using a simple API.

🚀 Installation
Install the package via Composer:

sh
Copy
Edit
composer require yourvendor/textsms
⚙️ Configuration
Add the following API credentials to your Yii2 params.php file:

php
Copy
Edit
return [
    // TextSMS API Configuration
    'textsmsPartnerID' => '12712',
    'textsmsApiKey' => 'd1fd14bce04b434f8c78325ebd8caba4',
    'textsmsShortcode' => 'TextSMS',
];
🛠 Usage
Sending an SMS
To send an SMS, use the following method:

php
Copy
Edit
use yourvendor\textsms\TextSms;

$sms = new TextSms();
$response = $sms->send('254712345678', 'Hello from Yii2!');

if ($response['response-code'] == 200) {
    echo "SMS sent successfully!";
} else {
    echo "Failed to send SMS: " . $response['response-description'];
}
🔄 Response Format
The API will return a response in the following format:

json
Copy
Edit
{
  "responses": [
    {
      "response-code": 200,
      "response-description": "Success",
      "mobile": "254712345678",
      "messageid": "1869610817",
      "networkid": 1
    }
  ]
}
📜 License
This package is licensed under the MIT License. See the LICENSE file for details.

🛠 Contributing
Contributions are welcome! Feel free to submit a pull request or open an issue.

📞 Support
For any issues, please open a GitHub issue or contact support at support@yourdomain.com.