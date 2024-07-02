<?php
$visibility = !empty(get_field('image_block_visibility') && is_array(get_field('image_block_visibility'))) ? implode(' ', get_field('image_block_visibility') ) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$spaces = get_field('image_styles_space_settings') ? str_replace('none', '', implode(' ', get_field('image_styles_space_settings'))) : null;
$image = get_field('img') ? get_field('img') : null;
$lightbox = get_field('lightbox') ? get_field('lightbox') : null;
$animation_name = get_field('image_animation_name') ? get_field('image_animation_name') : null;
$animation_delay = get_field('image_animation_delay') ? get_field('image_animation_delay') : null;

if ($image) {
    $image_size = get_field('img_size') ? get_field('img_size') : null;

    switch ($image_size) {
        case 'thumbnail':
            $image_url = $image['sizes']['thumbnail'];
            break;
        case 'medium':
            $image_url = $image['sizes']['medium'];
            break;
        case 'medium-large':
            $image_url = $image['sizes']['medium_large'];
            break;
        case 'large':
            $image_url = $image['sizes']['large'];
            break;
        default:
            $image_url = $image['url'];
            break;
    }
?>

    <figure>
        <?= $lightbox ? '<a href="' . ($is_preview ? '#void' : $image_url) . '" data-cropped="true" data-pswp-width="' . $image['width'] . '" data-pswp-height="' . $image['height'] . '">' : '' ?>
        <img src="<?= $image_url ?>" alt="<?= $image['alt'] ?>" class="image <?= $spaces ?> <?= $add_class ?> <?= $visibility ?>"  <?= $animation_name ? 'data-aos="'. $animation_name . '"' : "" ?><?= $animation_delay ? 'data-aos-delay="'. $animation_delay .'"' : "" ?> />
        <?php if ($image['caption']) : ?>
            <figcaption><?= $image['caption'] ?></figcaption>
        <?php endif; ?>
        <?= $lightbox ? '</a>' : '' ?>
    </figure>

<?php } ?>