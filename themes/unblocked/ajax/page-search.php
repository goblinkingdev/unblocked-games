<?php
$keywords = $_POST['keywords'];

if ($keywords) {
    $page = 1;
    $limit = 12;
    $display = "yes";
    $games = \helper\game::get_paging($page, $limit, $keywords, null, $display, null, null, "views", "DESC", null, null);
    $data = [];
    if ($games) {
        // echo "vao day";
        $html = '';
        foreach ($games as $item) {
            $html .= '<a class="games-show-item" href="/' . $item->slug . '" title="' . $item->name . '">';
            $html .= '<img class="games-show-img" src="' . \helper\image::get_thumbnail($item->image, 45, 35, 'f') . '" width="45" height="35" alt="' . $item->name . '" title="' . $item->name . '">';
            $html .= '<span class="games-show-title">' . $item->name . '</span>';
            $html .= '</a>';
        }
        // $html .= '<a class="search-end" href="/search?q=' . $keywords . '>Search all</a>';
        // echo $html;
        $data['html'] = $html;
        $data['flag'] = true;
    } else {
        $data['html'] = '<div class="search-end">Not found!</div>';
        $data['flag'] = false;
    }
    echo json_encode($data);
}
