<?php
if (!$favicon) {
    $favicon = \helper\options::options_by_key_type('favicon');
}
$fix_url = $base_url;
$banner = "/cache$banner";
$banner = preg_replace('/\/+/', '/', $banner);
?>
<title><?= ucwords($site_title); ?></title>
<meta name="title" content="<?php echo $site_title ?>">
<meta name="description" content="<?= $site_description ?>">
<?php if (!empty($site_keywords)) : ?>
    <meta name="keywords" content="<?= strtolower($site_keywords); ?>">
    <meta name="news_keywords" content="<?= strtolower($site_keywords); ?>">
<?php endif; ?>
<link rel="canonical" href="<?= $fix_url ?>">
<link rel="icon" href="<?php echo $favicon; ?>" />
<link rel="apple-touch-icon" href="<?php echo $favicon ?>" />
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $favicon57; ?>">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $favicon72; ?>">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $favicon114; ?>">
<meta property="og:title" content="<?= $site_title; ?>" itemprop="headline" />
<meta property="og:type" content="website" />
<meta property="og:url" itemprop="url" content="<?= $fix_url ?>" />
<meta property="og:image" itemprop="thumbnailUrl" content="<?= $banner ?>" />
<meta property="og:description" content="<?= $site_description ?>" itemprop="description" />
<meta property="og:site_name" content="<?= $site_name ?>" />
<meta name="twitter:title" content="<?= $site_title; ?>" />
<meta name="twitter:url" content="<?= $fix_url ?>" />
<meta name="twitter:image" content="<?= $banner ?>" />
<meta name="twitter:description" content="<?= $site_description ?>">
<meta name="twitter:card" content="summary" />