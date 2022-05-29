<meta content="text/html; charset=utf-8" http-equiv="content-type"></meta><title></title><meta content="LibreOffice 6.2.6.2 (Linux)" name="generator"></meta><meta content="2022-05-29T17:07:24" name="created"></meta><meta content="2022-05-29T19:39:08" name="changed"></meta><style type="text/css">
		@page { size: 8.27in 11.69in; margin: 0.79in }
		p { margin-bottom: 0.1in; direction: ltr; color: #000000; line-height: 115%; text-align: left; orphans: 2; widows: 2; background: transparent }
		p.western { font-family: "Liberation Serif", serif; font-size: 12pt; so-language: en-US }
		p.cjk { font-family: "Noto Serif CJK SC"; font-size: 12pt; so-language: zh-CN }
		p.ctl { font-family: "Lohit Devanagari"; font-size: 12pt; so-language: hi-IN }
	</style></head><body dir="ltr" lang="en-US" link="#000080" text="#000000" vlink="#800000">**Package symfony/finder unserialize RCE**

This advisory demonstrates another unserialize RCE found in Symfony project.

Requirements:

- packages symfony/finder and symfony/http-kernel
- Any PHP 7.x version

Install packages from Composer:

$ cat composer.json

{

 "require": {

 "symfony/finder": "5.4.8",

 "symfony/http-kernel": "5.4.9",

 "symfony/service-contracts" : "2.5.1"

 }

}  
$ composer install

Lets look closer at POI-chain.

Start from file vendor/symfony/http-kernel/DataCollector/DumpDataCollector.php:

![](symfony_finder_rce_0day_html_4ecef5edcfea3ee7.png)

This class has interesting \_\_wakeup method:

O![](symfony_finder_rce_0day_html_c5826aa8dbb07531.png)n line 181 $this→data property is set in serialized string. Foreach loop can call getIterator() method from another class that implements IteratorAggregate interface. Search for that class.

File symfony/finder/Iterator/SortableIterator.php:

class SortableIterator implements \\IteratorAggregate

![](symfony_finder_rce_0day_html_287f742e9754c543.png)

How to get command execution from this method?

See description of **uasort** <span style="font-weight: normal">function on php.net:</span>

![](symfony_finder_rce_0day_html_dbe19da205b649ab.png)

First parameter is array to be sorted.

Second parameter is the comparison function. It can be any callable, set it to “**system**”.

To pass iterator\_to\_array call on line 94, set $this→iterator as an object of class HeaderBag.

File vendor/symfony/http-foundation/HeaderBag.php:

class HeaderBag implements \\IteratorAggregate, \\Countable

S![](symfony_finder_rce_0day_html_85c2cd25d6ece41f.png)et this→headers an array to be passed into **uasort**.

Download full POC here.