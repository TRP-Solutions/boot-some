<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
$main = $body->container();
$main->el('h1')->te('Carousel');

$col = $main->row()->col('col-md-3');

$carousel = $col->carousel('ExampleSlides');

$item = $carousel->item('https://scontent-arn2-1.cdninstagram.com/vp/355e12dd330d8fb7877f86b88aa66575/5D494317/t51.2885-15/e35/55872700_126537315113128_4874935674370179434_n.jpg?_nc_ht=scontent-arn2-1.cdninstagram.com','https://www.instagram.com/p/Bv6dtkzBkM3/');
$item->caption('From instagram.com');

$item = $carousel->item('https://scontent-arn2-1.cdninstagram.com/vp/f6b5dee4bf2429773c497a1053618b0f/5D4B0921/t51.2885-15/e35/53843331_117758992727839_3043832732976520322_n.jpg?_nc_ht=scontent-arn2-1.cdninstagram.com','https://www.instagram.com/p/Bvo9UtrFojg/');
$item->caption()->a('https://www.instagram.com/p/Bvo9UtrFojg/','instagram.com');

$carousel->item('https://scontent-arn2-1.cdninstagram.com/vp/8364b446bf1c27704dce0b529aee21a1/5D2CBE8A/t51.2885-15/e35/54277693_291829018410936_360711378383280583_n.jpg?_nc_ht=scontent-arn2-1.cdninstagram.com','https://www.instagram.com/p/BvqC-gnAqzZ/');

$carousel->indicators();
$carousel->control();