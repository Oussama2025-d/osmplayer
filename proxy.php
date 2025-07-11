<?php
// السماح بجميع المصادر (CORS)
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Content-Type: application/vnd.apple.mpegurl');

// الحصول على رابط البث من الطلب
$url = isset($_GET['url']) ? $_GET['url'] : '';

if (empty($url)) {
    die("لم يتم تحديد رابط البث");
}

// إعدادات cURL لاسترجاع البيانات
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
    'Referer: https://example.com'
]);

$response = curl_exec($ch);
curl_close($ch);

// إخراج النتيجة
echo $response;
?>