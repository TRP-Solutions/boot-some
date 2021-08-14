<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
$main = $body->container();
$main->el('h1')->te('Ratios');

$row = $main->row();
$col = $row->col('col-md-6');

$ratio = $col->ratio('16x9');
$ratio->el('iframe',['src'=>'https://www.youtube.com/embed/zpOULjyy-n8?rel=0','title'=>'YouTube video','allowfullscreen']);

$col = $row->col('col-md-6')->ratio('16x9');

$col->img('pics/shawn-xu-zh3UNM03GLw-unsplash.jpg','https://unsplash.com/photos/zh3UNM03GLw');
