<?php
$display_preview = show_preview($block, $is_preview);
if ($display_preview) return;

$visibility = !empty(get_field('logotypes_list_block_visibility') && is_array(get_field('logotypes_list_block_visibility'))) ? implode(' ', get_field('partners_list_block_visibility') ) : '';
$add_class = isset($block['className']) ? $block['className'] : null;
$logotypes = get_field('logotypes') ? get_field('logotypes') : null;
?>

<div class="logotypes-list <?= $add_class ?> <?= $visibility ?>">
    <?php if ($logotypes) : ?>
        <?php foreach ($logotypes as $logotype) : ?>
            <div class="logotypes-list__col">
                <?php if ($logotype['link']) : ?><a href="<?= $is_preview ? '#void' : $logotype['link'] ?>" target="_blank"><?php endif; ?>
                    <img src="<?= $logotype['logo']['url'] ?>" alt="<?= $logotype['logo']['alt'] ?>">
                <?php if ($logotype['link']) : ?></a><?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>