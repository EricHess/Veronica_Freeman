
<?php
$nodeIds = $view->result;
foreach($nodeIds as $nodeId){
    $node = node_load($nodeId->nid);
    if($node->status == 1){

        echo '<section class="newsItem" data-news-category="categoryHere">';
            echo '<h3>'.$node->title.'</h3>';
            echo '<span class="newsDate">';
                echo date("F jS, Y", $node->created);
            echo '<article class="newsBody">';
                echo $node->body['und']['0']['value'];
            echo '</article>';
        echo '</section>';

    }
};