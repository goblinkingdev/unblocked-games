<div class="ads-right" style="top:<?php echo $top; ?>;right:<?php echo $right; ?>">
    <div class="ads-margin ads-margin-right">
        <div class="ads-title">
            <?php if ($enable_ads) echo 'Advertisement'; ?>
        </div>
        <div class="ads-content">
            <?php if ($enable_ads) include 'ads/right.php'; ?>
        </div>
    </div>
</div>