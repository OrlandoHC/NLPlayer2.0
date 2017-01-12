<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="/images" href="/images/favicon.png">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width , height=device-height " />
<title>Status Script By Masterk3y</title>
</head>
<?php
$online = "<div align='center'><img src='http://orlandohc.ddns.net/images/nlplayer/on-air.gif' alt='Stream Online' border='0'><div align='center'><iframe name='window' src='/nlplayer/songinfo.html'  width='425' height='70' marginwidth='0' scrolling='no' frameborder='0'></iframe></div><div align='center'><iframe name='window' src='/nlplayer/on/' width='400' height='400' marginwidth='0' scrolling='no' frameborder='0'></iframe></div>
"; // Cuando el flujo esta en linea //
$offline = "<div align='center'><img src='http://orlandohc.ddns.net/images/nlplayer/off-air.gif' alt='Stream Offline' border='0'><iframe name='window' src='/nlplayer/off/' width='395' height='600' marginwidth='0' scrolling='no' frameborder='0'></iframe></div>"; // Cuando el flujo no esta en linea
$host = "192.168.2.100";
$port = "8000";
$fp = @fsockopen($host,$port,$errno,$errstr,1);
if (!$fp) { 
	$status = $offline;
} else { 
	fputs($fp, "GET /7.html HTTP/1.0\r\nUser-Agent: Mozilla\r\n\r\n");
	while (!feof($fp)) {
		$info = fgets($fp);
	}
	$split = explode(',', $info);
	if ($split[1] == "0") {
		$status = $offline;
	} else {
		$status = $online;
	}
}
print $status;
?>
</div>
</body>
</html>
