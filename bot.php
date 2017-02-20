<?php
$access_token = 'Lc9YWVYk4V568kkxsRx39DcF9TQJzs+h1tgLO4Bp3W6Srm1ZlXm8XuTGfPXUhsEm/pJjk3HM4CAM0uKyXHXjEZtFa6jW6nKBbrM5ScR76OzBGv2aVsCzCdAZNX41i+scHHD4wa77RISbPAOPwoIDvAdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		
			
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			if ($text = 'help')
			{
				$text = 'Call 191';
			}
			else
			{
			
			}
			// Get replyToken
			$replyToken = $event['replyToken'];
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];
			
			if($event['type'] == 'message' && $event['message']['type'] == 'sticker') {
			$packageId = $event['message']['packageId'];
			$stickerId = $event['message']['stickerId'];
			if ($packageId = '1' && $stickerId = '1')
			$messages = [
				'type' => 'text',
				'text' => $packageId
			];
		
			}
			
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);
			echo $result . "\r\n";
		}
	}
}
echo "OK";
