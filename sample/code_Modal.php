<?php
$head->el('style')->te('div.modal{display: block;} div.modal-backdrop {opacity: .5;}');
$body->at(['class'=>'modal-open','id'=>'body']);

$main = $body->container(false);
$main->el('h1')->te('Modal');
$js = "document.getElementById('dialog').style.display = 'block';";
$js .= "document.getElementById('body').classList.add('modal-open');";
$main->button('Open','folder-open','info')->at(['onclick'=>$js]);

$dialog = $body->el('dialog',['id'=>'dialog']);
$modal = $dialog->modal();

$header = $modal->header();
$header->title('Title');
$js = "document.getElementById('dialog').style.display = 'none';";
//$js .= "document.getElementById('dialog').innerHTML='';";
$js .= "document.getElementById('body').classList.remove('modal-open');";
$header->close()->at(['onclick'=>$js]);

$body1 = $modal->body();
$form = $body1->form()->form_inline();
$form->label('Extended');
$js = "window.location.href='?".$page."&Source'";
$form->button('Source','code')->at(['onclick'=>$js]);

$form = $body1->form();
$group = $form->form_horizontal();
$group->label('Input','input1');
$group->input('input1','Value');

$group = $form->form_horizontal();
$group->label('Checkbox');
$group->checkbox('check1',true,'On','Check1');
$group->checkbox('check2',false,'On','Check2');

$group = $form->form_horizontal();
$group->label('Radio');
$group->radio('radio1','radioA',true,'RadioA');
$group->radio('radio1','radioB',false,'RadioB');

$body2 = $modal->body();
$form = $body2->form()->form_inline();
$form->label('Basic');
$form->input('hello');
$form->button('Reload','file','warning','.');
$form->button('Save','save','danger');

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
?>
