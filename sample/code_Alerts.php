<?php
$main = $body->container();
$main->el('h1')->te('Alert');

$table = $main->alert()->te('Some information');
$table = $main->alert('danger')->te('Important information');
?>
