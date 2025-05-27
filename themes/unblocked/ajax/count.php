<?php
$id = load_request()->get_value('id');
$ret  = \helper\game::update_views($id);
echo $ret;
