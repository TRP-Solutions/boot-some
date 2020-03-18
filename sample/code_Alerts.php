<?php
$main = $body->container();
$main->el('h1')->te('Alert');

$main->alert()->te('Some information');
$main->alert('danger')->te('Important information');