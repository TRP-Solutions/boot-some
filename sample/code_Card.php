<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
require_once '../lib/BootSomeCard.php';
HealDocument::register_plugin('BootSomeCard');

require_once '../lib/BootSomeTables.php';
HealDocument::register_plugin('BootSomeTable');

$main = BootSome::$body->container();
$main->el('h1')->te('Card');

$card = $main->card();
$card->header()->te('Card header');
$card->body()->el('code')->te('Some code',true);

$group = $card->listgroup();
$group->item()->te('Cras justo odio');
$group->item()->te('Dapibus ac facilisis in');
$group->item()->te('Vestibulum at eros');
$group->item('https://www.google.com/search?q=This+is+a+link')->te('This is a link');

$table = $card->table();

$tr = $table->thead()->tr();
$tr->th()->te('TH1');
$tr->th()->te('TH2');
$tr->th()->te('TH3');

$tbody = $table->tbody();
$tr = $tbody->tr();
$tr->td()->te('Beef leberkas kielbasa');
$tr->td()->te('Shoulder doner pork');
$tr->td()->te('Beef leberkas kielbasa kielbasa');

$tr = $tbody->tr();
$tr->td()->te('Beef leberkas kielbasa');
$tr->td()->te('Shoulder doner doner pork');
$tr->td()->te('Shoulder doner pork');

$tr = $tbody->tr();
$tr->td()->te('Beef leberkas leberkas kielbasa');
$tr->td()->te('Beef leberkas kielbasa');
$tr->td()->te('Shoulder doner pork');

$body = $card->body();

$group = $body->form_horizontal();
$group->label('Input','input1');
$group->input('input1','Value');

$group = $body->form_horizontal();
$group->label('Input','input1');
$group->input('input1','Value');

$card->footer()->te('This is the end');

$card->footer()->el('div')->form_inline()->button('Function','explosion','link');
