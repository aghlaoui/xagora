<!-- Tags -->
<div class="row item widget-tags widget">
    <?php $tags = get_tags() ?>
    <div class="col-12 align-self-center">
        <h4 class="title"><?php echo __('Tags', 'xagora') ?></h4>
        <?php if (!empty($tags)) : ?>
            <div class="badges">
                <?php
                foreach ($tags as $tag) {
                    $link = esc_url(get_tag_link($tag->term_id));
                    $name = sanitize_text_field($tag->name);
                    printf('<span class="badge"><a href="%s">%s</a></span>', $link, $name);
                }
                ?>
            </div>
        <?php else : ?>
            <div class="no-content-available">
                <i class="fa fa-unlink"></i>
                <span><?php echo __('No Tags Available', 'xagora') ?></span>
            </div>
        <?php endif; ?>
    </div>
</div>