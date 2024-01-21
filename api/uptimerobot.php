<?php

include '../config/config.php';

// Set up HTTP headers for the request
$headers = array(
    'Content-Type: application/x-www-form-urlencoded',
);

// Set up data for the request
$data = array(
    'api_key' => $apiKey,
    'format'  => 'json',
);

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $apiEndpointUpTimeRobot);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL session
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

if ($response !== false) {
    $data = json_decode($response, true);

    if ($data && isset($data['account'])) {
        $monitorLimit = $data['account']['monitor_limit'];
        $monitorInterval = $data['account']['monitor_interval'];
        $upMonitors = $data['account']['up_monitors'];
        $downMonitors = $data['account']['down_monitors'];
        $pausedMonitors = $data['account']['paused_monitors'];
        $totalMonitors = $data['account']['total_monitors'];
        // Return JSON response
        header('Content-Type: application/json');
        echo json_encode([
            'monitorLimit' => $monitorLimit,
            'monitorInterval' => $monitorInterval,
            'upMonitors' => $upMonitors,
            'downMonitors' => $downMonitors,
            'pausedMonitors' => $pausedMonitors,
            'totalMonitors' => $totalMonitors,
        ]);
    } else {
        echo "Unable to retrieve account details from the JSON data.";
    }
} else {
    echo "Error: Unable to fetch account details.\n";
}