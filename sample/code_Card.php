<?php
$main = $body->container();
$main->el('h1')->te('Card');

$card = $main->card();
$card->header()->te('Card header');
$card->body()->el('code')->te('Some code',HEAL_TEXT_NL2BR);

$group = $card->listgroup();
$group->item()->te('Cras justo odio');
$group->item()->te('Dapibus ac facilisis in');
$group->item()->te('Vestibulum at eros');

$card->footer()->te('This is the end');
?>
