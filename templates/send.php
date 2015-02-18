<?php   
$socket = fsockopen("udp://127.0.0.1", 65506, $errno, $errstr);

$Send = "";
foreach($_REQUEST["Bytes"] as $Byte)
	$Send .= chr($Byte);

echo fputs($socket, $Send);
?>