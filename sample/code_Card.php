<?php
$main = $body->container();
$main->el('h1')->te('Card');

$card = $main->card();
$card->header()->te('Card header');
$card->body()->el('code')->te('Some code',HEAL_TEXT_NL2BR);
$card->footer()->te('This is the end');
?>
