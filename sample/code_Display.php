<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
declare(strict_types=1);
require_once '../lib/BootSomeAlert.php';
\TRP\HealDocument\HealDocument::register_plugin('BootSomeAlert');

$main = BootSome::$body->container();
$main->el('h1')->te('Display');

$main->alert()->te('test')->display();
$main->alert()->te('Show on <= md')->display('block','lg-none');
$main->alert('danger')->te('Show on >= md')->display('none','md-block');
