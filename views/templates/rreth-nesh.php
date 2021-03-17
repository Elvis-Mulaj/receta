<?php
    global $controller;
    $rreth_nesh = $controller->getRrethNesh();
?>
<div class="top-home category" style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url('<?php echo WEB_PATH;?>public/images/hp2.jpg');">
    <div class="mid-grid">
        <div class="description">
            <h1>Rreth nesh</h1>
        </div>
    </div>
</div>
<div class="white-box rreth-nesh">
    <div class="mid-grid">
        <h2 class="home-title"><?php echo $rreth_nesh['titulli']; ?></h2>
        <div class="w-60">
            <?php echo $rreth_nesh['text']; ?>
        </div>
        <h2 class="home-title">Antaret</h2>
        <div class="box-holder" id="antaret">
            <div class="box-4" id="rrethantareve">
                <figure class="place-box round">
                    <img src="<?php echo WEB_PATH;?>public/images/blerina.jpeg">
                    <figcaption>Blerina Berjani</figcaption>
                </figure>
            </div>
            <div class="box-4">
                <figure class="place-box round">
                    <img src="<?php echo WEB_PATH;?>public/images/elvisi.jpeg">
                    <figcaption>Elvis Mulaj</figcaption>
                </figure>
            </div>
            <!-- <div class="box-4">
                <figure class="place-box round">
                    <img src="<?php echo WEB_PATH;?>public/images/agoni.jpg">
                    <figcaption>Agon Ibrahimi</figcaption>
                </figure>
            </div>
            <div class="box-4">
                <figure class="place-box round">
                    <img src="<?php echo WEB_PATH;?>public/images/flakroni.jpg">
                    <figcaption>Flakron Zymberi</figcaption>
                </figure> -->
            </div>
        </div>
    </div>
</div>