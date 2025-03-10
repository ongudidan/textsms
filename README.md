📩 TextSMS - Simple SMS Integration for Yii2



TextSMS is a Yii2 package that provides a seamless way to integrate SMS functionality into your application using a simple API.

🚀 Installation
Install the package via Composer:

`composer require ongudidan/textsms`<br>
⚙️ Configuration
Add the following API credentials to your Yii2 params.php file:

`return [`<br>
    `// TextSMS API Configuration`<br>
    `'textsmsPartnerID' => '1234',`<br>
    `'textsmsApiKey' => 'd1fd14bce04b434f8c785ebd8caba4',`<br>
    `'textsmsShortcode' => 'SMS',`<br>
`];`<br>
🛠 Usage
Sending an SMS
To send an SMS, use the following method:

`use yourvendor\textsms\TextSms;`<br>

`$sms = new TextSms();`<br>
`$response = $sms->send('254712345678', 'Hello from Yii2!');`<br>

`if ($response['response-code'] == 200) {`<br>
    `echo "SMS sent successfully!";`<br>
`} else {`<br>
    `echo "Failed to send SMS: " . $response['response-description'];`<br>
`}`<br>
🔄 Response Format
The API will return a response in the following format:

`{`
 ` "responses": [`<br>
   ` {`<br>
      `"response-code": 200,`<br>
     ` "response-description": "Success",`<br>
      `"mobile": "254712345678",`<br>
     ` "messageid": "1869610817",`<br>
      `"networkid": 1`<br>
   ` }`<br>
 ` ]`<br>
`}`<br>
📜 License
This package is licensed under the MIT License. See the LICENSE file for details.

🛠 Contributing
Contributions are welcome! Feel free to submit a pull request or open an issue.

📞 Support
For any issues, please open a GitHub issue or contact support at support@yourdomain.com.
