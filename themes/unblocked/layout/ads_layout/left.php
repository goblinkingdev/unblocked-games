<div class="ads-left" style="top:<?php echo $top; ?>">
    <div class="ads-margin ads-margin-left">
        <?php if ($enable_ads) : ?>
            <div class="ads-title">
                Advertisement
            </div>
        <?php endif; ?>
        <div class="ads-content">
            <?php if ($enable_ads) {
                include 'ads/left.php';
            } ?>
        </div>
    </div>
</div>