<?php
$main = $body->container();
$main->el('h1')->te('Badge');

$main->el('span')->te('Information')->badge();
$main->el('br');
$main->a('http://google.com/search?q=html5+elements')->te('Important!')->badge('danger');
?>
