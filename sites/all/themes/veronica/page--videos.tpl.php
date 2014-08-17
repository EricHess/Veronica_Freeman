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

echo '<div class="videosContainer">';

foreach($videosNodes as $videos){
    $youtubeUrl = $videos->youtubeId['und']['0']['value'];
    echo '<div data-youtube-name="'.$videos->title.'" class="">';
        echo '<h4>'.$videos->title.'</h4>';
        echo 'embed code from youtube the id is:'.$youtubeUrl;
    echo '</div>';
}

echo '</div>';


