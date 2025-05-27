<?php
$url = ($url != null) ? $url : load_url()->current_url();
$domain_url = \helper\options::options_by_key_type('base_url');
$theme_url = '/' . get_config('root_theme') . "/" . \helper\options::options_by_key_type('index_theme');
$keywords = '';
$parent_id = 0;
$related_id = '';
$page = ($_GET['page'] != null && (int) $_GET['page'] > 0) ? $_GET['page'] : 1;
$limit = ($_GET['limit'] != null && (int) $_GET['limit'] > 0) ? $_GET['limit'] : 5;
$sort = ($_GET['sort'] != null) ? $_GET['sort'] : 'newest';
$comment_data = \helper\comment::paging($url, $related_id, $parent_id, $page, $limit, $order_by, $order_type, $keywords);
$comment_pagelink = \helper\comment::paginglink($url, $related_id, $parent_id, $keywords, $page, $limit);
$count_comment = \helper\comment::count($url, $related_id, $parent_id, $keywords);
$google_captcha_api = (\helper\options::options_by_key_type('google_captcha')) ? \helper\options::options_by_key_type('google_captcha') : "6Le_z6IZAAAAAFpVi9_AGboY38LdDjp4F1UoS7dn";
?>
<div class="comment-company">
    <div id="comments_area">
        <div class="comment_loading"></div>
        <?php if ($count_comment != null && $count_comment > 0) : ?>
            <div class="comment-header">
                <div class="comment-count" style="font-size: 18px;">
                    Comments<span id="comment_count">(<?php echo $count_comment ?>)</span></label>
                </div>
                <div class="comment-sort">
                    <label for="sort_by">Sort by</label>
                    <select id="sort_by" class="input-sm ">
                        <option value="newest">Newest</option>
                        <option value="oldest">Oldest</option>
                        <option value="popular">Popular</option>
                    </select>
                </div>
            </div>
        <?php endif; ?>
        <div id="list_comment"></div>
        <div class="comment-load-more"></div>
        <div class="make-comment">
            <form id="comment_form" class="form-group">
                <div class="row">
                    <!-- <div class="col-md-12 comment-notes">
                        <span id="email-notes">Your email address will not be published. Required fields are marked <span class="required">*</span>.</span>
                    </div> -->
                    <div class="col-md-12" id="comment_errors"></div>
                    <div class="col-md-6">
                        <input id="comment_author" name="comment_author" class="form-control" type="text" value="" size="30" maxlength="50" placeholder="Name" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <input id="comment_email" name="comment_email" type="input" value="" size="30" class="form-control" maxlength="100" placeholder="Email" autocomplete="off">
                    </div>
                    <div class="col-md-12">
                        <textarea id="comment_content" name="comment_content" class="form-control" cols="45" rows="3" maxlength="65525" placeholder="Content"></textarea>
                    </div>
                    <div class="col-md-12" style="padding-top:10px;padding-bottom:10px">
                        <input id="commentChecked" type="checkbox" name="commentChecked">
                        <label for="commentChecked" style="display:unset!important;cursor:pointer;" class="commentChecked-text">I'd read and agree to the terms and conditions.</label>
                    </div>
                    <div class="col-md-12 pull-center" style="padding-bottom: 10px;">
                        <input name="submit" type="submit" class="submit btn btn-primary" value="Comment" />
                        <input type="hidden" name="parent_id" id="parent_id" value="0" />
                        <input type="button" onclick="reply_all(); return false;" id="btn_cancel" class="submit btn btn-primary pull-right hidden" value="Cancel" />
                        <!-- <p id="msg"> Thank you for commenting. Please leave constructive comments, respect other people’s opinions, and stay on topic <span class="required">*</span>.</p> -->
                    </div>
                </div>
            </form>
        </div>
        <script>
            jQuery("#go_to_comment").click(function() {
                jQuery("html, body").animate({
                    scrollTop: jQuery("#comment_form").offset().top
                }, 1000);
            });
            jQuery("#comment_form").validate({
                focusInvalid: false,
                onfocusout: false,
                errorElement: "div",
                errorPlacement: function(error, element) {
                    error.appendTo("div#comment_errors");
                },
                ignore: ".ignore",
                rules: {
                    "comment_content": {
                        required: true,
                        maxlength: 65525
                    },
                    "comment_author": {
                        required: true,
                        maxlength: 50
                    },
                    "comment_email": {
                        required: true,
                        email: true,
                        maxlength: 100
                    },
                    "commentChecked": {
                        required: true
                    }
                },
                messages: {
                    "comment_content": {
                        required: "Please type your comment!",
                        maxlength: ""
                    },
                    "comment_author": {
                        required: "Please type your name!",
                        maxlength: ""
                    },
                    "comment_email": {
                        required: "Please type your email",
                        email: "Check your email is not exactly!",
                        maxlength: ""
                    },
                    "commentChecked": {
                        required: "Please agree to the terms and conditions before comment."
                    }
                },
                submitHandler: function() {
                    console.log('here');
                    jQuery(".comment_loading").show();
                    var question_ajax = "/make-comment.ajax";
                    var content = jQuery("#comment_content").val();
                    var author = jQuery("#comment_author").val();
                    var email = jQuery("#comment_email").val();;
                    var website = jQuery("#comment_website").val();
                    var parent_id = jQuery("#parent_id").val();
                    var metadataload = {};
                    metadataload.content = content;
                    metadataload.author = author;
                    metadataload.email = email;
                    metadataload.website = website;
                    metadataload.parent_id = parent_id;
                    metadataload.related_id = parseInt("0");
                    metadataload.related_url = "<?php echo $url; ?>";
                    jQuery.ajax({
                        url: question_ajax,
                        data: metadataload,
                        type: 'POST',
                        success: function(data) {
                            jQuery(".comment_loading").hide();
                            if (data != '') {
                                var result = jQuery.parseJSON(data);
                                if (result.result === true) {
                                    var comment_data = result.comment;
                                    var str_comment = "";
                                    if (comment_data.parent_id == 0) {
                                        str_comment = `<div id="comment_${comment_data.id}" class="replyWrap your_comment clearAfter">
                                                        <div class="listProfile">
                                                            <div class="img img-thumbnail">${comment_data.author.charAt(0)}</div>
                                                            <span class="user">${comment_data.author}</span>
                                                            <span class="user">${comment_data.date}</span>
                                                        </div>
                                                        <div class="listContent">
                                                            <div class="comment--content">${comment_data.content}</div>
                                                            <div class="control-action">
                                                                <a class="icon comment" href="javascript:;" onclick="reply_to(${comment_data.id});
                                                                    return false;" title="Add a comment to this comment" rel="nofollow">
                                                                    <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M14.2929 13.2929C13.9024 13.6834 13.9024 14.3166 14.2929 14.7071C14.6834 15.0976 15.3166 15.0976 15.7071 14.7071L20.7071 9.70711C21.0976 9.31658 21.0976 8.68342 20.7071 8.29289L15.7071 3.29289C15.3166 2.90237 14.6834 2.90237 14.2929 3.29289C13.9024 3.68342 13.9024 4.31658 14.2929 4.70711L17.5858 8H8C6.67392 8 5.40215 8.52678 4.46447 9.46447C3.52678 10.4021 3 11.6739 3 13V20C3 20.5523 3.44771 21 4 21C4.55229 21 5 20.5523 5 20V13C5 12.2044 5.31607 11.4413 5.87868 10.8787C6.44129 10.3161 7.20435 10 8 10H17.5858L14.2929 13.2929Z" />
                                                                    </svg>
                                                                    <b class="comment--reply">Reply</b>
                                                                    </a>
                                                                <a class="icon vote comment_vote_row_${comment_data.id} voteUp" href="javascript:;" onclick="comment_vote(<?php echo $comment->id; ?>, 'up');
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
                                                                <a class="icon vote comment_vote_row_${comment_data.id} voteDown" href="javascript:;" onclick="comment_vote(<?php echo $comment->id; ?>, 'down');
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
                                                    </div>`;
                                        if (comment_data.status == 'trash') {
                                            str_comment += "<p><i>Your comment is awaiting moderation!</i></p>";
                                        }
                                        jQuery("#list_comment").prepend(str_comment);
                                    } else {
                                        str_comment = `<div id="comment_${comment_data.id}" class="replyWrap your_comment clearAfter">
                                                        <div class="listProfile">
                                                            <div class="img img-thumbnail">${comment_data.author.charAt(0)}</div>
                                                            <span class="user">${comment_data.author}</span>
                                                            <span class="user">${comment_data.date}</span>
                                                        </div>
                                                        <div class="listContent">
                                                            <div class="comment--content">${comment_data.content}</div>
                                                        </div>
                                                    </div>`;
                                        if (comment_data.status == 'trash') {
                                            str_comment += "<p><i>Your comment is awaiting moderation!</i></p>";
                                        }
                                        jQuery("#comment_" + comment_data.parent_id).append(str_comment);
                                        jQuery("#comment_form").appendTo(".make-comment");
                                        jQuery("#comment_form").removeClass("commentBlock");
                                        reply_all();
                                    }

                                    jQuery("#comment_count").html(parseInt(("<?php echo $count_comment ?>")));
                                    jQuery("html, body").animate({
                                        scrollTop: jQuery("#list_comment").offset().top
                                    }, 1000);
                                    jQuery("#comment_form").trigger("reset");

                                }
                            }
                        }
                    });
                }
            });
        </script>
        <script>
            function reply_to(comment_id) {
                jQuery("#comment_form").addClass("commentBlock");
                jQuery("#btn_cancel").removeClass("hidden");
                jQuery("#comment_form").trigger("reset");
                jQuery("#parent_id").val(comment_id);
                jQuery("#comment_form").appendTo("#comment_" + comment_id);
            }

            function reply_all() {
                jQuery("#comment_form").trigger("reset");
                jQuery("#parent_id").val("0");
                jQuery("#comment_form").appendTo(".make-comment");
                jQuery("#btn_cancel").addClass("hidden");
                jQuery("#comment_form").removeClass("commentBlock");
            }

            function comment_vote(comment_id, vote) {
                jQuery(".comment_vote_row_" + comment_id).css("fontSize", 0);
                jQuery(".comment_vote_row_" + comment_id).prop('onclick', null).off('click');

                var comment_comment_voteajax = "/comment-vote.ajax";
                var metadataload = {};
                metadataload.comment_id = comment_id;
                metadataload.vote = vote;
                jQuery.ajax({
                    url: comment_comment_voteajax,
                    data: metadataload,
                    type: 'POST',
                    success: function(data) {
                        if (data != '') {
                            var result = jQuery.parseJSON(data);
                            if (result.result === true) {
                                var comment_obj = result.comment;
                                switch (vote) {
                                    case "up":
                                        jQuery("#comment_voteup_" + comment_id).html(comment_obj.like);
                                        break;
                                    case "down":
                                        jQuery("#comment_votedown_" + comment_id).html(comment_obj.dislike);
                                        break;
                                }

                            }
                        }
                    }
                });
            }

            function report_comment(comment_id) {
                jQuery("#report_comment_" + comment_id).css("fontSize", 0);
                jQuery("#report_comment_" + comment_id).prop('onclick', null).off('click');
            }
        </script>
        <script>
            jQuery("#btn_comments_area").click(function() {
                jQuery("html, body").animate({
                    scrollTop: jQuery("#comment_form").offset().top
                }, 1000);
            });
            jQuery('#load_more_comment').click(function(event) {
                event.preventDefault();
                var page = jQuery(this).data("page");
                var limit = jQuery(this).data("limit");
                var sort = jQuery(this).data("sort");
                var url = jQuery(this).data("url");
                load_comment(page, limit, sort, url, '#list_comment', '');
            });

            function load_comment(page, limit, sort, url, main_contain_id, refresh) {
                jQuery("#load_more_comment").remove();
                jQuery(".comment-load-more").show();
                var mainposturl = "/comment-paging.ajax";
                var metadataload = {};
                metadataload.page = page;
                metadataload.limit = limit;
                metadataload.sort = sort;
                metadataload.url = url;
                jQuery.ajax({
                    url: mainposturl,
                    data: metadataload,
                    type: 'POST',
                    success: function(data) {
                        jQuery(".comment-load-more").hide();
                        if (refresh === 'f5') {
                            jQuery(main_contain_id).html(data);
                        } else {
                            jQuery(main_contain_id).append(data);
                        }
                        jQuery('#load_more_comment').click(function(event) {
                            event.preventDefault();
                            var page = jQuery(this).data("page");
                            var limit = jQuery(this).data("limit");
                            var sort = jQuery(this).data("sort");
                            var url = jQuery(this).data("url");
                            load_comment(page, limit, sort, url, '#list_comment', '');
                        });
                    }
                });
            }
            load_comment(<?php echo $page; ?>, <?php echo $limit; ?>, "<?php echo $sort ?>", "<?php echo $url; ?>", "#list_comment", "");
            jQuery('#sort_by').on('change', function() {
                load_comment(<?php echo $page; ?>, <?php echo $limit; ?>, "" + this.value + "", "<?php echo $url; ?>", "#list_comment", "f5");
            });
        </script>
    </div>
</div>
<style>
    #comments_area .row {
        display: flex;
        margin: 0 -15px;
        flex-wrap: wrap;
        width: unset
    }

    #comments_area .col-md-12 {
        box-sizing: border-box;
        width: 100%;
        padding: 0 15px;
    }

    #comments_area input,
    #comments_area select {
        appearance: revert;
    }

    #comments_area .col-md-6 {
        box-sizing: border-box;
        padding: 0 15px;
        width: 50%
    }

    #comments_area .col-md-4 {
        box-sizing: border-box;
        padding: 0 15px;
        width: 33.33%
    }

    .comment-header,
    .comment-count {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: 600;
    }

    #comment_count {
        margin-left: 5px;
    }

    .comment-load-more,
    .comment_loading {
        background: url('<?php echo $theme_url; ?>/rs/imgs/comments/icon_loader.gif') 0 0/100% auto no-repeat;
        width: 70px;
        height: 50px;
        margin: 0 auto;
        display: none
    }

    .col-all {
        display: flex;
        flex-basis: auto
    }

    .replyWrap {
        position: relative;
        background: url('<?php echo $theme_url; ?>/rs/imgs/comments/quote.png') right top no-repeat;
        border-top: 1px solid #e8e8e8
    }

    .clearAfter {
        display: block;
        clear: both;
        padding: 10px 0;
    }

    .listProfile {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .listProfile .user {
        font-size: 16px;
        margin-right: 10px;
    }

    .listProfile .user:nth-child(2) {
        text-decoration: underline;
        font-size: 18px;
    }

    .listProfile .user:nth-child(3) {
        opacity: 0.85;
    }

    .listContent {
        position: relative;
        overflow: hidden
    }

    .replyWrap .left {
        float: left;
        padding: 0
    }

    .replyWrap b.voteUp {
        color: #3998f7;
        margin-left: 5px;
    }

    .replyWrap .rating b {
        font-weight: 400
    }

    .replyWrap b.voteDown {
        color: #ef3056
    }

    .replyWrap a.icon.voteDown svg {
        transform: rotate(-180deg);
        fill: #ef3056;
    }

    .replyWrap a.icon.voteUp svg {
        fill: #3998f7;
    }

    .replyWrap .right {
        float: right;
        padding: 0
    }

    .replyWrap a.icon {
        display: flex;
        align-items: center;
        letter-spacing: -1px;
        font-size: 16px;
        padding: 0;
        padding: 2px;
        margin-right: 8px;

    }

    .replyWrap a.icon>svg {
        width: 18px;
        height: 18px;
        fill: #4b80c9;
    }

    .icon {
        padding-left: 20px;
        background-position: left center;
        background-repeat: no-repeat
    }

    a.icon {
        border: 0 !important
    }

    .replyWrap a.icon>b {
        font-size: 16px;
        line-height: 1;
        margin-left: 2px;
        opacity: 0.8;
    }

    .commentBlock {
        border-top: 1px solid #eee;
    }

    .commentBlock .listProfile {
        margin-left: 0;
        padding-left: 6px;
        text-align: center
    }

    .your_comment {
        background: #d1f4a8;
        padding: 10px;
    }

    /* .comment {
        background-image: url('<?php echo $theme_url; ?>/rs/imgs/comments/comment.png')
    }

    .replyWrap a.voteUp {
        background-image: url('<?php echo $theme_url; ?>/rs/imgs/comments/thumbs_up.png')
    }

    .replyWrap a.voteDown {
        background-image: url('<?php echo $theme_url; ?>/rs/imgs/comments/thumbs_down.png')
    } */

    .replyWrap a.report {
        background-position: 0 2px
    }


    /* a.fav {
        background-image: url('<?php echo $theme_url; ?>/rs/imgs/comments/heart.png')
    }

    .report {
        background-image: url('<?php echo $theme_url; ?>/rs/imgs/comments/report.png')
    } */

    .commentLink {
        float: left;
        padding-left: 35px;
        background: url('<?php echo $theme_url; ?>/rs/imgs/comments/comment_comment.png') left center no-repeat;
        border: 0;
        line-height: 26px
    }

    #rc-imageselect {
        transform: scale(.77);
        -webkit-transform: scale(.77);
        transform-origin: 0 0;
        -webkit-transform-origin: 0 0
    }

    @media screen and (max-height:575px) {

        #rc-imageselect,
        .g-recaptcha {
            transform: scale(.77);
            -webkit-transform: scale(.77);
            transform-origin: 0 0;
            -webkit-transform-origin: 0 0
        }
    }

    .required {
        color: red
    }

    input.error,
    textarea.error {
        border: 1px solid red !important
    }

    div.error,
    label.error {
        font-weight: 400;
        color: red !important;
        display: block
    }

    .text-normal {
        font-weight: 400 !important
    }

    .make-comment label {
        display: block;
        margin-left: 12px;
        padding: 10px 0
    }

    #respond textarea {
        background-color: #fff;
        border: 1px solid #ddd;
        color: #333;
        font-size: 18px;
        font-weight: 400;
        padding: 16px;
        width: 100%
    }

    .btn,
    .form-control {
        font-size: 16px;
        line-height: 1.42857143;
        background-image: none
    }

    #comments_area {
        text-align: left;
        color: inherit;
        line-height: 1.5
    }

    .form-control {
        display: block;
        width: 100%;
        /* height: 34px; */
        color: #555;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        box-sizing: border-box;
        padding: 10px 15px;
        margin-top: 15px;
    }

    textarea.form-control {
        height: auto
    }

    .btn {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        border: 1px solid transparent;
        border-radius: 4px
    }

    .btn-primary {
        background-color: #4b80c9;
        border-color: #4b80c9;
        color: #fff
    }

    .btn-primary:hover {
        font-weight: 700
    }

    .hidden {
        display: none
    }

    .pull-right {
        float: right !important
    }

    .comment-date {
        /* white-space: nowrap; */
        /* font-size: 10px; */
    }

    select.input-sm {
        height: 30px;
        line-height: 30px;
        margin: 10px
    }

    #list_comment a {
        color: inherit
    }

    #load_more_comment {
        color: #fff !important;
    }

    #comment_form {
        padding-top: 20px
    }

    #msg {
        padding: 10px 0;
        font-style: italic
    }

    .comment-notes {
        padding-bottom: 10px;
        font-style: italic
    }

    #comment_form {
        clear: both
    }

    .question-title {
        padding-left: 15px
    }

    #sort_by {
        color: #000
    }

    #comments_area .img-thumbnail {
        display: inline-block;
        -webkit-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
        border-radius: 50%;
        background-color: #4b80c9;
        color: #fff;
        text-transform: uppercase;
        width: 45px;
        height: 45px;
        line-height: 36px;
        text-align: center;
        margin-right: 10px;
        font-weight: 600;
        font-size: 20px;
    }

    .listProfile img {
        width: auto;
        height: auto
    }

    .img-cirle {
        width: 24px !important;
        height: 24px !important
    }

    .comment--content {
        margin-bottom: 10px;
        word-break: break-word;
    }

    .control-action {
        display: flex;
        align-items: center;
    }

    .comment__reply {
        padding-left: 20px;
        border-left: 2px dashed #e8e8e8;
    }

    p>i {
        font-size: 16px;
    }

    @media (max-width:991px) {
        #comments_area .col-md-4 {
            width: 100%
        }
    }
</style>