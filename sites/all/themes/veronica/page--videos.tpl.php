<?php
#QUERY DATABASE FOR NODE IDS OF THE ITEMS IN NEWS ITEMS CONTENT TYPE
$videosNodes = db_select('node', 'n')
    ->fields('n', array('nid'))
    ->fields('n', array('type'))
    ->condition('n.type', 'videos')
    ->execute()
    ->fetchCol(); // returns an indexed array

#NODE LOAD THOSE IDS THAT WERE GRABBED ABOVE
$videosNodes = node_load_multiple($videosNodes);

?>

THIS IS THE SONGS AND MUSIC PAGES