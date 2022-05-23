<?php

/*

Needs PHP 5.6.* compiled with '--with-gmp'

1) Install packages from composer
$ composer install

2) Run POC:
$ /home/user/php-5.6.40/bin/php ./tester.php ./generated_poi/poi1.bin 

*/

include __DIR__.'/vendor/autoload.php';

unserialize(file_get_contents($argv[1]));

?>