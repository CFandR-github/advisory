# Package symfony/finder unserialize RCE

This advisory demonstrates another unserialize RCE found in Symfony project.\
Requirements:
- packages symfony/finder and symfony/http-kernel
- Any PHP 7.x version

Install packages from Composer:\
$ cat composer.json
<pre>
{
 "require": 
 "symfony/finder": "5.4.8",
 "symfony/http-kernel": "5.4.9",
 "symfony/service-contracts" : "2.5.1"
 }
}  
</pre>
$ composer install\

Lets look closer at POI-chain. Start from file vendor/symfony/http-kernel/DataCollector/DumpDataCollector.php:

![](./images/symfony_finder_rce_0day_html_4ecef5edcfea3ee7.png)

This class has interesting \_\_wakeup method:

![](./images/symfony_finder_rce_0day_html_c5826aa8dbb07531.png)

On line 181 $this→data property is set in serialized string. Foreach loop can call getIterator() method from another class that implements IteratorAggregate interface. Search for that class.\

File symfony/finder/Iterator/SortableIterator.php:\
class SortableIterator implements \\IteratorAggregate

![](./images/symfony_finder_rce_0day_html_287f742e9754c543.png)

How to get command execution from this method?\
See description of **uasort** function on php.net:

![](./images/symfony_finder_rce_0day_html_dbe19da205b649ab.png)

First parameter is array to be sorted.\
Second parameter is the comparison function. It can be any callable, set it to "**system**".\
To pass iterator\_to\_array call on line 94, set $this→iterator as an object of class HeaderBag.\
File vendor/symfony/http-foundation/HeaderBag.php:\
class HeaderBag implements \\IteratorAggregate, \\Countable\
Set this→headers an array to be passed into **uasort**.

![](./images/symfony_finder_rce_0day_html_85c2cd25d6ece41f.png)

Get RCE:

![](./images/symfony_finder_rce_0day_html_485955cda9d0ee8d.png)

Download full POC here.