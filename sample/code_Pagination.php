<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
$main = BootSome::$body->container();
$main->el('h1')->te('Pagination');
$main->spinner();

/*
$limit = 50;
$page = !empty($_GET['page']) ? (int) $_GET['page'] : 1;

$sql = "SELECT ...";
$total = (int) $mysqli->query($sql)->num_rows;
$sql .= ' LIMIT '.$limit.' OFFSET '.($page-1)*$limit;
$query = $mysqli->query($sql);
*/

$total = 20000;
$limit = 10;
$page = rand(1,10);
$url = function($i) {
	return ['onclick'=>"alert('Goto page: ".$i."')"];
};

$table = $main->pagination($total, $limit, $page, $url);
