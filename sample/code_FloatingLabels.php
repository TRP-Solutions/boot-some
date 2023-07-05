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
$row->col('col-12','col-md-4')->input('Input','Value','input4');

$row->col('col-12','col-md-4')->input('Number',123,'input5')->at(['type'=>'number']);

$row->col('col-12','col-md-4')->file('File','input6');

$select = $row->col('col-12','col-md-4')->select('Select','input7');
$select->options([
	'opt1' => 'Option 1',
	'opt2' => 'Option 2'
]);

$tokenselect = $row->col('col-12','col-md-8')->tokenselect('Token Select','input8');
$tokenselect->options([
	'tok1' => 'Token 1',
	'tok2' => 'Token 2',
	'tok3' => 'Token 3'
]);
$tokenselect->tokens(['tok1','tok2']);

$radio = $row->col('col-12','col-md-4')->radio('Radio','radio2','input9');
$radio->options([
	'radio1' => 'Radio 1',
	'radio2' => 'Radio 2',
	'radio3' => 'Radio 3'
]);

$row->col('col-12','col-md-4')->checkbox('Checkbox A',false,'input10');
$row->col('col-12','col-md-4')->checkbox('Checkbox B',true,'input11');

$row->col('col-12','col-md-8')->textarea('Textarea','Text Content','input12');

$row->col('col-12','col-md-4')->input('Date','2023-12-31','input13')->at(['type'=>'date']);

$inputgroup = $row->col('col-12','col-md-4')->inputgroup();
$select = $inputgroup->select('Country Code','input14');
$select->options([
	'45' => '+45',
	'46' => '+46',
	'47' => '+47'
]);
$inputgroup->input('Phone Number','','input15');



$row = $form->row_gutter('g-2 mt-5');
$row->col('col-12','col-md-4')->input('Input','Value','input4d')->disabled();

$row->col('col-12','col-md-4')->input('Number',123,'input5d')->at(['type'=>'number'])->disabled();

$row->col('col-12','col-md-4')->file('File','input6d')->disabled();

$select = $row->col('col-12','col-md-4')->select('Select','input7d')->disabled();
$select->options([
	'opt1' => 'Option 1',
	'opt2' => 'Option 2'
]);

$tokenselect = $row->col('col-12','col-md-8')->tokenselect('Token Select','input8d')->disabled();
$tokenselect->options([
	'tok1' => 'Token 1',
	'tok2' => 'Token 2',
	'tok3' => 'Token 3'
]);
$tokenselect->tokens(['tok1','tok2']);

$radio = $row->col('col-12','col-md-4')->radio('Radio','radio2','input9d')->disabled();
$radio->options([
	'radio1' => 'Radio 1',
	'radio2' => 'Radio 2',
	'radio3' => 'Radio 3'
]);

$row->col('col-12','col-md-4')->checkbox('Checkbox A',false,'input10d')->disabled();
$row->col('col-12','col-md-4')->checkbox('Checkbox B',true,'input11d')->disabled();

$row->col('col-12','col-md-8')->textarea('Textarea','Text Content','input12d')->disabled();

$row->col('col-12','col-md-4')->input('Date','2023-12-31','input13d')->at(['type'=>'date'])->disabled();

$inputgroup = $row->col('col-12','col-md-4')->inputgroup();
$select = $inputgroup->select('Country Code','input14d')->disabled();
$select->options([
	'45' => '+45',
	'46' => '+46',
	'47' => '+47'
]);
$inputgroup->input('Phone Number','','input15d')->disabled();
