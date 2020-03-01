<?php

<?php

abstract class Colour
{
    const White = 0;
    const Black = 1;
    const Blue = 2;
    const Green = 3;
    const Red = 4;
    const Brown = 5;
    const Purple = 6;
    const Orange = 7;
    const Yellow = 8;
    const LimeGreen = 9;
    const Turquise = 10;
    const Cyan = 11;
    const LightBlue = 12;
    const Pink = 13;
    const Grey = 14;
    const LightGrey = 15;
    const Transparent = -1;
}

abstract class ControlCode {
    const Bold            = 0x02;     /**< Bold */
    const Color           = 0x03;     /**< Color */
    const Italic          = 0x09;     /**< Italic */
    const StrikeThrough           = 0x13;     /**< Strike-Through */
    const Reset           = 0x0f;     /**< Reset */
    const Underline2       = 0x15;     /**< Underline */
    const Underline      = 0x1f;     /**< Underline */
    //const Underline      = 037;     /**< Underline */
    const Reverse         = 0x16;     /**< Reverse */
};

function ircColour($string, $foreground, $background=NULL) {
    return "**$string**";
}

function ircControl($string, $control) {
    if ($control == ControlCode::Bold) {
        return "**$string**";
    } else if (substr($control,-1) == ControlCode::Color) {
        return "*$string*";
    } else {
        return "`$string`";
    }
}

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
