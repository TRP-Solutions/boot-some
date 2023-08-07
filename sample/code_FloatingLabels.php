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
$row->col('col-12','col-md-4')->input('Input','input4')->datalist(['String1','String2','String3']);

$row->col('col-12','col-md-4')->input('Number','input5',123)->at(['type'=>'number']);

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

$radio = $row->col('col-12','col-md-4')->radio('Radio','input9','radio2');
$radio->options([
	'radio1' => 'Radio 1',
	'radio2' => 'Radio 2',
	'radio3' => 'Radio 3'
]);

$row->col('col-12','col-md-4')->checkbox('Checkbox A','input10');
$row->col('col-12','col-md-4')->checkbox('Checkbox B','input11',true)->id('ip10');

$row->col('col-12','col-md-8')->textarea('Textarea','input12','Text Content')->id('tc');

$row->col('col-12','col-md-4')->input('Date','input13','2023-12-31')->at(['type'=>'date']);

$inputgroup = $row->col('col-12','col-md-4')->inputgroup();
$select = $inputgroup->select('Country Code','input14');
$select->options([
	'45' => '+45',
	'46' => '+46',
	'47' => '+47'
]);
$inputgroup->input('Phone Number','input15');



$row = $form->row_gutter('g-2 mt-5');
$row->col('col-12','col-md-4')->input('Input','input4d','Value')->disabled();

$row->col('col-12','col-md-4')->input('Number','input5d',123)->at(['type'=>'number'])->disabled();

$row->col('col-12','col-md-4')->file('File','input6d')->disabled();

$select = $row->col('col-12','col-md-4')->select('Select','input7d')->disabled();
$select->options([
	'opt1' => 'Option 1',
	'opt2' => 'Option 2'
]);

$tokenselect = $row->col('col-12','col-md-8')->tokenselect('Token Select')->disabled();
$tokenselect->options([
	'tok1' => 'Token 1',
	'tok2' => 'Token 2',
	'tok3' => 'Token 3'
]);
$tokenselect->tokens(['tok1','tok2']);

$radio = $row->col('col-12','col-md-4')->radio('Radio','radio2')->disabled();
$radio->options([
	'radio1' => 'Radio 1',
	'radio2' => 'Radio 2',
	'radio3' => 'Radio 3'
]);

$row->col('col-12','col-md-4')->checkbox('Checkbox A','input10d')->disabled();
$row->col('col-12','col-md-4')->checkbox('Checkbox B','input11d',true)->disabled();

$row->col('col-12','col-md-8')->textarea('Textarea','input12d','Text Content')->disabled();

$row->col('col-12','col-md-4')->input('Date','input13d','2023-12-31')->at(['type'=>'date'])->disabled();

$inputgroup = $row->col('col-12','col-md-4')->inputgroup();
$select = $inputgroup->select('Country Code','input14d')->disabled();
$select->options([
	'45' => '+45',
	'46' => '+46',
	'47' => '+47'
]);
$inputgroup->input('Phone Number','input15d')->disabled();
