<?php
$main = $body->container();
$main->el('h1')->te('Jumbotron');

$jumbotron = $main->jumbotron();
$jumbotron->el('h1')->te('Some header');
$jumbotron->p('Some information');