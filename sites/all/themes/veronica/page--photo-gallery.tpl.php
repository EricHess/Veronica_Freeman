<?php
$galleryName = $_GET['galleryName'];


#QUERY DATABASE FOR NODE IDS OF THE ITEMS IN NEWS ITEMS CONTENT TYPE
$galleries = db_select('node', 'n')
    ->fields('n', array('nid'))
    ->fields('n', array('type'))
    ->condition('n.type', 'photo_gallery')
    ->execute()
    ->fetchCol(); // returns an indexed array

#NODE LOAD THOSE IDS THAT WERE GRABBED ABOVE
$galleries = node_load_multiple($galleries);

?>



<header class="topPortion">

    <div class="logo">V</div>
    <nav class="mainmenu">
        <?php print render($page['header']);?>
        <div class="clr"></div>
    </nav>

    <header class="heroImage" style="height:250px;"></header>

</header>

<?php

foreach($galleries as $gallery){
    $galleryTitle = $gallery->title;

    if($galleryTitle == $galleryName){
        //TODO: Change the image style so they're larger
        //TODO: print out the image thumbs with links around them
        //TODO: shadowbox the larger images
        //TODO: put in a "back to gallery list" link
        foreach($gallery->field_photos_for_gallery['und'] as $albumImage){
            $imageTarget = $albumImage['target_id'];
            $picture = node_load($imageTarget);
            $thumbUrl = image_style_url("slide_thumbs",$picture->field_photo['und']['0']['uri']);
            echo '<a href="'.file_create_url($picture->field_photo['und']['0']['uri']).'" rel="shadowbox"> <img src="'.$thumbUrl.'" /></a>';
        }
    }
}


?>

