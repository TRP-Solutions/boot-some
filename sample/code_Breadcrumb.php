<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
$main = $body->container();
$main->el('h1')->te('Breadcrumb');

$array = [];
$array[] = ['name' => 'Index','link' => '.'];
$array[] = ['name' => 'Navbar','link' => '?Navbar'];
$array[] = ['name' => 'End'];

$main->breadcrumb($array,'../Sample/');

$main->p('Example on using breadcrumb');
