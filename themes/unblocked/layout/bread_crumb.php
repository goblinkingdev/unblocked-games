<?php //if ($arr_bread) : 
?>
<!-- <div class="container">
    <div class="row">
        <div class="col-12"> -->
<ul class="breadcrumbs" <?php echo $post ?>>
    <li class="breadcrumbs__item">
        <a class=" fw-bold" href="/" title="Home">Home</a>
    </li>
    <?php foreach ($arr_bread as $breadnew) : ?>
        <?php if ($breadnew['source']) : ?>
            <li class="breadcrumbs__item">
                <a class="breadcrumb_name fw-bold" href="/<?php echo $breadnew['source']; ?>" title="<?php echo $breadnew['name'] ?>"><?php echo $breadnew['name'] ?></a>
            </li>
        <?php else : ?>
            <li class="breadcrumbs__item breadcrumbs__item--active">
                <?php echo $breadnew['name']; ?>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
<!-- </div>
    </div>
</div> -->

<!-- bg animation -->
<div id="canvas2" class="section__canvas">
</div>
<!-- end bg animation -->
<!-- end section head -->
<?php //endif; 
?>