<?php
#QUERY DATABASE FOR NODE IDS OF THE ITEMS IN HOME_SLIDER CONTENT TYPE
$nidsF = db_select('node', 'n')
->fields('n', array('nid'))
->fields('n', array('type'))
->condition('n.type', 'news')
->execute()
->fetchCol(); // returns an indexed array

#NODE LOAD THOSE IDS THAT WERE GRABBED ABOVE
$nodesF = node_load_multiple($nidsF);

?>

<header class="topPortion">

    <img class="VLogo" src="#" />
    <nav class="mainmenu">MAIN NAVIGATION</nav>

</header>

<section class="topContent">
    USE BXSLIDER HERE.. GET THE SCRIPT, USE THUMBS AS PAGERS
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
