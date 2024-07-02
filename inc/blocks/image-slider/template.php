<?php
$display_preview = show_preview($block, $is_preview);
if ($display_preview) return;

$visibility = !empty(get_field('image_slider_block_visibility') && is_array(get_field('image_slider_block_visibility'))) ? implode(' ', get_field('image_slider_block_visibility') ) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$images = get_field('images') ? get_field('images') : null;

if ($images) : ?>
    <div class="image-slider <?= $visibility ?>">
        <div class="image-slider__wrapper">
            <div class="image-slider__slides bn-gallery-container">
                <?php foreach ($images as $image) : ?>
                    <div class="image-slider__slides--slide">
                        <a href="<?= $is_preview ? '#void' : $image['url'] ?>" data-cropped="true" data-pswp-width="<?= $image['width'] ?>" data-pswp-height="<?= $image['height'] ?>">
                            <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>" class="image border--primary">
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
<?php endif ?>