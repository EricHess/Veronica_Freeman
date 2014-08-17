<?php
echo $_GET['photoAlbum'];
?>

<header class="topPortion">

    <div class="logo">V</div>
    <nav class="mainmenu">
        <?php print render($page['header']);?>
        <div class="clr"></div>
    </nav>

</header>


<?php
//TODO: use PHP GET to get album name for use to grab the correct photos
//TODO: build photo gallery page for single photo galleries
//TODO: list out all of the images in the photo gallery with thumbnails
//TODO: open photos in shadowbox

print render($page['content']);
?>

