<div class="card-masonry">
    <?php foreach ($posts as $p) : ?>
        <a class="item" href="/<?php echo $p->slug ?>.html" title="<?php echo $p->title ?>">
            <img class="w-100 h-auto" src="<?php echo \helper\image::get_thumbnail($p->image, 129, 129, 'm') ?>" width="129" height="129" alt="<?php echo $p->title ?>" title="<?php echo $p->title ?>">
            <div class="item-title">
                <p style="-webkit-line-clamp: 3; -webkit-box-orient: vertical;"><?php echo $p->title ?></p>
            </div>
        </a>
    <?php endforeach ?>
</div>

<?php if ($paging_content) {
    echo \helper\themes::get_layout('pagination', array('paging_content' => $paging_content));
}
?>