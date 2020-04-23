<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
$main = $body->container();
$main->el('h1')->te('Badge');

$main->el('span')->te('Information')->badge();
$main->el('br');
$main->a('http://google.com/search?q=important')->te('Important!')->badge('danger');
