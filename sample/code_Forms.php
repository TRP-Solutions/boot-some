<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
$head->el('script',['src'=>'../../git_popperjs/popper.js']);
$head->el('script',['src'=>'../lib/BootSomeForms.js']);

$main = $body->container();
$main->el('h1')->te('Forms');

$form = $main->el('form');
$group = $form->form_group();
$group->label('Input','input1');
$group->input('input1','Value');
$group->text('Text');

$row = $form->row();
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
$select->option('Option1',1);
$select->option('Option2',2);

$group = $form->form_group();
$group->label('Text','textarea1');
$group->textarea('textarea1','Content');

$group = $form->form_group(null,true);
$group->button('Submit');
$group->button('Reset',null,'danger')->at(['type'=>'reset']);
$group->button('Cancel',null,'secondary','.');

$main->el('h1')->te('Forms - Horizontal');
$form = $main->el('form');
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
$group->date('date1')->at(['data-suggest'=>date('Y-m-d',strtotime("+3 month"))]);

$group = $form->form_horizontal(4);
$group->label('Date');
$group->date('date2')->at(['data-suggest'=>'date1']);

$group = $form->form_horizontal(4);
$group->label('Input','input3');
$inputgroup = $group->inputgroup();
$inputgroup->text('Fisk');
$inputgroup->input('input3','Value');
$inputgroup->button('E-mail','envelope');

$group = $form->form_horizontal(4);
$group->button('Reload','exclamation-circle','warning','.');

$main->el('h1')->te('Forms - Inline');
$form = $main->el('form')->form_inline();
$form->input('input4','Value');

$select = $form->select('select1');
$select->option('Option1',1);
$select->option('Option2',2);
$form->button('Submit');
$form->label('Søg');
$form->input('search','Google');
$form->label('Søg');
$form->input('search','Google');

$main->el('hr');

$form = $main->el('form')->form_inline();
$form->input('input4','Value');

$select = $form->select('select1');
$select->option('Option1',1);
$select->option('Option2',2);
$form->button('Link',null,'info','http://example.com');
