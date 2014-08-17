<script src="sites/all/themes/veronica/scripts/galleryScript.js"></script>
<?php
$galleries = $view->result;
//TODO: list all thumbs and album names with links (v)
//TODO: Nodeload the nid for the cover photo and grab the photo
//TODO: CHANGE THE IMAGE STYLE TO SOMETHING LARGER

foreach($galleries as $gallery){
    if($gallery->nid != 27){
        $title = $gallery->node_title;
        $coverPhoto = $gallery->_field_data['nid']['entity']->field_cover_photo['und']['0']['target_id'];
        $coverPhoto = node_load($coverPhoto);
        $coverPhoto = image_style_url("slide_thumbs",$coverPhoto->field_photo['und']['0']['uri']);

        echo '<article data-gallery-name="'.$title.'"  class="photoGallery">';
        echo $title;
        echo '<br /><img src="'.$coverPhoto.'" />';
        echo '</article>';
    }
}
