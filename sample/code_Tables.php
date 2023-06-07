<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
$main = BootSome::$body->container();
$main->el('h1')->te('Tables');

$table = $main->table();
$tr = $table->thead()->tr();
$tr->th()->te('TH1');
$tr->th()->te('TH2');
$tr->th()->te('TH3');
$tr->th()->te('TH4');
$tr->th()->te('TH5');
$tr->th()->te('TH6');
$tr->th()->te('TH7');

$tbody = $table->tbody();

for($i=1;$i<=4;$i++) {
	$tr = $tbody->tr();
	$tr->td()->icon('piggy-bank',false,'warning');
	$tr->td()->icon('fab fa-facebook-f',true);
	$tr->td()->el('span')->te('New')->badge();
	$tr->td()->checkbox('test_check');
	$tr->td()->te('Beef leberkas kielbasa, tri-tip flank sausage pork.');
	$tr->td()->te('Shoulder doner pork belly, bresaola hamburger ground round');
	$ul = $tr->td()->el('ul');
	$ul->el('li')->te('Test 1');
	$ul->el('li')->te('Test 2');
}

$table = $main->table();
$tbody = $table->tbody();

for($i=1;$i<=20;$i++) {
	$tr = $tbody->tr()->at(['onclick'=>"alert('Clicked: '+".$i.")"]);
	$tr->td()->te('Beef');
	$tr->td()->checkbox('test_check');
	$tr->td()->input('Push','This is a value')->at(['right']);
	$select = $tr->td()->select('test_select');
	$select->option('OptionA','A');
	$select->option('OptionB','B');
	$tr->td()->el('span')->te('New')->badge();
	$tr->td()->button('Push');
}
