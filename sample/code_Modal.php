<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
require_once '../lib/BootSomeModal.php';
HealDocument::register_plugin('BootSomeModal');

require_once '../lib/BootSomeTables.php';
HealDocument::register_plugin('BootSomeTable');

// Open modal
BootSome::$body->at(['class'=>'modal-open']);
BootSome::$dialog->at(['open']);

$main = BootSome::$body->container();
$main->el('h1')->te('Modal');

$js = "document.body.classList.add('modal-open');";
$js .= "document.getElementById('dialog').setAttribute('open','');";
$main->button('Open','folder-open','info')->at(['onclick'=>$js]);

for($i = 1;$i < 50;$i++) {
	$main->el('br');
	$main->te('ScrollTestFill: '.$i);
}

$modal = BootSome::$dialog->modal();

$header = $modal->header();
$header->title('Title');
$closejs = "document.getElementById('dialog').removeAttribute('open');";
//$closejs .= "document.getElementById('dialog').innerHTML='';";
$closejs .= "document.body.classList.remove('modal-open');";
$header->close()->at(['onclick'=>$closejs]);

$tabs = $modal->navs('tabs');
$tabs->item()->a('#','Tab1')->at(['onclick'=>'active();']);
$tabs->item()->a('#','Tab2',true)->at(['onclick'=>'active();']);
$tabs->item()->a('#','Tab3')->at(['onclick'=>'active();']);
$tabs->item()->a('#','Tab4')->at(['onclick'=>'active();']);

$modalgroup = $modal->modalgroup();

$form = $modalgroup->body('');

$inline = $form->el('div')->form_inline();
$inline->label('Extended');
$js = "window.location.href='?".$page."&Source'";
$inline->button('Source','code')->at(['onclick'=>$js]);

$group = $form->form_horizontal();
$group->label('Input','input1');
$group->input('input1','Value');

$group = $form->form_horizontal();
$group->label('Checkbox');
$group->checkbox('check1',true,'On','Check1');
$group->checkbox('check2',false,'On','Check2');

$form->el('hr');

$group = $form->form_horizontal();
$group->label('Radio');
$group->radio('radio1','radioA',true,'RadioA');
$group->radio('radio1','radioB',false,'RadioB');

$body2 = $modalgroup->body();

$inline = $body2->el('div')->form_inline();
$inline->label('Basic');
$inline->input('hello');
$inline->button('Reload','file','warning','.');
$inline->button('Save','save','danger');

$table = $body2->table();
$tr = $table->thead()->tr();
$tr->th()->te('TH1');
$tr->th()->te('TH2');
$tr->th()->te('TH3');

$tbody = $table->tbody();

for($i=1;$i<=5;$i++) {
	$tr = $tbody->tr();
	$tr->td()->te('Buffalo cow prosciutto rump capicola pork chop tenderloin');
	$tr->td()->te('Beef leberkas kielbasa, tri-tip flank sausage pork.');
	$tr->td()->te('Shoulder doner pork belly, bresaola hamburger ground round');
}

$footer = $modal->footer();
$footer->button('Close')->at(['onclick'=>$closejs]);
