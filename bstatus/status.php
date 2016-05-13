<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="/images" href="/images/favicon.png">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blog Status Script By Masterk3y</title>
</head> 
<?php
$online = "<div align='center'><a href='/nlplayer' target='_blank'>
 <img src='http://orlandohc.ddns.net/images/nlplayer/on-air.gif' /></a></div><iframe name='window' src='/nlplayer/bplayer/index.html' marginwidth='0' scrolling='no' frameborder='0'></iframe>
"; // Cuando el flujo esta en linea
$offline = "<div align='center'><a href='/nlplayer' target='_blank'>
 <img src='http://orlandohc.ddns.net/images/nlplayer/off-air.gif' /></a></div><div align='center'><a href='/nlplayer' target='_blank'>
 <img src='http://orlandohc.ddns.net/nlplayer/plugin/images/autodj_icon.png' /><div>"
 ; // Cuando el flujo no esta en linea
$host = "192.168.2.100"; // Direccion local del servidor streaming | Cambio a Ubuntu Server 10/05/2016
$port = "8000";  // Puerto a utilizar en streaming 
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