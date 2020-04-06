<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
$main = $body->container();
$main->el('h1')->te('Tables');

$table = $main->table();
$tr = $table->thead()->tr();
$tr->th()->te('TH1');
$tr->th()->te('TH2');
$tr->th()->te('TH3');
$tr->th()->te('TH4');
$tr->th()->te('TH5');

$tbody = $table->tbody();

for($i=1;$i<=5;$i++) {
	$tr = $tbody->tr();
	$tr->td()->icon('piggy-bank');
	$tr->td()->el('span')->te('New')->badge();
	$tr->td()->checkbox('test_check');
	$tr->td()->te('Beef leberkas kielbasa, tri-tip flank sausage pork.');
	$tr->td()->te('Shoulder doner pork belly, bresaola hamburger ground round');
}

$table = $main->table();
$tbody = $table->tbody();

for($i=1;$i<=2;$i++) {
	$tr = $tbody->tr();
	$tr->td()->te('Beef');
	$tr->td()->checkbox('test_check');
	$tr->td()->button('Push');
	$tr->td()->input('Push');
	$tr->td()->select('test_select')->options(['A' => 'OptionA','B' => 'OptionB']);
}