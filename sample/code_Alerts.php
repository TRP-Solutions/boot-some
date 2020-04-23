<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
$main = $body->container();
$main->el('h1')->te('Alert');

$main->alert()->te('Some information');
$main->alert('danger')->te('Important information');
