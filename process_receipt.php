<?php

// process_receipt.php

// Allow CORS if needed (optional)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["error" => "Only POST allowed"]);
    exit;
}

if (!isset($_FILES['file'])) {
    http_response_code(400);
    echo json_encode(["error" => "No file uploaded"]);
    exit;
}

// Veryfi credentials (REPLACE with your actual ones)
$clientId = "vrfIaJn6E0Z7MZb7V6mppm0cjzReVgUKNkeam1E";
$username = "rutu.chauhan.0007";
$apiKey   = "fb683d411cd617fc615b76bc45f3739b";
$filePath = $_FILES['file']['tmp_name'];
$fileName = $_FILES['file']['name'];

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.veryfi.com/api/v8/partner/documents/",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 60,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => [
        "file" => new CURLFile($filePath, mime_content_type($filePath), $fileName)
    ],
    CURLOPT_HTTPHEADER => [
        "Content-Type: multipart/form-data",
        "Accept: application/json",
        "CLIENT-ID: $clientId",
        "AUTHORIZATION: apikey $username:$apiKey"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);
$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

curl_close($curl);

if ($err) {
    http_response_code(500);
    echo json_encode(["error" => "cURL Error: $err"]);
    exit;
}

// Pass through Veryfi’s JSON response directly
http_response_code($httpCode);
echo $response;
