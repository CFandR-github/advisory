# Advisory of Exploits AI POP Builder

Collection of advisory:
## Symfony <= 3.4.47 0day GMP RCE</li1>
### symfony/process 
Idea:
PHP <= 5.6.40 with GMP + packages symfony/process and symfony/routing + fast __destruct

POC source: [./symfony_process_gmp/poc.php](./symfony_process_gmp/poc.php)

[Advisory](./symfony_process_gmp/symfony_3.4.47_0day_GMP_exploit.pdf)


### symfony/dependency-injection
Idea:
PHP <= 5.6.40 with GMP + packages symfony/dependency-injection and symfony/routing + var overwrite into boolean 

POC source: [./symfony_rewrite_into_bool/tester.php](./symfony_rewrite_into_bool/tester.php)

[Advisory](./symfony_rewrite_into_bool/symfony_rewrite_with_boolean.pdf)