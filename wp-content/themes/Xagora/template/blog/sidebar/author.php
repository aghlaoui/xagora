<!-- Author -->
<div class="row item widget-author offers">
    <div class="col-12 align-self-center text-center items">
        <div class="item">
            <div class="card">
                <?php
                $author_id = get_post_field('post_author', get_the_ID());
                $image = esc_url(get_avatar_url($author_id, array('size' => 128)));
                ?>
                <img src="<?php echo $image ?>" alt="Person" class="m-auto person">

                <h4><?php sanitize_text_field(the_author()) ?></h4>
                <p><?php echo sanitize_textarea_field(get_the_author_meta('description')); ?></p>
                <ul class="mt-3 mx-auto navbar-nav social share-list">
                    <?php
                    while (have_rows('user_social_media', 'user_' . $author_id)) {
                        the_row();
                        $icon = sanitize_text_field(get_sub_field('platform'));
                        $url = esc_url(get_sub_field('link'));

                        printf('<li class="nav-item"><a href="%s" class="nav-link"><i class="fab %s"></i></a></li>', $url, $icon);
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>