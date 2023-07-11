<!-- Categories -->
<div class="row item widget-categories widget">
    <div class="col-12 align-self-center">
        <h4 class="title"><?php echo __('Categories', 'xagora') ?></h4>
        <?php $categories = get_categories(array('hide_empty' => true, 'exclude' => get_cat_ID('Uncategorized'))); ?>
        <?php if (!empty($categories)) :  ?>
            <ul class="list-group list-group-flush">
                <?php foreach ($categories as $category) : ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="<?php echo esc_url(get_category_link($category->term_id)) ?>"><?php echo sanitize_text_field($category->name) ?></a>
                        <span class="badge circle"><?php echo $category->count ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <div class="no-content-available">
                <i class="fa fa-unlink"></i>
                <span><?php echo __('No Categories Available', 'xagora') ?></span>
            </div>
        <?php endif; ?>
    </div>
</div>