<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
$main = BootSome::$body->container();
$main->el('h1')->te('Jumbotron');

$jumbotron = $main->jumbotron();
$jumbotron->el('h1')->te('Some header');
$jumbotron->el('p')->te('Some information');
