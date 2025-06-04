<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
declare(strict_types=1);
require_once '../lib/BootSomeAlert.php';
\TRP\HealDocument\HealDocument::register_plugin('BootSomeAlert');

$main = BootSome::$body->container();
$main->el('h1')->te('Alert');

$main->alert(null,true)->te('Some information');
$main->alert('danger')->te('Important information');
