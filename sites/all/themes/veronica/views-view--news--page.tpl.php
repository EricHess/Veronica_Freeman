
<?php
$nodeIds = $view->result;
$pageTitle = $nodeIds['0']->node_title;
$newsInformation = module_invoke('block', 'block_view', '2');


echo '<h2 class="pageTitles">'.$pageTitle.'</h2>';
echo '<article class="topInformation galleryInformation">';

print render($newsInformation['content']);

echo '</article>';

echo '<section class="contentContainer newsContainer">';

foreach($nodeIds as $nodeId){
    $node = node_load($nodeId->nid);
    if($node->status == 1){

        echo '<section class="newsItem" data-news-category="categoryHere">';
            echo '<h3>'.$node->title.'</h3><>';
            echo '<span class="newsDate">';
                echo date("F jS, Y", $node->created);
            echo '</span>';
            echo '<article class="newsBody">';
                echo $node->body['und']['0']['value'];
            echo '</article>';
        echo '</section>';
        //TODO: clip the text to a description (or use summary?)
        //TODO: add a read more link

    }
};

echo '</section>';