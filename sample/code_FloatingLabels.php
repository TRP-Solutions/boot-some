<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
require_once '../lib/BootSomeFormsFloating.php';
HealDocument::register_plugin('BootSomeFormsFloating');

BootSome::$head->el('script',['src'=>'../../git_popperjs/popper.js']);
BootSome::$head->el('script',['src'=>'../../git_tiny-template/TinyTemplate.js']);
BootSome::$head->el('script',['src'=>'../lib/BootSomeForms.js']);
BootSome::$head->el('script',['src'=>'../lib/BootSomeTokenSelect.js']);

$main = BootSome::$body->container();
$main->el('h1')->te('Forms - Floating');
$form = $main->form('.','get');
$row = $form->row_gutter('g-2');
$row->col('col-12','col-md-4')->input('Input','Value','input5');

$row->col('col-12','col-md-4')->input('Number',123,'input5')->at(['type'=>'number']);

$row->col('col-12','col-md-4')->file('File','input6');

$select = $row->col('col-12','col-md-6')->select('Select','input7');
$select->options([
	'opt1' => 'Option 1',
	'opt2' => 'Option 2'
]);

$tokenselect = $row->col('col-12','col-md-6')->tokenselect('Token Select','input8');
$tokenselect->options([
	'tok1' => 'Token 1',
	'tok2' => 'Token 2',
	'tok3' => 'Token 3'
]);
$tokenselect->tokens(['tok1','tok2']);
