<script src="sites/all/themes/veronica/scripts/galleryScript.js"></script>
<?php
$galleries = $view->result;
$pageTitle = $galleries['0']->node_title;
$galleryInformation = module_invoke('block', 'block_view', '1');

//TODO: CHANGE THE IMAGE STYLE TO SOMETHING LARGER


echo '<article class="topInformation galleryInformation">';

print render($galleryInformation['content']);

echo '</article>';

echo '<section class="contentContainer galleryContainer">';

foreach($galleries as $gallery){
    if($gallery->nid != 27){

        $title = $gallery->node_title;
        $coverPhoto = $gallery->_field_data['nid']['entity']->field_cover_photo['und']['0']['target_id'];
        $coverPhoto = node_load($coverPhoto);
        $coverPhoto = image_style_url("medium",$coverPhoto->field_photo['und']['0']['uri']);

        echo '<article data-gallery-name="'.$title.'"  class="photoGallery">';
        echo '<h4>'.$title.'</h4>';
        echo '<br /><img src="'.$coverPhoto.'" />';
        echo '</article>';
    }
}

echo '<div class="clr"></div></section>';