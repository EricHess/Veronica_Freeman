
<?php
$nodeIds = $view->result;
$pageTitle = $nodeIds['0']->node_title;
$linksInformation = module_invoke('block', 'block_view', '6');


echo '<h2 class="pageTitles">'.$pageTitle.'</h2>';
echo '<article class="topInformation galleryInformation">';

print render($linksInformation['content']);

echo '</article>';

echo '<section class="contentContainer linksContainer">';
$c = 0;
foreach($nodeIds as $nodeId){
    $node = node_load($nodeId->nid);
    if($node->status == 1){

        $url = $node->field_url['und']['0']['value'];
        $description = $node->field_description_of_company['und']['0']['value'];
        $logoSrc = image_style_url("medium",$node->field_logo['und']['0']['uri']);
        $zebra = ($c++%2==1) ? 'odd' : 'even';


        echo '<article class="singleLink '.$zebra.'">';
            echo '<aside class="logoImage"><a href="'.$url.'" target="_blank"><img src="'.$logoSrc.'" /></a></aside>';
            echo '<h4><a href="'.$url.'" target="_blank">'.$node->title.'</a></h4>';
            echo '<p>'.$description.'</p>';
        echo '</article>';
        echo '<div class="clr"></div>';

    }
};

echo '</section>';