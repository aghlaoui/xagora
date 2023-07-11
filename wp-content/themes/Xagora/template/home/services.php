<!-- Services -->
<?php $id = get_the_ID() ?>
<section id="services" class="section-3 odd offers">
    <div class="container">
        <div class="row intro">
            <div class="col-12 col-md-9 align-self-center text-center text-md-left">
                <span class="pre-title m-auto ml-md-0"><?php echo sanitize_text_field(get_field('hps_pre_title', $id)) ?></span>
                <h2><?php replaceWithSpanTags(get_field('hps_title', $id)) ?></h2>
                <p><?php echo sanitize_text_field(get_field('hps_description', $id)) ?></p>
            </div>
            <div class="col-12 col-md-3 align-self-end">
                <a href="<?php echo esc_url(get_post_type_archive_link('service')) ?>" class="btn mx-auto mr-md-0 ml-md-auto outline-button"><?php echo __('SEE ALL', 'xagora') ?></a>
            </div>
        </div>

        <div class="row justify-content-center items">
            <?php
            $query = new WP_Query(array(
                'post_type' => 'service',
                'posts_per_page' => 6
            ));

            while ($query->have_posts()) {
                $query->the_post();
                $p_id = get_the_ID();
                $icon = sanitize_text_field(get_field('ssp_icon', $p_id));
                $title = sanitize_text_field(get_the_title());
                $excerpt = substr(sanitize_text_field(get_field('ssp_excerpt', $p_id)), 0, 56) . '...';
                $link = esc_url(get_the_permalink($p_id));

                echo '<div class="col-12 col-md-6 col-lg-4 item"><div class="card">';
                printf('<i class="icon icon-%s"></i><h4>%s</h4><p>%s</p> <a href="%s"><i class="btn-icon pulse fas fas fa-arrow-right"></i></a>', $icon, $title, $excerpt, $link);
                echo '</div></div>';
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>