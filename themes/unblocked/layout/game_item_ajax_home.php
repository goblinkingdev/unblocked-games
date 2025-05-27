<?php
foreach ($games as $item) {
    $arr_games_views[] = $item->views;
}
//sắp xếp lại Mảng theo thứ tự views giảm dần
rsort($arr_games_views);

foreach ($arr_games_views as $k => $n) {
    if ($k < 5) {
        if ($k == 0) {
            $max_views = $n;
        } elseif ($k == 3) {
            $views_4 = $n;
        }
    }
}
?>
<div class="card-masonry">
    <?php if ($enable_ads) : ?>
        <div class="item large">
            <?php echo \helper\themes::get_layout('ads_layout/300x250', array('enable_ads' => $enable_ads)); ?>
        </div>
    <?php endif ?>

    <?php
    $x = 0;
    foreach ($games as $k2 => $item) :
        if ($item->views >= $views_4 && $item->views <= $max_views &&  $flag && $k2 < 15) :
            $x += 1;
            if ($x < 5) :
    ?>
                <a class="item large" href="/<?php echo $item->slug ?>" title="<?php echo $item->name ?>">
                    <img class="w-100 h-auto" src="<?php echo \helper\image::get_thumbnail($item->image, 280, 280, 'm') ?>" width="280" height="280" title="<?php echo $item->name ?>" alt="<?php echo $item->name ?> img">
                    <div class="item-title">
                        <p><?php echo $item->name ?></p>
                    </div>
                </a>
            <?php else : ?>
                <a class="item" href="/<?php echo $item->slug ?>" title="<?php echo $item->name ?>">
                    <img class="w-100 h-auto" src="<?php echo \helper\image::get_thumbnail($item->image, 166, 166, 'm') ?>" width="166" height="166" title="<?php echo $item->name ?>" alt="<?php echo $item->name ?> img">
                    <div class="item-title">
                        <p><?php echo $item->name ?></p>
                    </div>
                </a>
            <?php endif ?>
        <?php else : ?>
            <a class="item" href="/<?php echo $item->slug ?>" title="<?php echo $item->name ?>">
                <img class="w-100 h-auto" src="<?php echo \helper\image::get_thumbnail($item->image, 166, 166, 'm') ?>" width="166" height="166" title="<?php echo $item->name ?>" alt="<?php echo $item->name ?> img">
                <div class="item-title">
                    <p><?php echo $item->name ?></p>
                </div>
            </a>
        <?php endif ?>
    <?php endforeach ?>
</div>