<?php

function sendMmMessage($message, $hook = 'njdafsn32aoalf45014klr') {
  $fields_string="";

  //set POST variables
  $url = 'https://my.mattermost.instance.com/hooks/' . $hook;

  //open connection
  $ch = curl_init();

  $json = 'payload=' . urlencode(json_encode(["username"=>"Supervisord","text"=>$message]));

  //set the url, number of POST vars, POST data
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, TRUE);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  //execute post
  $result = curl_exec($ch);


  //close connection
  curl_close($ch);

  //echo "\n\n";
}
