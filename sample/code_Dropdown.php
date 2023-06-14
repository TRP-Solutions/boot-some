<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
require_once '../lib/BootSomeDropdown.php';
HealDocument::register_plugin('BootSomeDropdown');

$main = BootSome::$body->container();
$main->el('h1')->te('Dropdown');

$dropdown = $main->dropdown('Links');
$dropdown->a('https://www.google.com/search?q=This+is+a+link','This is a link');
$dropdown->a('https://www.google.com/search?q=This+is+a+second+link','This is a second link');

$main->el('hr');

$dropdown = $main->dropdown('Bad links','danger');
$dropdown->a('https://www.google.com/search?q=This+is+a+link','This is a link');
$dropdown->a('https://www.google.com/search?q=This+is+a+second+link','This is a second link');
