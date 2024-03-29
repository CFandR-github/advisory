# Advisory of Exploits AI POP Builder

Collection of advisory:
## Symfony <= 3.4.47 0day GMP Type Confusion RCE

### symfony/process 
Idea:
PHP <= 5.6.40 with GMP + packages symfony/process and symfony/routing + fast "\__destruct"

POC source: [./symfony_process_gmp/poc.php](./symfony_process_gmp/poc.php)

[Advisory](./symfony_process_gmp/symfony_0day_GMP_exploit.md)

### symfony/dependency-injection
Idea:
PHP <= 5.6.40 with GMP + packages symfony/dependency-injection and symfony/routing + var overwrite into boolean 

POC source: [./symfony_rewrite_with_boolean/tester.php](./symfony_rewrite_with_boolean/tester.php)

[Advisory](./symfony_rewrite_with_boolean/rewrite_with_boolean_gmp.md)

## swiftmailer/swiftmailer <= 5.4.12 0day GMP Type Confusion RCE
Idea:
PHP <= 5.6.40 with GMP + packages swiftmailer/swiftmailer and pear/net_geoip + var pass by ref

POC source: [./swiftmailer_gmp_rce/poc.php](./swiftmailer_gmp_rce/poc.php)

[Advisory](./swiftmailer_gmp_rce/swiftmailer_0day_GMP_exploit.md)

## Drupal <= 8.7.14 GMP Type Confusion RCE
Idea:
PHP <= 5.6.40 with GMP + Drupal CMS

POC source: [./drupal_gmp_rce/poc.php](./drupal_gmp_rce/poc.php)

[Advisory](./drupal_gmp_rce/drupal_gmp_unserialize_rce.md)

## phpmailer + swiftmailer 0day unserialize RCE (any PHP version)
Idea:
packages phpmailer/phpmailer and swiftmailer/swiftmailer + is_resource bypass + fast "\__destruct"

POC source: [./phpmailer_rce_poi/phpmailer_poc.php](./phpmailer_rce_poi/phpmailer_poc.php)

[Advisory](./phpmailer_rce_poi/phpmailer_unserialize_rce_0day.md)

## Yii 1.x unserialize RCE (any PHP version)
Idea:
package yiisoft/yii + start POI from "\__get" method

POC source: [./yii1_rce_poi/yii1_rce_poi.php](./yii1_rce_poi/yii1_rce_poi.php)

[Advisory](./yii1_rce_poi/Yii_1_rce.md)

## symfony/finder unserialize RCE (PHP 7.x)
Idea:
packages symfony/finder and symfony/http-kernel + getIterator() call

POC source: [./symfony_finder_rce/poc.php](./symfony_finder_rce/poc.php)

[Advisory](./symfony_finder_rce/symfony_finder_rce_0day.md)

## opis/closure + laravel/framework unserialize RCE
Idea:
package opis/closure + custom Serializable method + include

POC source: [./opis_closure_rce/opis_closure_poi.php](./opis_closure_rce/opis_closure_poi.php)

[Advisory](./opis_closure_rce/opis_closure_advisory.md)

## doctrine/doctrine-bundle unserialize RCE
Idea:
combine LFI and file write POP-chains in doctrine/doctrine-bundle package to get RCE

POC source: [./doctrine_rce/doctrine_poi_gen.php](./doctrine_rce/doctrine_poi_gen.php)

[Advisory](./doctrine_rce/doctrine_rce_advisory.md)

# Contacts
Project channel in Telegram:
- [https://t.me/CFandR_project](https://t.me/CFandR_project)
