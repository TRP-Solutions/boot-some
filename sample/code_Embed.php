<?php
/*
BootSome is licensed under the Apache License 2.0 license
https://github.com/TRP-Solutions/boot-some/blob/master/LICENSE
*/
$main = $body->container();
$main->el('h1')->te('Embeds');

$main->embed('https://www.youtube.com/embed/zpOULjyy-n8?rel=0','16by9')->at(['allowfullscreen']);
