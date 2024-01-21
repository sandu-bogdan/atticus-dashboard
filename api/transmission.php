<?php

include 'config.php';

$json = array("arguments" => "{}",
"method" => "session-stats") ;

$a = json_encode($json) ;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 1); 
curl_setopt($ch, CURLOPT_URL, $apiEndpointTransmission);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $a);
curl_setopt($ch, CURLOPT_HTTPAUTH, 1);
curl_setopt($ch, CURLOPT_USERPWD, "$usernameTransmission:$passwordTransmission"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

// Execute cURL session and get the response
$response = curl_exec($ch);

$ret = preg_match  ( "%.*\r\n(X-Transmission-Session-Id: .*?)(\r\n.*)%", $response, $result) ;
$X_Transmission_Session_Id  = $result[1] ;


curl_setopt($ch, CURLOPT_HEADER, 0); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array ($X_Transmission_Session_Id)) ;
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

// Process the API response
if ($response !== false) {
    $data = json_decode($response, true);

    if ($data && isset($data['arguments']['cumulative-stats']['downloadedBytes'])) {
        $downloadedBytes = $data['arguments']['cumulative-stats']['downloadedBytes'];
        $downloadedGB = number_format($downloadedBytes / (1024 * 1024 * 1024),2);
        $uploadedBytes = $data['arguments']['cumulative-stats']['uploadedBytes'];
        $uploadedGB = number_format($uploadedBytes / (1024 * 1024 * 1024),2);
        $torrentCount = $data['arguments']['torrentCount'];
        $downloadSpeed = $data['arguments']['downloadSpeed'];
        $uploadSpeed = $data['arguments']['uploadSpeed'];
        // Return JSON response
        header('Content-Type: application/json');
        echo json_encode([
            'downloadedGB' => $downloadedGB,
            'uploadedGB' => $uploadedGB,
            'torrentCount' => $torrentCount,
            'downloadSpeed' => $downloadSpeed,
            'uploadSpeed' => $uploadSpeed,
        ]);
    } else {
        echo "Unable to retrieve data from API.";
    }
}
?>