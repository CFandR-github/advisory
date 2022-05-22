# Advisory of Exploits AI POP Builder

Collection of advisory:
## Symfony <= 3.4.47 0day GMP RCE

### symfony/process 
Idea:
PHP <= 5.6.40 with GMP + packages symfony/process and symfony/routing + fast \__destruct

POC source: [./symfony_process_gmp/poc.php](./symfony_process_gmp/poc.php)

[Advisory](./symfony_process_gmp/symfony_0day_GMP_exploit.md)

### symfony/dependency-injection
Idea:
PHP <= 5.6.40 with GMP + packages symfony/dependency-injection and symfony/routing + var overwrite into boolean 

POC source: [./symfony_rewrite_with_boolean/tester.php](./symfony_rewrite_with_boolean/tester.php)

[Advisory](./symfony_rewrite_with_boolean/rewrite_with_boolean_gmp.md)

# Contacts
Project channel in Telegram:
- [https://t.me/CFandR_project](https://t.me/CFandR_project)