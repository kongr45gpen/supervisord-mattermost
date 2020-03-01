<?php


require __DIR__ . '/mmLink.php';

$message = $argv[1];

var_dump($message);

sendMmMessage($message);

exit();
