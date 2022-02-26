<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
$main = BootSome::$body->container();
$main->el('h1')->te('Carousel');

$col = $main->row()->col('col-md-3');

$carousel = $col->carousel('ExampleSlide');

$item = $carousel->item('pics/josh-hild-ipJmvtivd2Q-unsplash.jpg','https://unsplash.com/photos/ipJmvtivd2Q');
$item->caption()->el('a',['href'=>'https://unsplash.com/photos/ipJmvtivd2Q','unsplash.com']);

$item = $carousel->item('pics/shawn-xu-zh3UNM03GLw-unsplash.jpg','https://unsplash.com/photos/zh3UNM03GLw');
$item->caption('From unsplash.com');

$carousel->item('pics/livia-CQbGuzrIB8k-unsplash.jpg','https://unsplash.com/photos/CQbGuzrIB8k');

$carousel->indicators();
$carousel->control();
