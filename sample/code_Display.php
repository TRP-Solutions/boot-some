<?php
$main = $body->container();
$main->el('h1')->te('Display');

$main->alert()->te('test')->display();
$main->alert()->te('Show on <= md')->display('block','lg-none');
$main->alert('danger')->te('Show on >= md')->display('none','md-block');