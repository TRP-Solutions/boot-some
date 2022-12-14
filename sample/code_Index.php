<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
require_once('../../git_heal-document/lib/HealDocument.php'); // https://github.com/TRP-Solutions/heal-document
require_once('../lib/BootSome.php');

BootSome::document('BootSome() :: '.$page);

BootSome::$head->metadata('viewport','width=device-width, initial-scale=1');
BootSome::$head->link('shortcut icon','#');
BootSome::$head->css('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css');
BootSome::$head->css('https://use.fontawesome.com/releases/v5.15.4/css/all.css');
BootSome::$head->el('script',['src'=>'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js']);
BootSome::$head->el('script',['src'=>'../lib/BootSome.js']);
BootSome::$head->css('../lib/BootSome.css');
