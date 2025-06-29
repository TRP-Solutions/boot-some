<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
declare(strict_types=1);
require_once('../../heal-document/lib/HealDocument.php'); // https://github.com/TRP-Solutions/heal-document
require_once('../lib/BootSome.php');

$modal = new BootSomeModalGroup();
$body = $modal->body();
$body->alert()->te('Sample text');

echo $modal;
