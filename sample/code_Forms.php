<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
$head->el('script',['src'=>'../../git_popperjs/popper.js']);
$head->el('script',['src'=>'../lib/BootSomeForms.js']);

$main = $body->container(true);
$main->el('h1')->te('Forms');

$form = $main->form();
$group = $form->form_group();
$group->label('Input','input1');
$group->input('input1','Value');
$group->text('Text');

$row = $form->form_row();
$group = $row->form_group(4);
$group->label('Checkbox');
$group->checkbox('check1',true,'On','Check1');
$group->checkbox('check2',false,'On','Check2');

$group = $row->form_group(4);
$group->label('Radio');
$group->radio('radio1','radioA',true,'RadioA',true);
$group->radio('radio1','radioB',false,'RadioB',true);

$group = $row->form_group(4);
$group->label('Select','select1');
$select = $group->select('select1');
$select->options([1 => 'Option1',2 => 'Option2']);

$group = $form->form_group();
$group->label('Text','textarea1');
$group->textarea('textarea1','Content');

$form->button('Submit');

$main->el('h1')->te('Forms - Horizontal');
$form = $main->form();
$group = $form->form_horizontal(4);
$group->label('Input','input2');
$group->input('input2','Value');
$group->text('Text');

$group = $form->form_horizontal(4);
$group->label('Input','file1');
$group->file('file1');

$group = $form->form_horizontal(4);
$group->label('Checkbox');
$group->checkbox('check3',true,'On','Check3');
$group->checkbox('check4',false,'On','Check4');

$group = $form->form_horizontal(4);
$group->label('Date');
$group->date('date1');

$group = $form->form_horizontal(4);
$group->label('Input','input3');
$inputgroup = $group->inputgroup();
$prepend = $inputgroup->prepend();
$prepend->text('Fisk');
$inputgroup->input('input3','Value');
$append = $inputgroup->append();
$append->button('E-mail','envelope');

$form->button('Reload','exclamation-circle','danger','.');

$main->el('h1')->te('Forms - Inline');
$form = $main->form()->form_inline();
$form->input('input4','Value');

$select = $form->select('select1');
$select->options([1 => 'Option1',2 => 'Option2']);
$form->button('Submit');
$form->button('Link',null,'info','http://example.com');

$main->el('hr');

$form = $main->form()->form_inline();
$form->input('input4','Value');

$select = $form->select('select1');
$select->options([1 => 'Option1',2 => 'Option2']);
$form->button('Submit');
$form->button('Link',null,'info','http://example.com');
