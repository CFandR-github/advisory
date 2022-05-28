# Yii 1.x unserialize RCE 

Requirements:
- any Yii 1.x version
- need property read from unserialized object

Install Yii 1.x from Composer:\
$ composer require yiisoft/yii\
Create Yii test page with minimal code to initialize web-application.
<pre>
require './vendor/autoload.php';
require './vendor/yiisoft/yii/framework/yii.php';

$config = array('basePath'=> '/var/www/', 'components' => array('cache' => array('class' => 'CDummyCache')));
Yii::createWebApplication($config);
</pre>

Start object injection from "magic" method \_\_get. File yiisoft/yii/framework/base/Cmodule.php:

![](./images/Yii_1_rce_html_3591babb58d88a1e.png)

If there is no component in $this→\_components array, the component configuration is taken from $this-&gt;\_componentConfig array, and component is initialized using Yii::createComponent.

![](./images/Yii_1_rce_html_d10fc47d81aa745d.png)

Jump to Yii:createComponent in yiisoft/yii/framework/YiiBase.php. There is arbitrary object instantiation!

![](./images/Yii_1_rce_html_243eda27c5fdca3e.png)

We control class name, constructor arguments and object properties.

![](./images/Yii_1_rce_html_e4ce4bda420dc6d6.png)

After component creation, call init() method on line 394. Component has class CoutputCache.\
File yiisoft/yii/framework/web/widgets/COutputCache.php

![](./images/Yii_1_rce_html_de9bf51c3759a754.png)

![](./images/Yii_1_rce_html_fd3ae1c03feb3dab.png)

![](./images/Yii_1_rce_html_5ff2feb646f72a69.png)

In getCacheKey method evaluateExpression is called.

![](./images/Yii_1_rce_html_f14ae1c58cda0205.png)

![](./images/Yii_1_rce_html_b35a08be45c660d.png)

**Finally get eval** call in evaluateExpression method! File yiisoft/yii/framework/base/Ccomponent.php:

[POC](./yii1_rce_poi.php) can be found here.