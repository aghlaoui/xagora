<?php $id_service = get_the_ID() ?>
<!-- Single -->
<section id="single" class="section-1 single">
    <div class="container">
        <div class="row">

            <!-- Main -->

            <div class="col-12 col-lg-8 p-0 text">
                <div class="row intro m-0">
                    <div class="col-12">
                        <span class="pre-title m-0"><?php echo sanitize_text_field(get_field('sss_subtitle', $id_service)) ?></span>
                        <div class="title-icon">
                            <h2><?php wrapServiceFirstWord(get_the_title($id_service), get_field('ssp_icon', $id_service)) ?></h2>
                        </div>
                    </div>
                </div>
                <?php if (get_field('sss_content', $id_service)) : ?>
                    <div class="row">
                        <div class="col-12 align-self-center">
                            <?php
                            $allowed_tags = '<a><p><b><blockquote><u><ul><li><h1><h2><h3><h4><h5><h6><strong><figure><img>';
                            $content = get_field('sss_content', $id_service);
                            echo strip_tags($content, $allowed_tags);
                            ?>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="col-12 col-lg-8 no-content-container">
                        <div class="no-service-available">
                            <span><?php echo __('No service content available.', 'xagora') ?></span>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Sidebar -->
            <aside class="col-12 col-lg-4 pl-lg-5 p-0 float-right sidebar">
                <div class="row">
                    <div class="col-12 align-self-center text-left">
                        <h4><?php echo __('Other Services', 'xagora') ?></h4>
                        <ul class="list-group list-group-flush">
                            <?php
                            $query = new WP_Query(array(
                                'post_type' => 'service',
                                'posts_per_page' => 10
                            ));

                            while ($query->have_posts()) {
                                $query->the_post();
                                $id_s = get_the_ID();
                                $link = esc_url(get_the_permalink($id_s));
                                $title = sanitize_text_field(get_the_title($id_s));
                                $icon = sanitize_text_field(get_field('ssp_icon', $id_s));
                                echo '<li class="list-group-item d-flex align-items-center">';
                                echo ($id_s == $id_service) ? '<i class="btn-icon pulse fas fas fa-arrow-right"></i>' : '';
                                printf('<a href="%s"><i class="icon icon-%s"></i></a> <a href="%s">%s</a>', $link, $icon, $link, $title);
                                echo '</li>';
                            }
                            wp_reset_postdata();
                            ?>
                        </ul>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>