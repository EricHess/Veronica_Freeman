
<header class="topPortion">

    <div class="logo">V</div>
    <nav class="mainmenu">
        <?php print render($page['header']);?>
        <div class="clr"></div>
    </nav>

    <header class="heroImage" style="height:300px;background:url('sites/all/themes/veronica/images/01_rs.jpg');"></header>
</header>
<section class="contentContainer">
    <?php
    $genericPageTitle = end(explode('/', $_SERVER['REQUEST_URI']));
    echo '<h2 class="pageTitles">'.$genericPageTitle.'</h2>'; ?>
<?php
print render($page['content']);

?>
</section>
<footer>
COPYRIGHT HERE
</footer>