<?php
$main = $body->container();
$main->el('h1')->te('Dropdown');

$dropdown = $main->dropdown('Links');
$dropdown->a('https://www.google.com/search?q=This+is+a+link','This is a link');
$dropdown->a('https://www.google.com/search?q=This+is+a+second+link','This is a second link');

$main->el('hr');

$dropdown = $main->dropdown('Bad links','danger');
$dropdown->a('https://www.google.com/search?q=This+is+a+link','This is a link');
$dropdown->a('https://www.google.com/search?q=This+is+a+second+link','This is a second link');