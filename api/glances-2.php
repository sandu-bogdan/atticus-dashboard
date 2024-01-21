<?php

include '../config/config.php';

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $glancesApiEndpoint2);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// Set basic authentication
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$glancesUsername2:$glancesPassword2");

// Execute cURL session and get the response
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'cURL error: ' . curl_error($ch);
    // Handle the error as needed
}

// Process the API response
if ($response !== false) {
    $data = json_decode($response, true);

    if ($data && isset($data['cpu']['total'])) {
        $cpu = $data['cpu']['total'];
        $mem = $data['mem']['percent'];
        $totalSpace = formatBytes($data['fs']['0']['size']);
        $usedSpace = formatBytes($data['fs']['0']['used']);
        $freeSpace = formatBytes($data['fs']['0']['free']);
        $uptime = $data['uptime'];
        $memory = formatBytes($data['mem']['total']);
        $memAvailable = formatBytes($data['mem']['available']);
        $memUsed = formatBytes($data['mem']['used']);
        $cpuTemp = $data['sensors']['0']['value'];
        
        // Return JSON response
        header('Content-Type: application/json');
        echo json_encode([
            'cpu' => $cpu,
            'mem' => $mem,
            'mountPoint' => $mountPoint,
            'totalSpace' => $totalSpace,
            'usedSpace' => $usedSpace,
            'freeSpace' => $freeSpace,
            'usagePercentage' => $usagePercentage,
            'uptime' => $uptime,
            'memory' => $memory,
            'memAvailable' => $memAvailable,
            'memUsed' => $memUsed,
            'cpuTemp' => $cpuTemp,
            'glancesUrl' => $glancesUrl2,
            'glancesName' => $glancesName2
        ]);
    } else {
        echo "Unable to retrieve data from API.";
    }
}

// Function to format bytes into a human-readable format
function formatBytes($bytes, $precision = 2) {
    $units = ['B', 'KB', 'MB', 'GB', 'TB'];

    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);

    $bytes /= (1 << (10 * $pow));

    return round($bytes, $precision) . ' ' . $units[$pow];
}

// Close cURL session
curl_close($ch);
?>
