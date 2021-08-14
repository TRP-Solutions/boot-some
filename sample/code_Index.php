<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
require_once('../../git_heal-document/lib/HealHTML.php'); // https://github.com/TRP-Solutions/heal-document
require_once('../lib/BootSome.php');

$doc = new BootSome();
list($head,$body) = $doc->html('BootSome() :: '.$page);

$head->metadata('viewport','width=device-width, initial-scale=1');
$head->link('shortcut icon','#');

$head->css('https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css');
$head->css('https://use.fontawesome.com/releases/v5.15.3/css/all.css');

$head->el('script',['src'=>'https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js']);

$head->css('../lib/BootSome.css');
