<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
$page = !empty($_GET) ? array_keys($_GET)[0] : 'Index';
if(isset(array_keys($_GET)[1])) {
	$source = array_keys($_GET)[1]==='Source';
}
else {
	$source = false;
}

require_once 'code_Index.php';
require_once 'code_Navbar.php';

$allowed = ['Alerts','Badge','Breadcrumb','Card','Carousel','Display','Dropdown','Forms','Index','Jumbotron','Modal','Navbar','Pagination','Ratios','Tables'];
if(in_array($page,$allowed)!==true) die('Error');

if($source) {
	$main = BootSome::$body->container();
	$main->el('h1')->te($page.'::Source');
	$text = file_get_contents('code_'.$page.'.php');
	$main->el('pre')->el('code')->te($text);
}
elseif(!in_array($page,['Index','Navbar'])) {
	require_once 'code_'.$page.'.php';
}
else {
	$main = BootSome::$body->container();
	$main->el('h1')->te($page);
}
