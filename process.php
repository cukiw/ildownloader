<?php
function fetchTikTokVideo($url) {
    $config = include 'config/general.php';
    $endpoint = $config['api']['tiktok']['endpoint'];
    $apikey = $config['api']['tiktok']['apikey'];
    
    $requestUrl = $endpoint . '?apikey=' . $apikey . '&url=' . urlencode($url);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $requestUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    if (curl_errno($ch)) {
        curl_close($ch);
        return [
            'success' => false,
            'message' => 'Curl error: ' . curl_error($ch)
        ];
    }
    
    curl_close($ch);
    
    if ($httpCode !== 200) {
        return [
            'success' => false,
            'message' => 'API request failed with status code: ' . $httpCode
        ];
    }
    
    $data = json_decode($response, true);
    
    if (!isset($data['status']) || !$data['status']) {
        return [
            'success' => false,
            'message' => isset($data['message']) ? $data['message'] : 'Unknown error occurred'
        ];
    }
    
    return [
        'success' => true,
        'data' => [
            'title' => isset($data['data']['title']) ? $data['data']['title'] : '',
            'description' => isset($data['data']['description']) ? $data['data']['description'] : '',
            'videoUrl' => isset($data['data']['url']) ? $data['data']['url'] : '',
            'keyword' => isset($data['data']['keyword']) ? $data['data']['keyword'] : ''
        ]
    ];
}
