<script src="sites/all/themes/veronica/scripts/jquery.bxslider.js"></script>
<link href="css/jquery.bxslider.css" />

<script>
    $(document).ready(function(){
    $('.sliderContainer').bxSlider({
        pagerCustom: '.slideThumbs'
    });
    })
</script>
<?php
#QUERY DATABASE FOR NODE IDS OF THE ITEMS IN NEWS ITEMS CONTENT TYPE
$newsNodes = db_select('node', 'n')
->fields('n', array('nid'))
->fields('n', array('type'))
->condition('n.type', 'news_item')
->execute()
->fetchCol(); // returns an indexed array

#NODE LOAD THOSE IDS THAT WERE GRABBED ABOVE
$newsNodes = node_load_multiple($newsNodes);

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
$videosNodes = db_select('node', 'n')
    ->fields('n', array('nid'))
    ->fields('n', array('type'))
    ->condition('n.type', 'videos')
    ->execute()
    ->fetchCol(); // returns an indexed array

#NODE LOAD THOSE IDS THAT WERE GRABBED ABOVE
$videosNodes = node_load_multiple($videosNodes);

#QUERY DATABASE FOR NODE IDS OF THE ITEMS IN NEWS ITEMS CONTENT TYPE
$slideNodes = db_select('node', 'n')
    ->fields('n', array('nid'))
    ->fields('n', array('type'))
    ->condition('n.type', 'home_page_slide_show_photos')
    ->execute()
    ->fetchCol(); // returns an indexed array

#NODE LOAD THOSE IDS THAT WERE GRABBED ABOVE
$slideNodes = node_load_multiple($slideNodes);


?>

<header class="topPortion">

    <img class="VLogo" src="#" />
    <nav class="mainmenu">
        <!-- print out main menu -->
        <?php print render($page['header']);?>
    </nav>

</header>

<section class="topContent"><pre style="display:none">
<?php print_r($slideNodes); ?>
        </pre>

    <article class="sliderContainer">
        <?php
        foreach ($slideNodes as $slides){
            $realUrl = image_style_url("slideshow",$slides->field_image_for_slideshow['und']['0']['uri']);

            echo '<aside class="slide">';
                echo '<img style="width:100%;" src = "'.$realUrl.'" />';
            echo '</aside>';
        }
        ?>
    </article>

    <nav class="slideThumbs">
        <?php
        $slideIndex = 0;
        foreach ($slideNodes as $slides){
            $thumbUrl = image_style_url("thumbnail",$slides->field_image_for_slideshow['und']['0']['uri']);

            echo '<aside class="slide">';
            echo '<a data-slide-index="'.$slideIndex.'" href=""><img src = "'.$thumbUrl.'" /></a>';
            echo '</aside>';
            $slideIndex++;
        }

        ?>
    </nav>

</section>

<section class="secondTier">
    <article class="">news</article>
    <article class="">music</article>
    <article class="">video</article>
</section>

<article class="homePageText">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet euismod tellus. Suspendisse porttitor dolor id adipiscing lacinia. Aenean porttitor consectetur sapien, eget facilisis elit faucibus ac. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In metus felis, pulvinar auctor lectus non, dapibus venenatis metus. Donec tincidunt nulla vel diam porta, a congue turpis feugiat. Ut consequat convallis diam ut interdum.</p>
</article>

<section class="socialBoxes">
    <article class="twitter">TWEETS HERE</article>
    <article class="facebook">FB POSTS HERE</article>
</section>

<footer class="copyright">
    COPYRIGHT HERE
</footer>
