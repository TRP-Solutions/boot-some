<?php
$navbar = $body->navbar();

$brand = $navbar->brand();
$brand->at(['href'=>'http://trp.solutions','target'=>'_blank']);
$brand->el('img',['src'=>'http://trp.solutions/images/logo.svg','height'=>'22px']);

if($source) {
	$js = "window.location.href='?".$page."'";
	$navbar->form()->button('WYSIWYG','desktop')->at(['onclick'=>$js]);
}
else {
	$js = "window.location.href='?".$page."&Source'";
	$navbar->form()->button('Source','code')->at(['onclick'=>$js]);
}

$navbar->toggler();

$collapse = $navbar->collapse();
$nav = $collapse->nav();
$nav->a('https://github.com/TRP-Solutions','Github')->at(['target'=>'_blank']);

$dropdown = $nav->dropdown('Documentation');
$dropdown->a('.','Index',$page=='Index');
$dropdown->a('?Forms','Forms',$page=='Forms');
$dropdown->a('?Modal','Modal',$page=='Modal');
$dropdown->a('?Navbar','Navbar',$page=='Navbar');
$dropdown->a('?Tables','Tables',$page=='Tables');

$dropdown = $nav->dropdown('Links');
$dropdown->a('https://fontawesome.com/icons','Icons | Font Awesome')->at(['target'=>'_blank']);
$dropdown->a('https://getbootstrap.com/docs/4.1/','Introduction · Bootstrap')->at(['target'=>'_blank']);
?>
