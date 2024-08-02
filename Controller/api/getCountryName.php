<?php
header('Content-Type: application/json');

// IP address parameter (you might want to sanitize this)
$ip = isset($_GET['ip']) ? $_GET['ip'] : '';

if (filter_var($ip, FILTER_VALIDATE_IP)) {
    // Your ipinfo.io API token
    $apiToken = '68729ed38f3fa6';

    // Construct the API request URL
    $url = "https://ipinfo.io/{$ip}/json?token={$apiToken}";

    // Make the request
    $response = file_get_contents($url);

    if ($response !== FALSE) {
        $data = json_decode($response, true);

        // Extract country name
        $country = isset($data['country']) ? $data['country'] : 'Unknown';

        // Respond with the country name
        echo json_encode(['country' => $country]);
    } else {
        echo json_encode(['error' => 'Unable to fetch data']);
    }
} else {
    echo json_encode(['error' => 'Invalid IP address']);
}
?>