<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
declare(strict_types=1);
require_once '../../heal-document/lib/HealDocument.php'; // https://github.com/TRP-Solutions/heal-document

require_once '../lib/BootSomeHead.php';
\TRP\HealDocument\HealDocument::register_plugin('BootSomeHead');

require_once '../lib/BootSomeBasic.php';
\TRP\HealDocument\HealDocument::register_plugin('BootSomeBasic');

require_once '../lib/BootSomeDocument.php';
BootSome::document('BootSome() :: '.$page);

BootSome::$head->link('shortcut icon','#');
BootSome::$head->css('https://use.fontawesome.com/releases/v5.15.4/css/all.css');
BootSome::$head->el('script',['src'=>'../lib/bootstrap.bundle.min.js']);
BootSome::$head->el('script',['src'=>'../../git_ufo-ajax/lib/ufo.js']);
BootSome::$head->el('script',['src'=>'../lib/BootSome.js']);
BootSome::$head->css('../lib/BootSome.css');
