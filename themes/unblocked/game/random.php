<?php
//lay het game ra nay
$limit = 20;
// $limit = 5;
$games = \helper\game::get_paging($page, $limit, $keywords, $type, $display, $is_hot, $is_new, $field_order, $order_type, $category_id, $not_equal);
// in($games); // mảng các games
// die;

// Hàm random rand(ra 1 số bất kỳ từ 0 -> $limit-1)  
// => đặt biến $item: lấy ra 1 con game(từ mảng $games) bằng cách đưa key==số random và gọi ra: $games[$ran]
// lấy ra được 1 game thì lại lấy tiếp slug của nó ($item->slug) => chuyển hướng nó đến trang và nối thêm đoạn slug đó 
$ran = rand(0, $limit - 1);
$item = $games[$ran];
$slug = header("Location: /$item->slug");
exit;

// in($item);  //1 con game(có đầy đủ tất cả)
// die;
// in($item->slug);  //topdown-police-chase-2023
// die;