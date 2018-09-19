<?php
$main = $body->container(true);
$main->el('h1')->te('Forms');

$form = $main->form();
$group = $form->group();
$group->label('Input','input1');
$group->input('input1','Value');
$group->text('Text');

$row = $form->row();
$group = $row->group(4);
$group->label('Checkbox');
$group->checkbox('check1',true,'On','Check1');
$group->checkbox('check2',false,'On','Check2');

$group = $row->group(4);
$group->label('Radio');
$group->radio('radio1','radioA',true,'RadioA');
$group->radio('radio1','radioB',false,'RadioB');

$group = $row->group(4);
$group->label('Select','select1');
$select = $group->select('select1');
$select->options([1 => 'Option1',2 => 'Option2']);

$group = $form->group();
$group->label('Text','textarea1');
$group->textarea('textarea1','Content');

$form->button('Submit');

$main->el('pre')->el('code')->te("");

$main->el('h1')->te('Forms - Horizontal');
$form = $main->form(null,null,BOOTSOME_FORM_HORIZONTAL);
$group = $form->group(4);
$group->label('Input','input1');
$group->input('input1','Value');

$group = $form->group(4);
$group->label('Input','input1');
$inputgroup = $group->inputgroup();
$prepend = $inputgroup->prepend();
$prepend->text('Fisk');
$inputgroup->input('input1','Value');
$append = $inputgroup->append();
$append->button('E-mail','envelope');

$form->button('Reset','exclamation-circle','danger');

$main->el('h1')->te('Forms - Inline');
$form = $main->form(null,null,BOOTSOME_FORM_INLINE);
$form->input('input1','Value');

$select = $form->select('select1');
$select->options([1 => 'Option1',2 => 'Option2']);
$form->button('Submit');
?>
