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

$videoInformation = module_invoke('block', 'block_view', '4');

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
<?php    echo '<h2 class="pageTitles">'.$node->title.'</h2>';

echo '<article class="topInformation songsInformation">';

print render($videoInformation['content']);

echo '</article>';
?>



<?php
echo '<div class="videosContainer">';

foreach($videosNodes as $videos){
    if($videos->nid != 11){
    $youtubeUrl = $videos->field_youtube_id['und']['0']['value'];
    echo '<div data-youtube-name="'.$videos->title.'" class="individualVideos">';
        echo '<h3>'.$videos->title.'</h3>';
        echo '<iframe width="420" height="315" src="//www.youtube.com/embed/'.$youtubeUrl.'?rel=0" frameborder="0" allowfullscreen></iframe>';
    echo '</div>';
    }
}

echo '<div class="clr"></div></div>';

?>


    <footer class="copyright">
        &copy; <?php echo date("Y") ?>
    </footer>



