<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
declare(strict_types=1);
require_once '../lib/BootSomeFormsFloating.php';
\TRP\HealDocument\HealDocument::register_plugin('BootSomeFormsFloating');

BootSome::$head->el('script',['src'=>'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js']);
BootSome::$head->el('script',['src'=>'../../tiny-template/TinyTemplate.js']);
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
$optgroup = $select->optgroup('GroupA');
$optgroup->option('All','all');
$optgroup->options([
	'A1' => 'GroupA.1',
	'A2' => 'GroupA.2'
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
$row->col('col-12','col-md-4')->checkbox('Checkbox B','input11',true,'something')->id('ip10');

$row->col('col-12','col-md-8')->textarea('Textarea','input12','Text Content')->id('tc');

$row->col('col-12','col-md-4')->date('Date','input13','2023-12-31');

$inputgroup = $row->col('col-12','col-md-4')->inputgroup();
$select = $inputgroup->select('Country Code','input14');
$select->options([
	'45' => '+45',
	'46' => '+46',
	'47' => '+47'
]);
$inputgroup->input('Phone Number','input15');

$row = $form->row_gutter('g-2 mt-5');

$row->col('col-12','col-md-4')->input('Input','input4r')->datalist(['String1','String2','String3'])->required();

$row->col('col-12','col-md-4')->input('Number','input5r')->at(['type'=>'number'])->required();

$row->col('col-12','col-md-4')->file('File','input6r')->required();

$select = $row->col('col-12','col-md-4')->select('Select','input7r')->required();
$select->options([
	'' => 'Empty Value',
	'opt1' => 'Option 1',
	'opt2' => 'Option 2'
]);
$optgroup = $select->optgroup('GroupA');
$optgroup->option('All','all');
$optgroup->options([
	'A1' => 'GroupA.1',
	'A2' => 'GroupA.2'
]);

$tokenselect = $row->col('col-12','col-md-8')->tokenselect('Token Select','input8r')->required();
$tokenselect->options([
	'tok1' => 'Token 1',
	'tok2' => 'Token 2',
	'tok3' => 'Token 3'
]);

$radio = $row->col('col-12','col-md-4')->radio('Radio','input9r')->required();
$radio->options([
	'radio1' => 'Radio 1',
	'radio2' => 'Radio 2',
	'radio3' => 'Radio 3'
]);

$row->col('col-12','col-md-4')->checkbox('Checkbox A','input10r')->required();
$row->col('col-12','col-md-4')->checkbox('Checkbox B','input11r',true,'something')->required()->id('ip10r');

$row->col('col-12','col-md-8')->textarea('Textarea','input12r')->required()->id('tcr');

$row->col('col-12','col-md-4')->date('Date','input13r')->required();

$inputgroup = $row->col('col-12','col-md-4')->inputgroup();
$select = $inputgroup->select('Country Code','input14r')->required();
$select->options([
	'45' => '+45',
	'46' => '+46',
	'47' => '+47'
]);
$inputgroup->input('Phone Number','input15r')->required();

$inputgroup = $row->col('col-12','col-md-4')->inputgroup();
$datalist = $inputgroup->datalist('Browser','browser')->required();
$datalist->option('Chrome',1);
$datalist->option('Edge',2);
$datalist->option('Firefox',3);
$datalist->option('Internet Explorer',4);
$datalist->option('Lynx',5);
$datalist->option('Safari',6);

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
