<?php
$page = !empty($_GET) ? array_keys($_GET)[0] : 'Index';
if(isset(array_keys($_GET)[1])) {
	$source = array_keys($_GET)[1]==='Source';
}
else {
	$source = false;
}

require_once('code_Index.php');
require_once('code_Navbar.php');

$allowed = ['Alerts','Badge','Carousel','Embed','Forms','Index','Modal','Navbar','Pagination','Tables'];
if(in_array($page,$allowed)!==true) die('Error');

if($source) {
	$main = $body->container();
	$main->el('h1')->te($page.'::Source');
	$text = file_get_contents('code_'.$page.'.php');
	$main->el('pre')->el('code')->te($text);
}
elseif(!in_array($page,['Index','Navbar'])) {
	require_once('code_'.$page.'.php');
}
else {
	$main = $body->container();
	$main->el('h1')->te($page);
}

echo $doc;
?>
