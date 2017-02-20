<?php
$access_token = 'Lc9YWVYk4V568kkxsRx39DcF9TQJzs+h1tgLO4Bp3W6Srm1ZlXm8XuTGfPXUhsEm/pJjk3HM4CAM0uKyXHXjEZtFa6jW6nKBbrM5ScR76OzBGv2aVsCzCdAZNX41i+scHHD4wa77RISbPAOPwoIDvAdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'e3d5f27d85d1b1afb3f8dbe589cd1ce5'; // Channel secret string
$httpRequestBody = 'group'; // Request body string
$hash = hash_hmac('sha256', $httpRequestBody, $channelSecret, true);
$signature = base64_encode($hash);
// Compare X-Line-Signature request header string and the signature

