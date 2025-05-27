<?php $theme_url = '/' . DIR_THEME; ?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="external" content="true">
    <meta name="distribution" content="Global">
    <meta http-equiv="audience" content="General">
    <?php if ($custom) {
        echo $custom;
    } ?>
    <link rel="stylesheet" href="<?php echo $theme_url; ?>rs/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $theme_url; ?>rs/css/main.css">
    <?php if ($enable_ads) : ?>
        <link rel="stylesheet" href="<?php echo $theme_url; ?>rs/css/ads.css">
    <?php endif ?>

    <?php
    echo \helper\themes::get_layout('header/analytics');
    ?>
    <?php
    $header = \helper\options::options_by_key_type('facebook_appid');
    echo html_entity_decode($header);
    ?>

    <!-- WGP Code -->
    <link rel="dns-prefetch" href="https://universal.wgplayer.com"/><script type="text/javascript" async>!function(e,t){a=e.createElement("script"),m=e.getElementsByTagName("script")[0],a.async=1,a.src=t,a.fetchPriority='high',m.parentNode.insertBefore(a,m)}(document,"https://universal.wgplayer.com/tag/?lh="+window.location.hostname+"&wp="+window.location.pathname+"&ws="+window.location.search);</script>       

</head>

<body class="scroll">
    <div class="content">