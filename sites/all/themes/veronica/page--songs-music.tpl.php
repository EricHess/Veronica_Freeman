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

<h3>Select Your Album:</h3>
<nav class="albumNavigation">
<?php
    foreach($albums as $album){

        //GET NODE IDS
        $nid = $album->field_cover_art['und']['0']['target_id'];
        $node = node_load($nid);
        $thumbUrl = image_style_url("slide_thumbs",$node->field_album_cover['und']['0']['uri']);
        $albumName = $album->title;
        echo '<div class="albumCovers">';
        echo '<img src="'.$thumbUrl.'" data-album-name="'.strtolower(str_replace(' ', '', $albumName)).'"/> <br />';
        echo $albumName;
        echo '</div>';
    }
?>
</nav>

<?php
//TODO:
//TODO: FILL APPROPRIATE DIVS WITH SONGS FROM EACH ALBUM
//TODO: FILTER BASED ON WHICH IS CLICKED (JS)

?>

<div class="songListings">
<pre>
    <?php
    foreach($songsNodes as $songs){
     print_r($songs);
    };


    ?>

        </div>