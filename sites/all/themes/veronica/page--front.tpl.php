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

    <div class="logo">V</div>
    <nav class="mainmenu">
        <?php print render($page['header']);?>
        <div class="clr"></div>
    </nav>

</header>

<section class="topContent">

    <article class="sliderContainer">
        <?php

        foreach ($slideNodes as $slides){
            $realUrl = image_style_url("slideshow",$slides->field_image_for_slideshow['und']['0']['uri']);
            //todo: add in alt and title tags
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
            $thumbUrl = image_style_url("slide_thumbs",$slides->field_image_for_slideshow['und']['0']['uri']);

            echo '<aside class="slide lft">';
            echo '<a data-slide-index="'.$slideIndex.'" href=""><img src = "'.$thumbUrl.'" /></a>';
            echo '</aside>';
            $slideIndex++;
        }

        ?>
    </nav>

</section>

<section class="secondTier">
    <article class="news">
        <h3>Featured News</h3>
        <?php
        foreach($newsNodes as $newsItems){
            if($newsItems->field_promote_to_front_page_['und']['0']['value'] == 1){
                $title=$newsItems->title;
                $body=$newsItems->body['und']['0']['value'];
                $body=substr($body,0,125);
                echo '<h4>'.$title.'</h4>';
                echo '<p>'.$body.'... <br /><a href="/news">Read More News</a></p>';
            }
        }
        ?>

    </article>
    <article class="">
        <h3>Featured Music</h3>
        <?php
        foreach($newsNodes as $newsItems){
            if($newsItems->field_promote_to_front_page_['und']['0']['value'] == 1){
                $title=$newsItems->title;
                $body=$newsItems->body['und']['0']['value'];
                $body=substr($body,0,125);
                echo '<h4>'.$title.'</h4>';
                echo '<p>'.$body.'... <br /><a href="/news">Read More News</a></p>';
            }
        }
        ?>
    </article>
    <article class="">
        <h3>Featured Video</h3>
        <?php
        foreach($newsNodes as $newsItems){
            if($newsItems->field_promote_to_front_page_['und']['0']['value'] == 1){
                $title=$newsItems->title;
                $body=$newsItems->body['und']['0']['value'];
                $body=substr($body,0,125);
                echo '<h4>'.$title.'</h4>';
                echo '<p>'.$body.'... <br /><a href="/news">Read More News</a></p>';
            }
        }
        ?>
    </article>
    <div class="clr"></div>
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
