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

#QUERY DATABASE FOR NODE IDS OF THE ITEMS IN NEWS ITEMS CONTENT TYPE
$albums = db_select('node', 'n')
    ->fields('n', array('nid'))
    ->fields('n', array('type'))
    ->condition('n.type', 'albums')
    ->execute()
    ->fetchCol(); // returns an indexed array

#NODE LOAD THOSE IDS THAT WERE GRABBED ABOVE
$albums = node_load_multiple($albums);

?>

<header class="topPortion">

    <div class="logo">V</div>
    <nav class="mainmenu">
        <?php print render($page['header']);?>
        <div class="clr"></div>
    </nav>

    <header class="heroImage" style="height:250px;"></header>

</header>

<nav class="albumNavigation">
<?php

    foreach($albums as $album){

        //GET NODE IDS
        $nid = $album->field_cover_art['und']['0']['target_id'];
        $node = node_load($nid);
        $thumbUrl = image_style_url("slide_thumbs",$node->field_album_cover['und']['0']['uri']);
        echo '<div class="albumCovers">';
        echo '<img src="'.$thumbUrl.'" /> <br />';
        echo $album->title;
        echo '</div>';

    }
?>
</nav>

THIS IS THE SONGS AND MUSIC PAGES