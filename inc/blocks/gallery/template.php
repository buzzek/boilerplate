<?php
$display_preview = show_preview($block, $is_preview);
if ($display_preview) return;

$visibility = !empty(get_field('gallery_block_visibility') && is_array(get_field('gallery_block_visibility'))) ? implode(' ', get_field('gallery_block_visibility') ) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$spaces = get_field('gallery_styles_space_settings') ? str_replace('none', '', implode(' ', get_field('gallery_styles_space_settings'))) : null;
$images = get_field('images') ? get_field('images') : null;

if ($images) {
    echo '<div class="bn-gallery bn-gallery-container">';
    foreach ($images as $image) : ?>
        <div class="bn-gallery__wrapper">
            <a href="<?= $is_preview ? '#void' : $image['url'] ?>" data-cropped="true" data-pswp-width="<?= $image['width'] ?>" data-pswp-height="<?= $image['height'] ?>" class="bn-gallery__image">
                <img alt="<?= $image['title'] ?>" src="<?= $image['url'] ?>" />
            </a>
        </div>
    <?php
    endforeach;
    echo ' </div>';
}
?>