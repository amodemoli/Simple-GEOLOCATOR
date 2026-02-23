# 📍 Simple GEOLOCATOR - User IP Finder

<div align="center">
  
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![AbstractAPI](https://img.shields.io/badge/AbstractAPI-0A66C2?style=for-the-badge&logo=api&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)
![Version](https://img.shields.io/badge/Version-1.0.0-orange?style=for-the-badge)

<br>
  
<img src="https://raw.githubusercontent.com/amodemoli/geolocator/main/preview.gif" alt="Demo Preview" width="600px">

</div>

---

## 📋 Project Description

**Simple GEOLOCATOR** is a PHP-based IP Intelligence tool that retrieves complete IP data using the **AbstractAPI IP Intelligence API**.

This project automatically detects the visitor’s IP address and fetches real-time data including:

- Security status (VPN, Proxy, TOR, Hosting, Abuse, Mobile, Relay)
- ASN information
- ISP / Company details
- Geographic location
- Timezone data
- Country flag
- Currency information

The system uses:

- `cURL` for API communication
- `json_decode()` to parse JSON responses
- Structured output using associative arrays
- A separated `config.php` file for secure API key storage

---

## 🌐 Live Demo

You can test the system here:

👉 https://geolocator.demolition.ir

---

## ✨ Features (Based Exactly on Source Code)

### 🔐 Security Information
- VPN Detection
- Proxy Detection
- TOR Detection
- Hosting Detection
- Relay Detection
- Mobile Network Detection
- Abuse Detection

### 📃 ASN Information
- ASN Number
- ASN Name
- ASN Domain
- ASN Type

### 🏢 Company Information
- Company Name
- Company Domain
- Company Type

### 🌐 Network Information
- Associated Domains

### 📍 Location Information
- City
- Region
- Country
- ISO Codes
- GEO Name IDs
- EU Status
- Continent
- Latitude & Longitude

### ⏰ Timezone Information
- Timezone Name
- Abbreviation
- UTC Offset
- Local Time
- DST Status

### 🚩 Flag Information
- Country Emoji
- Unicode
- PNG Flag Image
- SVG Flag

### 💰 Currency Information
- Currency Name
- ISO Code
- Symbol

---

# 🚀 Installation & Usage Guide

## 1️⃣ Prerequisites

Make sure your server supports:

- PHP 7.4+
- cURL enabled
- Internet access (outbound HTTPS requests allowed)

To check if cURL is enabled:

```php
<?php
phpinfo();
?>
```

Search for **cURL Support → enabled**

---

## 2️⃣ Get Your API Key

1. Go to:
   👉 https://www.abstractapi.com/ip-intelligence-api

2. Create an account

3. Generate your API key

---

## 3️⃣ Configure API Key

Create a file named:

```
config.php
```

And insert this code inside it:

```php
<?php
define('APIKEY', '') // Enter your api key here (abstractapi.com)
?>
```

Replace the empty string with your actual API key:

```php
define('APIKEY', 'your_real_api_key_here');
```

⚠️ IMPORTANT:
- Never upload your real API key publicly.
- Add `config.php` to `.gitignore`
- Do not expose it inside frontend code.

---

## 📂 Project Structure

```
/geolocator
│
├── index.php
├── config.php
├── style/
│   └── style.css
└── README.md
```

---

# ⚙️ How The Code Works (Step-by-Step Based on index.php)

### 1️⃣ Load API Key

```php
require_once('config.php');
$api_key = APIKEY;
```

Loads your secret API key from `config.php`.

---

### 2️⃣ Build API Request URL

```php
$url = "https://ip-intelligence.abstractapi.com/v1/?api_key=$api_key";
```

The API automatically detects the visitor IP because no IP parameter is specified.

---

### 3️⃣ Initialize cURL

```php
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);
$response = curl_exec($ch);
curl_close($ch);
```

- `CURLOPT_RETURNTRANSFER` → prevents direct output
- Stores API response in `$response`

---

### 4️⃣ Decode JSON Response

```php
$data = json_decode($response, true);
```

Converts JSON response into an associative array.

---

### 5️⃣ Error Handling

```php
if ($data && !isset($data['error']))
```

Ensures:
- API responded correctly
- No error key exists

If error exists → displays:

```
🔴 Error fetching IP information.
```

---

### 6️⃣ Output Sections

The script prints structured sections:

- 📑 General Information
- 📃 ASN Information
- 💻 Company Information
- 🌐 Network Information
- 📍 Location Information
- ⏰ Time Zone Information
- 🚩 Flag Information
- 💰 Currency Information
- 🌐 Demolition Links

Each value uses:

```php
($data['key'] ?? 'N/A')
```

This prevents PHP errors if data is missing.

Boolean values are converted like this:

```php
($data['security']['is_vpn'] ? 'Yes' : 'No')
```

---

# 🛡️ Security Notes

- Never expose API keys
- Always validate API responses
- Consider adding rate limiting
- Use HTTPS only
- Protect against excessive API usage
- Monitor AbstractAPI dashboard usage

---

# 📊 API Limits & Usage

AbstractAPI provides:

- Free tier with limited requests
- Paid plans with higher limits
- Dashboard monitoring
- Real-time usage tracking

If limit exceeded → API returns error JSON.

---

# 🔧 Customization

You can:

- Add manual IP lookup field
- Add caching system
- Improve UI styling
- Add error logging
- Add request timeout:

```php
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
```

---

# 🌍 My Links

## 🌐 Website
https://demolition.ir

## 🐈 GitHub
https://github.com/amodemoli

## 💬 Discord Servers
- [Support Server](https://discord.gg/dcMRfbHB9s)
- [SponsorShip Server](https://discord.gg/mGNSgJDM2b)

---

# 📄 License

MIT License

---

# 👑 Author

Developed by **Amir | Demolition.iR**

If you like this project ⭐ Star the repository!
