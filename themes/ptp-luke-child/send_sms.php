<?php
function send_message($receiver,$message){
      $accountSid = 'AC841e377606feec0aa71eafb7560ab01a';
      $authToken = '25291f71d61ea518858c03c19005b6fa';

      $url = 'https://api.twilio.com/2010-04-01/Accounts/'.$accountSid.'/Messages.json';

      $to = '+918085002870'; 
      $from = '+12182775896';

      $body = 'Hello, this is a test message from Twilio! 123';

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
          'To' => $to,
          'From' => $from,
          'Body' => $message
      ]));
      curl_setopt($ch, CURLOPT_HTTPHEADER, [
          "Authorization: Basic " . base64_encode("{$accountSid}:{$authToken}")
      ]);
      $response = curl_exec($ch);
      // if(curl_errno($ch)) {
      //     echo 'cURL error: ' . curl_error($ch);
      // } else {
      //     echo "Response: " . $response;
      // }
      curl_close($ch);
}


//send_message($receiver,"Your summercamp booked");
?>
