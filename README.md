# 📩 TextSMS - Universal Bulk SMS Package for PHP

A lightweight, framework-agnostic PHP package for sending bulk SMS via TextSMS API. Compatible with **Laravel**, **Yii2**, **Symfony**, and **Vanilla PHP**.

## 🚀 Features
- 📨 Send Single or Bulk SMS
- 💰 Check Account Balance
- 📊 Check Delivery Status
- 🔌 Stateles and Scalable Design

## 📦 Installation

Install the package via Composer:

```bash
composer require ongudidan/textsms
```

## ⚙️ Usage

Since version 2.1, this package is designed to be stateless. You pass your API credentials directly to the methods. This allows for better scalability and handling multiple configurations if needed.

### 1️⃣ Vanilla PHP Example

```php
require 'vendor/autoload.php';

use TextSms\Sms;

$partnerID = '1234';
$apiKey = 'your_api_key';
$shortcode = 'SMS';

// Send an SMS
$response = Sms::send($partnerID, $apiKey, $shortcode, '254712345678', 'Hello from PHP!');
print_r($response);
```

### 2️⃣ Laravel Integration

It is recommended to wrap the library in a Service or Helper to avoid repeating credentials.

**Step 1: Add credentials to `.env`**
```env
TEXTSMS_PARTNER_ID=1234
TEXTSMS_API_KEY=your_api_key
TEXTSMS_SHORTCODE=SMS
```

**Step 2: Create a Service Class (e.g., `App\Services\SmsService.php`)**

```php
namespace App\Services;

use TextSms\Sms;

class SmsService
{
    protected $partnerID;
    protected $apiKey;
    protected $shortcode;

    public function __construct()
    {
        $this->partnerID = config('services.textsms.partner_id');
        $this->apiKey = config('services.textsms.api_key');
        $this->shortcode = config('services.textsms.shortcode');
    }

    public function send($mobile, $message)
    {
        return Sms::send($this->partnerID, $this->apiKey, $this->shortcode, $mobile, $message);
    }
}
```

**Step 3: Use in Controllers**

```php
use App\Services\SmsService;

public function checkout(SmsService $sms)
{
    $sms->send('254712345678', 'Order Received!');
}
```

### 3️⃣ Yii2 Integration

You can create a helper component.

```php
namespace common\components;

use Yii;
use yii\base\Component;
use TextSms\Sms;

class SmsComponent extends Component
{
    public $partnerID;
    public $apiKey;
    public $shortcode;

    public function send($mobile, $message)
    {
        return Sms::send($this->partnerID, $this->apiKey, $this->shortcode, $mobile, $message);
    }
}
```

**Configuration in `config/web.php`:**
```php
'components' => [
    'sms' => [
        'class' => 'common\components\SmsComponent',
        'partnerID' => '...',
        'apiKey' => '...',
        'shortcode' => '...',
    ],
],
```

**Usage:**
```php
Yii::$app->sms->send('254123456789', 'Hello from Yii!');
```

## 🛠 Available Methods

### Send SMS
```php
Sms::send($partnerID, $apiKey, $shortcode, $mobile, $message);
```

### Check Balance
```php
Sms::balance($partnerID, $apiKey);
```

### Check Message Status
```php
Sms::status($partnerID, $apiKey, $messageId);
```

## 🔄 Response Format
The API returns a JSON array:

```json
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
```

## 📜 License
This package is licensed under the MIT License.
