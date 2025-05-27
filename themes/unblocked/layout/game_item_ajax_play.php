<div class="card-masonry">
    <?php foreach ($games as $k2 => $item) : ?>
        <a class="item" href="/<?php echo $item->slug ?>" title="<?php echo $item->name ?>">
            <img class="w-100 h-auto" src="<?php echo \helper\image::get_thumbnail($item->image, 166, 166, 'm') ?>" width="166" height="166" title="<?php echo $item->name ?>" alt="<?php echo $item->name ?> img">
            <div class="item-title">
                <p><?php echo $item->name ?></p>
            </div>
        </a>
    <?php endforeach ?>
</div>