<?php
#QUERY DATABASE FOR NODE IDS OF THE ITEMS IN NEWS ITEMS CONTENT TYPE
$songsNodes = db_select('node', 'n')
    ->fields('n', array('nid'))
    ->fields('n', array('type'))
    ->condition('n.type', 'songs_music')
    ->execute()
    ->fetchCol(); // returns an indexed array

#NODE LOAD THOSE IDS THAT WERE GRABBED ABOVE
$songsNodes = node_load_multiple($songsNodes);

?>

THIS IS THE SONGS AND MUSIC PAGES