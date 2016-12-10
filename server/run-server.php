<?php
require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/config.php";

$DS = new Fr\DiffSocket(array(
	"server" => array(
  	"host" => "127.0.0.1",
  	"port" => "8000"
  )
));
$DS->addService("advanced-chat", __DIR__ . "/AdvancedChatServer.php");
$DS->run();