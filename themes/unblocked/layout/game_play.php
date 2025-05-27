<?php
if (!$limit) {
    $limit = \helper\options::options_by_key_type('game_related_limit', 'display');
    if (!$limit) {
        $limit = 12;
    }
}
$page = 1;
$order_type = "DESC";
$display = "yes";
$field_order = "views";
$not_equal['slug'] = $game->slug;

$url = load_url()->current_url();
$url = str_replace('?clear=1', '', $url);
$game_name = $game->name;

$list_cate = \helper\game::find_related_category($game->id);
$list_tags = \helper\game::find_related_tag($game->id);
if (count($list_cate)) {
    $arr_bread = array(
        array(
            'name' => $list_cate[0]->name,
            'slug' => $list_cate[0]->slug,
            'source' => 'games/' . $list_cate[0]->slug,
        ),
        array(
            'name' => $game_name,
        ),
    );

    $category_id = $list_cate[0]->id;
} elseif (count($list_tags)) {
    $arr_bread = array(
        array(
            'name' => $list_tags[0]->name,
            'slug' => $list_tags[0]->slug,
            'source' => 'tag/' . $list_tags[0]->slug,
        ),
        array(
            'name' => $game_name,
        ),
    );
} else {
    $arr_bread = array(
        array(
            'name' => $game_name,
        )
    );
}


if ($category_id) {
    foreach ($list_cate as $cate_id) {
        $g = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, $field_order, $order_type, $cate_id->id, $not_equal);
        foreach ($g as $g1) {
            $g2[] = $g1;
        }
    }
    // $games_category2 = \helper\game::remove_duplicate_game($g2);
    $games_category2 = array_values($games_category2);

    $games_category = [];
    foreach ($games_category2 as $k => $item_cate) {
        if ($k < $limit) {
            $games_category[] = $item_cate;
        }
    }
} else {
    $category_id = '';
    $games_category = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, $field_order, $order_type, $category_id, $not_equal);
}

//khi trang chủ là trang chơi game => cho nó hiện ra các game có keywords giống với game trang chủ
// if ($is_game_play_home2) {
//     $keywords_site =    $games_tags = \helper\game::get_paging($page, $limit, $keywords_site, $type, $display, $is_hot, $is_new, $field_order, $order_type, NULL, $not_equal);
//     'ball';
// } else
if ($tag_id) {
    foreach ($list_tags as $tag_id) {
        $tag = \helper\game::paging_by_tag($tag_id->id, $page, $limit, $field_order, $order_type, $type, $not_equal);
        foreach ($tag as $tag1) {
            $tag2[] = $tag1;
        }
    }
    //remove duplicate game(xóa game trùng lặp) + resset arr (đánh lại chỉ mục index)
    $games_tags2 = \helper\game::remove_duplicate_game($tag2);
    $games_tags2 = array_values($games_tags2);

    // cho nó nhận lại và hiển thị theo $limit; vì ở trên nó đánh lại chỉ mục tất cả game cate rồi
    $games_tags = [];
    foreach ($games_tags2 as $k => $item_cate) {
        if ($k < $limit) {
            $games_tags[] = $item_cate;
        }
    }
} else {
    $category_id = '';
    $games_tags = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, $field_order, $order_type, $category_id, $not_equal);
}

//Lọc trùng game ở cột trái($games_tags): dựa trên cột phải($games_category)
if ($games_tags != null && $games_category != null) {
    foreach ($games_tags as $t) {
        foreach ($games_category as $c) {
            $x = 0;
            if ($t->id === $c->id) {
                $x += 1;
                break;
            }
        }
        if ($x === 0) {
            $games_tags3[] = $t;
        }
    }
    $games_tags = $games_tags3;
}

$limit_cate = \helper\options::options_by_key_type('game_category_limit', 'display');
if (!$limit_cate) {
    $limit_cate = 48;
}
$field_order2 = "publish_date";
$games_news = \helper\game::get_paging($page, $limit_cate, $keywords, $type, $display, $is_hot, $is_new, $field_order2, $order_type, NULL, $not_equal);
$games_news2 = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, $field_order2, $order_type, NULL, $not_equal);
\helper\game::update_views($game->id);
?>

<section class="section section--first">
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-lg-auto d-none d-xxl-block">
                <div class="w-300">
                    <?php if ($enable_ads) : ?>
                        <div class="ads-slot myads">
                            <?php echo \helper\themes::get_layout('ads_layout/doc', array('enable_ads' => $enable_ads)); ?>
                        </div>
                    <?php endif ?>
                    <?php echo \helper\themes::get_layout('game_item_ajax_play', array('games' => $games_tags)) ?>
                </div>
            </div>

            <div class="col-lg">
                <div>
                    <iframe id="iframehtml5" class="iframe-default" src="<?php echo $game->source_html ?>" width="100%" height="<?php echo ($game->height > 600) ? $game->height : 616 ?>px" title="<?php echo $game_name; ?>" frameborder="0" border="0" scrolling="auto" allowfullscreen></iframe>
                </div>
                <div class="px-lg-3">
                    <?php echo \helper\themes::get_layout('header_game', array('game' => $game, 'url' => $url, 'list_cate' => $list_cate, 'list_tags' => $list_tags)); ?>
                    <br>
                </div>

                <?php if ($enable_ads) : ?>
                    <div class="ads-slot">
                        <?php echo \helper\themes::get_layout('ads_layout/ngang', array('enable_ads' => $enable_ads)); ?>
                    </div><br>
                <?php endif ?>

                <div class="game__content2">

                    <?php echo \helper\themes::get_layout('bread_crumb', array('arr_bread' => $arr_bread, 'title' => $game_name)); ?>

                    <div class="game__content">
                        <?php if ($game->content) : ?>
                            <?php echo html_entity_decode(($game->content)); ?>
                        <?php else : ?>
                            <p><?php echo html_entity_decode(($game->excerpt)); ?></p>
                        <?php endif; ?>

                        <?php if ($game->controlsguide != null) : ?>
                            <h2 class="title-option">Instructions</h2>
                            <?php echo html_entity_decode(($game->controlsguide)); ?>
                        <?php endif; ?>
                    </div>

                    <?php echo \helper\themes::get_layout('tag_item', array('list_cate' => $list_cate, 'list_tags' => $list_tags)); ?>
                </div>

                <?php if ($enable_ads) : ?>
                    <br>
                    <div class="ads-slot">
                        <?php echo \helper\themes::get_layout('ads_layout/ngang', array('enable_ads' => $enable_ads)); ?>
                    </div>
                <?php endif ?>

                <?php if (count($posts)) : ?>
                    <div class="game__content2 mt-32">
                        <p class="mb-2 fs-4 text-title">Relates News</p>
                        <div>
                            <?php echo \helper\themes::get_layout('post_item_show', array('posts' => $posts)) ?>
                        </div>
                    </div>
                <?php endif ?>
            </div>

            <div class="col-lg-auto">
                <p class="mt-5 mb-4 fs-4 text-title screen-md">Similars Games</p>
                <div class="w-300">
                    <?php if ($enable_ads) : ?>
                        <div class="ads-slot myads">
                            <?php echo \helper\themes::get_layout('ads_layout/doc', array('enable_ads' => $enable_ads)); ?>
                        </div>
                    <?php endif ?>
                    <?php echo \helper\themes::get_layout('game_item_ajax_play', array('games' => $games_news2)) ?>
                </div>
            </div>
        </div>

        <?php if (count($games_news)) : ?>
            <div class="row mt-5">
                <a class="mb-4 fs-3 link-title" href="/new-games" title="new-games">New Games</a>
                <div>
                    <?php echo \helper\themes::get_layout('game_item_ajax', array('games' => $games_news)) ?>
                </div>
            </div>
        <?php endif ?>
    </div>
    </div>
</section>

<script>
    id_game = "<?php echo $game->id; ?>";
    url_game = "<?php echo $url; ?>";
</script>