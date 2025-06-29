<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
declare(strict_types=1);
require_once '../lib/BootSomeFormsFloating.php';
\TRP\HealDocument\HealDocument::register_plugin('BootSomeFormsFloating');

require_once '../lib/BootSomeGrid.php';
\TRP\HealDocument\HealDocument::register_plugin('BootSomeGrid');

BootSome::$head->el('script',['src'=>'../../popperjs/popper.js']);
BootSome::$head->el('script',['src'=>'../../tiny-template/TinyTemplate.js']);
BootSome::$head->el('script',['src'=>'../lib/BootSomeForms.js']);
BootSome::$head->el('script',['src'=>'../lib/BootSomeTokenSelect.js']);

$main = BootSome::$body->container();
$main->el('h1')->te('Grid Layout - Floating Label Forms');
$form = $main->form('.','get');
$grid = $form->grid(2)->columns(3,'md');
$grid->input('Input','input4')->datalist(['String1','String2','String3']);

$grid->input('Number','input5',123)->at(['type'=>'number']);

$grid->file('File','input6');

$select = $grid->select('Select','input7');
$select->options([
	'opt1' => 'Option 1',
	'opt2' => 'Option 2'
]);

$tokenselect = $grid->span(2)->tokenselect('Token Select','input8');
$tokenselect->options([
	'tok1' => 'Token 1',
	'tok2' => 'Token 2',
	'tok3' => 'Token 3'
]);
$tokenselect->tokens(['tok1','tok2']);

$radio = $grid->radio('Radio','input9','radio2');
$radio->options([
	'radio1' => 'Radio 1',
	'radio2' => 'Radio 2',
	'radio3' => 'Radio 3'
]);

$grid->checkbox('Checkbox A','input10');
$grid->checkbox('Checkbox B','input11',true,'something')->id('ip10');

$grid->span(2)->textarea('Textarea','input12','Text Content')->id('tc');

$grid->input('Date','input13','2023-12-31')->at(['type'=>'date']);

$inputgroup = $grid->inputgroup();
$select = $inputgroup->select('Country Code','input14');
$select->options([
	'45' => '+45',
	'46' => '+46',
	'47' => '+47'
]);
$inputgroup->input('Phone Number','input15');

$inputgroup = $grid->inputgroup();
$datalist = $inputgroup->datalist('Browser','browser')->at(['required']);
$datalist->option('Chrome',1);
$datalist->option('Edge',2);
$datalist->option('Firefox',3);
$datalist->option('Internet Explorer',4);
$datalist->option('Lynx',5);
$datalist->option('Safari',6);

$grid = $form->grid_horizontal(6,true)->rows(5,'lg')->at(['class'=>'mt-5'],true);

$grid->input('Input','input4d','Value');

$grid->input('Number','input5d',123)->at(['type'=>'number']);

$tokenselect = $grid->tokenselect('Token Select');
$tokenselect->get_wrapper()->grid_place(column:2,column_span:2,row_span:2);
$tokenselect->options([
	'tok1' => 'Token 1',
	'tok2' => 'Token 2',
	'tok3' => 'Token 3',
	'tok1a' => 'Token 1A',
	'tok2a' => 'Token 2A',
	'tok3a' => 'Token 3A',
	'tok1b' => 'Token 1B',
	'tok2b' => 'Token 2B',
	'tok3b' => 'Token 3B',
	'tok1c' => 'Token 1C',
	'tok2c' => 'Token 2C',
	'tok3c' => 'Token 3C'
]);
$tokenselect->tokens(['tok1','tok2','tok1a','tok2a','tok1b','tok2b','tok1c','tok2c']);

$textarea = $grid->textarea('Textarea','input12d','Text Content');
$textarea->get_wrapper()->grid_span(2,2);
$textarea->at(['style'=>'height:100%;']);

$grid->file('File','input6d');

$select = $grid->select('Select','input7d');
$select->options([
	'opt1' => 'Option 1',
	'opt2' => 'Option 2'
]);


$radio = $grid->radio('Radio','radio2');
$radio->options([
	'radio1' => 'Radio 1',
	'radio2' => 'Radio 2',
	'radio3' => 'Radio 3'
]);

$grid->checkbox('Checkbox A','input10d');
$grid->checkbox('Checkbox B','input11d',true);


$grid->input('Date','input13d','2023-12-31')->at(['type'=>'date']);

$inputgroup = $grid->inputgroup();
$select = $inputgroup->select('Country Code','input14d');
$select->options([
	'45' => '+45',
	'46' => '+46',
	'47' => '+47'
]);
$inputgroup->input('Phone Number','input15d');
