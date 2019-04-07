<?php
require_once('../../git_heal-document/lib/HealHTML.php'); // https://github.com/TRP-Solutions/heal-document
require_once('../lib/BootSome.php');

$doc = new BootSome();
list($head,$body) = $doc->html('BootSome() :: '.$page);

$head->metadata('viewport','width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no');
$head->link('icon','data:,');

$head->css('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
$head->css('https://use.fontawesome.com/releases/v5.8.1/css/all.css');

$head->el('script',['src'=>'https://code.jquery.com/jquery-3.3.1.slim.min.js']);
$head->el('script',['src'=>'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js']);

$head->css('../../git_boot-theme/lib/theme.css'); // https://github.com/TRP-Solutions/boot-theme
?>