<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEOLOCATOR | Demolition.iR</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    
<?php
require_once('config.php'); // Include the config file to get the API key

$api_key = APIKEY; // Get the API key from the config file
$url = "https://ip-intelligence.abstractapi.com/v1/?api_key=$api_key"; // API endpoint with the API key
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Return the response as a string instead of outputting it directly
curl_setopt($ch, CURLOPT_URL, $url); // Set the URL to fetch
$response = curl_exec($ch); // Execute the cURL request and store the response in a variable
curl_close($ch); // Close the cURL session
$data = json_decode($response, true); // Decode the JSON response into an associative array

$github = "https://github.com/amodemoli";
$website = "https://demolition.ir";

if ($data && !isset($data['error'])) { // Check if the response is valid and does not contain an error
    echo "<p class='title'>📑 General Information:</p>";
    echo "<div class='info-item'>IP Address: " . ($data['ip_address'] ?? 'N/A') . "</div>";
    echo "<div class='info-item'>Use Vpn: " . ($data['security']['is_vpn'] ? 'Yes' : 'No') . "</div>";
    echo "<div class='info-item'>Use Proxy: " . ($data['security']['is_proxy'] ? 'Yes' : 'No') . "</div>";
    echo "<div class='info-item'>Is Tor: " . ($data['security']['is_tor'] ? 'Yes' : 'No') . "</div>";
    echo "<div class='info-item'>Is Hosting: " . ($data['security']['is_hosting'] ? 'Yes' : 'No') . "</div>";
    echo "<div class='info-item'>Is Relay: " . ($data['security']['is_relay'] ? 'Yes' : 'No') . "</div>";
    echo "<div class='info-item'>Is Mobile: " . ($data['security']['is_mobile'] ? 'Yes' : 'No') . "</div>";
    echo "<div class='info-item'>Is Abuse: " . ($data['security']['is_abuse'] ? 'Yes' : 'No') . "</div>";
    
    echo "<p class='title'>📃 ASN Information:</p>";
    echo "<div class='info-item'>ASN: " . ($data['asn']['asn'] ?? 'N/A') . "</div>";
    echo "<div class='info-item'>Name: " . ($data['asn']['name'] ?? 'N/A') . "</div>";
    echo "<div class='info-item'>Domain: " . ($data['asn']['domain'] ?? 'N/A') . "</div>";
    echo "<div class='info-item'>Type: " . ($data['asn']['type'] ?? 'N/A') . "</div>";
    
    echo "<p class='title'>💻 Company Information:</p>";
    echo "<div class='info-item'>Name: " . ($data['company']['name'] ?? 'N/A') . "</div>";
    echo "<div class='info-item'>Domain: " . ($data['company']['domain'] ?? 'N/A') . "</div>";
    echo "<div class='info-item'>Type: " . ($data['company']['type'] ?? 'N/A') . "</div>";
    
    echo "<p class='title'>🌐 Network Information:</p>";
    echo "<div class='info-item'>Domains: ";
    if (isset($data['domains']['domains']) && !empty($data['domains']['domains'])) {
        echo implode(', ', $data['domains']['domains']);
    } else {
        echo "N/A";
    }
    echo "</div>";
    
    echo "<p class='title'>📍 Location Information:</p>";
    echo "<div class='info-item'>City: " . ($data['location']['city'] ?? 'N/A') . "</div>";
    echo "<div class='info-item'>City GEO Name ID: " . ($data['location']['city_geoname_id'] ?? 'N/A') . "</div>";
    echo "<div class='info-item'>Region: " . ($data['location']['region'] ?? 'N/A') . "</div>";
    echo "<div class='info-item'>Region ISO Code: " . ($data['location']['region_iso_code'] ?? 'N/A') . "</div>";
    echo "<div class='info-item'>Region GEO Name ID: " . ($data['location']['region_geoname_id'] ?? 'N/A') . "</div>";
    echo "<div class='info-item'>Country: " . ($data['location']['country'] ?? 'N/A') . "</div>";
    echo "<div class='info-item'>Country Code: " . ($data['location']['country_code'] ?? 'N/A') . "</div>";
    echo "<div class='info-item'>Country GEO Name ID: " . ($data['location']['country_geoname_id'] ?? 'N/A') . "</div>";
    echo "<div class='info-item'>Is Country EU: " . ($data['location']['is_country_eu'] ? 'Yes' : 'No') . "</div>";
    echo "<div class='info-item'>Continent: " . ($data['location']['continent'] ?? 'N/A') . "</div>";
    echo "<div class='info-item'>Continent Code: " . ($data['location']['continent_code'] ?? 'N/A') . "</div>";
    echo "<div class='info-item'>Continent GEO Name ID: " . ($data['location']['continent_geoname_id'] ?? 'N/A') . "</div>";
    echo "<div class='info-item'>Longitude: " . ($data['location']['longitude'] ?? 'N/A') . "</div>";
    echo "<div class='info-item'>Latitude: " . ($data['location']['latitude'] ?? 'N/A') . "</div>";
    
    echo "<p class='title'>⏰ Time Zone Information:</p>";
    echo "<div class='info-item'>Name: " . ($data['timezone']['name'] ?? 'N/A') . "</div>";
    echo "<div class='info-item'>Abbreviation: " . ($data['timezone']['abbreviation'] ?? 'N/A') . "</div>";
    echo "<div class='info-item'>Utc Offset: " . ($data['timezone']['utc_offset'] ?? 'N/A') . "</div>";
    echo "<div class='info-item'>Local Time: " . ($data['timezone']['local_time'] ?? 'N/A') . "</div>";
    echo "<div class='info-item'>Is DST: " . ($data['timezone']['is_dst'] ? 'Yes' : 'No') . "</div>";
    
    echo "<p class='title'>🚩 Flag Information:</p>";
    echo "<div class='info-item'>Emoji: " . ($data['flag']['emoji'] ?? 'N/A') . "</div>";
    echo "<div class='info-item'>Unicode: " . ($data['flag']['unicode'] ?? 'N/A') . "</div>";
    echo "<div class='info-item'>PNG: <img src='" . ($data['flag']['png'] ?? '') . "' width='30' height='20'> " . ($data['flag']['png'] ?? 'N/A') . "</div>";
    echo "<div class='info-item'>SVG: " . ($data['flag']['svg'] ?? 'N/A') . "</div>";
    
    echo "<p class='title'>💰 Currency Information:</p>";
    echo "<div class='info-item'>Name: " . ($data['currency']['name'] ?? 'N/A') . "</div>";
    echo "<div class='info-item'>ISO Code: " . ($data['currency']['code'] ?? 'N/A') . "</div>";
    echo "<div class='info-item'>Symbol: " . ($data['currency']['symbol'] ?? 'N/A') . "</div>";
    
    echo "<p class='title'>🌐 Demolition Information:</p>";
    echo "<div class='info-item'><a href='" . $github . "' target='_blank'>🐈 Visit Demolition GitHub</a></div>";
    echo "<div class='info-item'><a href='" . $website . "' target='_blank'>🌎 Visit Demolition Website</a></div>";
    
} else {
    echo "<div class='info-item'>🔴 Error fetching IP information.</div>"; 
}

?>

</body>
</html>