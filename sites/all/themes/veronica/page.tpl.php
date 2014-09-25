<?php
$newsInformation = module_invoke('block', 'block_view', '5');
$genericPageTitle = end(explode('/', $_SERVER['REQUEST_URI']));
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
    <?php

    echo '<h2 class="pageTitles">'.$genericPageTitle.'</h2>'; ?>
<?php
    if($genericPageTitle == 'contact'){
        print render($newsInformation['content']);
    }
    print render($page['content']);

?>
</section>
<footer class="copyright">
    &copy; <?php echo date("Y") ?>
</footer>
