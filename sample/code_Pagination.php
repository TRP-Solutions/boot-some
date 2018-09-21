<?php
$main = $body->container();
$main->el('h1')->te('Pagination');

/*
$limit = 50;
$page = !empty($_GET['page']) ? (int) $_GET['page'] : 1;

$sql = "SELECT ...";
$total = (int) $mysqli->query($sql)->num_rows;
$sql .= ' LIMIT '.$limit.' OFFSET '.($page-1)*$limit;
$query = $mysqli->query($sql);
*/

$total = 70;
$limit = 25;
$page = 1;
$url = function($i) {
	return ['onclick'=>"alert('Goto page: ".$i."')"];
};

$table = $main->pagination($total, $limit, $page, $url);
?>
