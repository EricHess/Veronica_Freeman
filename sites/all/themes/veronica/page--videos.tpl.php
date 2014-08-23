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



<?php
echo '<div class="videosContainer">';

foreach($videosNodes as $videos){
    $youtubeUrl = $videos->youtubeId['und']['0']['value'];
    echo '<div data-youtube-name="'.$videos->title.'" class="">';
        echo '<h3>'.$videos->title.'</h3>';
        echo 'embed code from youtube the id is:'.$youtubeUrl;
    echo '</div>';
}

echo '</div>';


