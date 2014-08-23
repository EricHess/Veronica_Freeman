<script src="sites/all/themes/veronica/scripts/songsScript.js"></script>


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

//TODO: FILTER BASED ON WHICH IS CLICKED (JS)

?>

<header class="topPortion">

    <div class="logo">V</div>
    <nav class="mainmenu">
        <?php print render($page['header']);?>
        <div class="clr"></div>
    </nav>

    <header class="heroImage" style="height:300px;background:url('sites/all/themes/veronica/images/01_rs.jpg');"></header>
</header>

<section class="contentContainer">
<?php    echo '<h2 class="pageTitles">'.$node->title.'</h2>'; ?>


<h3>Select Your Album:</h3>
<nav class="albumNavigation">
<?php


    foreach($albums as $album){

        //GET NODE IDS
        $nid = $album->field_cover_art['und']['0']['target_id'];
        $node = node_load($nid);
        $thumbUrl = image_style_url("slide_thumbs",$node->field_album_cover['und']['0']['uri']);
        $albumName = $album->title;
        echo '<div class="albumCovers" data-album-name="'.$albumName.'">';
        echo '<img src="'.$thumbUrl.'"/> <br />';
        echo $albumName;
        echo '</div>';
    }
?>
    <div class="clr"></div>

</nav>

<div class="songListings">
    <?php

    foreach($albums as $album){
        $albumNodeID = $album->nid;
        $albumTitle = $album->title;
        echo '<article class="albumContainer" data-album-name="'.$albumTitle.'">';
        echo '<h3>'.$albumTitle.'</h3>';

        foreach($songsNodes as $song){
            $songTitle = $song->title;
            $songTargetID = $song->field_album['und']['0']['target_id'];

            if($songTargetID == $albumNodeID){
                $soundcloudID = $song->field_soundcloud_id['und']['0']['value'];
                echo '<h4>'.$songTitle.'</h4><br />';
                echo '<iframe width="40%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/'.$soundcloudID.'&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>';

            }
        }

        echo '</article>';

    }

    ?>
</div>

    </section>

<footer>
    COPYRIGHT HERE
</footer>