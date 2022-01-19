<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
require_once('../../git_heal-document/lib/HealDocument.php'); // https://github.com/TRP-Solutions/heal-document
require_once('../lib/BootSome.php');

function html($doc, $title = null, $language = null, $charset = 'UTF-8'){
	$html = $doc->el('Html');
	if(!empty($language)) $html->at(['lang'=>$language]);
	$head = $html->el('head');
	if(!empty($title)) $head->el('title')->te($title);
	$head->el('meta',['charset'=>'UTF-8']);

	return [$head,$html->el('body')];
}

$doc = new BootSome();
list($head,$body) = html($doc, 'BootSome() :: '.$page);

$head->el('meta',['name'=>'viewport','content'=>'width=device-width, initial-scale=1']);
$head->el('link',['rel'=>'shortcut icon','href'=>'#']);

$head->el('link',['rel'=>'stylesheet','href'=>'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css']);
$head->el('link',['rel'=>'stylesheet','href'=>'https://use.fontawesome.com/releases/v5.15.4/css/all.css']);

$head->el('script',['src'=>'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js']);

$head->el('link',['rel'=>'stylesheet','href'=>'../lib/BootSome.css']);
