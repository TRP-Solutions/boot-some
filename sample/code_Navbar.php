<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
$navbar = $body->navbar(false,'navbar-light bg-light');

$brand = $navbar->brand('http://trp.solutions');
$brand->at(['target'=>'_blank']);
$brand->img('http://trp.solutions/images/logo.svg','brandlogo');
$brand->el('span')->display('none','lg-inline')->te('BootSome');

if($source) {
	$js = "window.location.href='?".$page."'";
	$navbar->form()->form_inline()->button('WYSIWYG','desktop')->at(['onclick'=>$js]);
}
else {
	$js = "window.location.href='?".$page."&Source'";
	$navbar->form()->form_inline()->button('Source','code')->at(['onclick'=>$js]);
}

$navbar->toggler();

$collapse = $navbar->collapse();
$nav = $collapse->nav();
$nav->a('https://github.com/TRP-Solutions','Github')->at(['target'=>'_blank']);

$dropdown = $nav->dropdown('Documentation');
$dropdown->a('.','Index',$page=='Index');
$dropdown->divider();
$dropdown->a('?Alerts','Alerts',$page=='Alerts');
$dropdown->a('?Badge','Badge',$page=='Badge');
$dropdown->a('?Breadcrumb','Breadcrumb',$page=='Breadcrumb');
$dropdown->a('?Card','Card',$page=='Card');
$dropdown->a('?Carousel','Carousel',$page=='Carousel');
$dropdown->a('?Display','Display',$page=='Display');
$dropdown->a('?Dropdown','Dropdown',$page=='Dropdown');
$dropdown->a('?Ratios','Ratios',$page=='Ratios');
$dropdown->a('?Forms','Forms',$page=='Forms');
$dropdown->a('?Jumbotron','Jumbotron',$page=='Jumbotron');
$dropdown->a('?Modal','Modal',$page=='Modal');
$dropdown->a('?Navbar','Navbar',$page=='Navbar');
$dropdown->a('?Pagination','Pagination',$page=='Pagination');
$dropdown->a('?Tables','Tables',$page=='Tables');

$dropdown = $nav->dropdown('Links');
$dropdown->a('https://fontawesome.com/icons','Icons | Font Awesome')->at(['target'=>'_blank']);
$dropdown->a('https://getbootstrap.com/docs/','Introduction · Bootstrap')->at(['target'=>'_blank']);
