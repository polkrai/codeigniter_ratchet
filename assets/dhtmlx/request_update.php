<?php

require_once __DIR__ . '/../vendor/autoload.php';

$socket = new \HemiFrame\Lib\WebSocket\WebSocket('25.9.66.162', 8988);

$socket->on("receive", function($client, $data) use($socket) {

	
});


$client = $socket->connect();

if ($client) {

	$socket->sendData($client, "grid");

	sleep(1);

	$socket->disconnectClient($client);

}