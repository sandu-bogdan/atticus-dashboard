<?php

include 'config.php';

// Create cURL resource
$ch = curl_init($apiEndpointAdGuard);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$usernameAdguard:$passwordAdguard");

// Execute cURL session and get the response
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

// Process the API response
if ($response !== false) {
    // Process the response, e.g., decode JSON
    $data = json_decode($response, true);
    $numDnsQueries = $data['num_dns_queries'];
    $numBlockedFiltering = $data['num_blocked_filtering'];
    $avgProcessingTime = round(($data['avg_processing_time']*1000),2);
    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode([
        'numDnsQueries' => $numDnsQueries,
        'numBlockedFiltering' => $numBlockedFiltering,
        'avgProcessingTime' => $avgProcessingTime,
    ]);
} else {
    echo 'Failed to fetch data from API.';
}
?>