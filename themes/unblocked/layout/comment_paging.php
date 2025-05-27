<?php
$url = ($url != null) ? $url : load_url()->current_url();
$domain_url = \helper\options::options_by_key_type('base_url');
$theme_url = '/' . get_config('root_theme') . "/" . \helper\options::options_by_key_type('index_theme');
$keywords = '';
$parent_id = 0;
$related_id = '';
$page = ($page != null && (int) $page > 0) ? $page : 1;
$limit = ($limit != null && (int) $limit > 0) ? $limit : 5;
$order_type = 'desc';
$order_by = 'date';
if ($sort != null) {
    switch ($sort) {
        case "newest":
            $order_type = 'desc';
            $order_by = 'date';
            break;
        case "oldest":
            $order_type = 'asc';
            $order_by = 'date';
            break;
        case "popular":
            $order_type = 'desc';
            $order_by = 'scores';
            break;
    }
}
$comment_data = \helper\comment::paging($url, $related_id, $parent_id, $page, $limit, $order_by, $order_type, $keywords);
$comment_pagelink = \helper\comment::paginglink($url, $related_id, $parent_id, $keywords, $page, $limit);
?>
<?php if ($comment_data != null && count($comment_data) > 0) : ?>
    <?php foreach ($comment_data as $comment) : ?>
        <div id="comment_<?php echo $comment->id ?>" class="replyWrap clearAfter">
            <div class="listProfile">
                <div class="img img-thumbnail"><?php echo substr($comment->author, 0, 1); ?></div>
                <span class="user"><?php echo $comment->author; ?></span>
                <span class="user"><?php echo \helper\number::convert_time($comment->date); ?></span>
            </div>
            <div class="listContent">
                <div class="comment--content"><?php echo $comment->get_content(); ?></div>
                <div class="control-action">
                    <a class="icon comment" href="javascript:;" onclick="reply_to(<?php echo $comment->id; ?>);
                        return false;" title="Add a comment to this comment" rel="nofollow">
                        <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.2929 13.2929C13.9024 13.6834 13.9024 14.3166 14.2929 14.7071C14.6834 15.0976 15.3166 15.0976 15.7071 14.7071L20.7071 9.70711C21.0976 9.31658 21.0976 8.68342 20.7071 8.29289L15.7071 3.29289C15.3166 2.90237 14.6834 2.90237 14.2929 3.29289C13.9024 3.68342 13.9024 4.31658 14.2929 4.70711L17.5858 8H8C6.67392 8 5.40215 8.52678 4.46447 9.46447C3.52678 10.4021 3 11.6739 3 13V20C3 20.5523 3.44771 21 4 21C4.55229 21 5 20.5523 5 20V13C5 12.2044 5.31607 11.4413 5.87868 10.8787C6.44129 10.3161 7.20435 10 8 10H17.5858L14.2929 13.2929Z" />
                        </svg>
                        <b class="comment--reply">Reply</b>
                    </a>
                    <a class="icon vote comment_vote_row_<?php echo $comment->id ?> voteUp" href="javascript:;" onclick="comment_vote(<?php echo $comment->id; ?>, 'up');
                                return false;" title="Vote this comment up (helpful)" rel="nofollow">
                        <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="style=fill">
                                <g id="like">
                                    <path id="Subtract" fill-rule="evenodd" clip-rule="evenodd" d="M15.9977 5.63891C16.2695 4.34931 15.433 3.00969 14.2102 2.59462C13.6171 2.37633 12.9892 2.4252 12.4662 2.60499C11.9449 2.78419 11.4461 3.12142 11.1369 3.58441L11.136 3.58573L7.49506 9.00272C8.05104 9.29585 8.43005 9.87954 8.43005 10.5518V21.3018H6.91003V21.3018H16.6801C18.2938 21.3018 19.2028 20.2977 19.8943 19.202C20.6524 18.0009 21.1453 16.7211 21.5116 15.5812C21.6808 15.0546 21.8252 14.5503 21.9547 14.0984L21.9863 13.9881C22.126 13.5007 22.2457 13.0904 22.366 12.7549C22.698 11.8292 22.5933 10.9072 22.067 10.2072C21.5476 9.5166 20.7005 9.15175 19.76 9.15175H15.76C15.6702 9.15175 15.6017 9.11544 15.5599 9.06803C15.5238 9.02716 15.4831 8.95058 15.502 8.81171L15.9977 5.63891Z" fill="" />
                                    <path id="rec" d="M2.18005 10.6199C2.18005 10.03 2.62777 9.55176 3.18005 9.55176H6.68005C7.23234 9.55176 7.68005 10.03 7.68005 10.6199V21.3018H3.18005C2.62777 21.3018 2.18005 20.8235 2.18005 20.2336V10.6199Z" fill="" />
                                </g>
                            </g>
                        </svg>
                        <b class="voteUp" id="comment_voteup_<?php echo $comment->id; ?>"><?php echo $comment->like; ?></b>
                    </a>
                    <a class="icon vote comment_vote_row_<?php echo $comment->id ?> voteDown" href="javascript:;" onclick="comment_vote(<?php echo $comment->id; ?>, 'down');
                                return false;" title="Vote this comment down (not helpful)" rel="nofollow">
                        <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="style=fill">
                                <g id="like">
                                    <path id="Subtract" fill-rule="evenodd" clip-rule="evenodd" d="M15.9977 5.63891C16.2695 4.34931 15.433 3.00969 14.2102 2.59462C13.6171 2.37633 12.9892 2.4252 12.4662 2.60499C11.9449 2.78419 11.4461 3.12142 11.1369 3.58441L11.136 3.58573L7.49506 9.00272C8.05104 9.29585 8.43005 9.87954 8.43005 10.5518V21.3018H6.91003V21.3018H16.6801C18.2938 21.3018 19.2028 20.2977 19.8943 19.202C20.6524 18.0009 21.1453 16.7211 21.5116 15.5812C21.6808 15.0546 21.8252 14.5503 21.9547 14.0984L21.9863 13.9881C22.126 13.5007 22.2457 13.0904 22.366 12.7549C22.698 11.8292 22.5933 10.9072 22.067 10.2072C21.5476 9.5166 20.7005 9.15175 19.76 9.15175H15.76C15.6702 9.15175 15.6017 9.11544 15.5599 9.06803C15.5238 9.02716 15.4831 8.95058 15.502 8.81171L15.9977 5.63891Z" fill="" />
                                    <path id="rec" d="M2.18005 10.6199C2.18005 10.03 2.62777 9.55176 3.18005 9.55176H6.68005C7.23234 9.55176 7.68005 10.03 7.68005 10.6199V21.3018H3.18005C2.62777 21.3018 2.18005 20.8235 2.18005 20.2336V10.6199Z" fill="" />
                                </g>
                            </g>
                        </svg>
                        <b class="voteDown" id="comment_votedown_<?php echo $comment->id; ?>"><?php echo $comment->dislike; ?></b>
                    </a>
                </div>
            </div>
        </div>
        <?php
        $comment_comment_data = \helper\comment::paging('', $related_id, $comment->id, 1, 20, 'date', 'desc', '');
        ?>
        <?php if ($comment_comment_data != null && count($comment_comment_data) > 0) : ?>
            <?php foreach ($comment_comment_data as $com_index => $comment) : ?>
                <div id='comment_<?php echo $comment->id ?>' class='commentBlock comment__reply <?php echo ($com_index % 2) ? "alternate" : ""; ?> clearAfter'>
                    <div class="listProfile">
                        <div class="img img-thumbnail"><?php echo substr($comment->author, 0, 1); ?></div>
                        <span class="user"><?php echo $comment->author; ?></span>
                        <span class="user"><?php echo \helper\number::convert_time($comment->date); ?></span>
                    </div>
                    <div class="listContent">
                        <div class="comment--content"><?php echo $comment->get_content(); ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endforeach; ?>
    <?php
    $comment_next_page_data = \helper\comment::paging($url, $related_id, $parent_id, ($page + 1), $limit, $order_by, $order_type, $keywords);
    $count_more = (count($comment_next_page_data) < $limit) ? count($comment_next_page_data) : $limit;
    ?>
    <?php if ($comment_next_page_data != null && count($comment_next_page_data) > 0) : ?>
        <a href="<?php echo $url, '?page=' . ($page + 1) . '&limit=' . $limit . '&sort=' . $sort; ?>" class="btn btn-primary form-control" data-url="<?php echo $url; ?>" id="load_more_comment" data-page="<?php echo $page + 1; ?>" data-limit="<?php echo $limit; ?>" data-sort="<?php echo $sort; ?>">Load more <?php echo $count_more; ?> comments</a>
    <?php endif; ?>
<?php endif; ?>