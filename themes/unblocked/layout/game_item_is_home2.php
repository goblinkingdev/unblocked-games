<?php
$list_cate2 = \helper\category::find_by_taxonomy('game');
$list_tags = \helper\tag::find_tag_by_taxonomy('game');

$arr_cate_color = [
    "background-color: #D34949",
    "background-color: #66D78C",
    "background-color: #F6A963",
    "background-color: #55E4DB",
    "background-color: #68CF6C",
    "background-color: #706DE4",
    "background-color: #D760D2",
];
?>

<div class="row">
    <?php if (count($list_cate2) || count($list_tags)) : ?>
        <div class="col-lg-auto">
            <?php if ($enable_ads) : ?><br>
                <div class="ads-slot">
                    <?php echo \helper\themes::get_layout('ads_layout/doc', array('enable_ads' => $enable_ads)); ?>
                </div><br>
            <?php endif ?>  
        </div>
    <?php endif ?>

    <div class="col-lg">
        <?php if ($enable_ads) : ?><br>
            <div class="ads-slot">
                <?php echo \helper\themes::get_layout('ads_layout/ngang', array('enable_ads' => $enable_ads)); ?>
            </div><br>
        <?php endif ?>

        <div class="mt-4 d-none d-lg-block"></div>
        <div class="layout-heading">
            <h1 class="fs-3 fw-bold text-capitalize link-title2"><?php echo $title ?></h1>
            <div class="mb-32 count-games"><?php echo $count; ?> games in total</div>
        </div>
        <div id="ajax-append">
            <?php echo \helper\themes::get_layout('game_item_ajax', array('games' => $games, 'paging_content' => $paging_content, 'flag' => true)) ?>
        </div>

        <?php if ($enable_ads) : ?><br>
            <div class="ads-slot">
                <?php echo \helper\themes::get_layout('ads_layout/ngang', array('enable_ads' => $enable_ads)); ?>
            </div><br>
        <?php endif ?>

        <?php if ($post || $slogan) : ?>
            <div class="row mt-32">
                <div class="game__content">
                    <h1 class="title-option"><?php echo $title; ?></h1>
                    <?php if ($post) : ?>
                        <?php if ($post->content) : ?>
                            <div><?php echo html_entity_decode($post->content); ?></div>
                        <?php else : ?>
                            <div><?php echo html_entity_decode($post->excerpt); ?></div>
                        <?php endif; ?>
                    <?php else : ?>
                        <div><?php echo html_entity_decode($slogan); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>