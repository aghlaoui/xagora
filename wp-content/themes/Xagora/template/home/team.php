<?php if (get_field('hp_team_activate_section', get_the_ID())) : ?>
    <!-- Team -->
    <section id="team" class="section-4 highlights team image-right">
        <div class="container">
            <div class="row">
                <div class="col-12 <?php echo (!empty(get_field('tps_speech', 'option'))) ? 'col-lg-8' : '' ?> align-self-top text-center text-md-left text">
                    <div class="row intro">
                        <div class="col-12 p-0">
                            <span class="pre-title m-auto m-md-0"><?php echo __('We like what we do', 'xagora') ?></span>
                            <h2><?php echo __('<span class="featured"><span>Team</span></span> of Experts', 'xagora') ?></h2>
                        </div>
                    </div>
                    <div class="row items text-left">
                        <?php $i = 0; ?>
                        <?php while (have_rows('tp_person', 'option')) : the_row() ?>
                            <?php echo ($i % 2 == 0) ? '<div class="col-12 col-md-6 p-0">' : ''; ?>
                            <div class="row item">
                                <div class="col-4 p-0 pr-3 align-self-center">
                                    <?php
                                    $image_id = get_sub_field('image');
                                    if ($image_id) {
                                        $image = fly_get_attachment_image_src($image_id, 'teamMemberHome')['src'];
                                        $image990 = fly_get_attachment_image_src($image_id, 'teamMember990')['src'];
                                        $image765 = fly_get_attachment_image_src($image_id, 'teamMember765')['src'];
                                        $alt_text = sanitize_text_field(get_post_meta($image_id, '_wp_attachment_image_alt', true));

                                        printf(
                                            '<img src="%s"
                                                srcset="%s 109w,%s 138w, %s 217w" 
                                                sizes="(min-width: 990px) 138px, (min-width: 765px) 217px, 100vw" 
                                                alt="%s" class="person">',
                                            $image,
                                            $image,
                                            $image990,
                                            $image765,
                                            $alt_text
                                        );
                                    } else {
                                        global $default_img;
                                        printf('<img src="%s" alt="Default-image" class="person">', $default_img);
                                    }
                                    ?>

                                </div>
                                <div class="col-8 align-self-center text-left">
                                    <h4><?php echo sanitize_text_field(get_sub_field('name')) ?></h4>
                                    <p><?php echo sanitize_text_field(get_sub_field('role')) ?></p>
                                    <ul class="navbar-nav social share-list ml-auto">
                                        <?php
                                        while (have_rows('staff_social_media')) {
                                            the_row();
                                            $link = esc_url(get_sub_field('link'));
                                            $icon = sanitize_text_field(get_sub_field('platform'));

                                            printf('<li class="nav-item"><a href="%s" class="nav-link"><i class="fab %s"></i></a></li>', $link, $icon);
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <?php echo ($i % 2 != 0) ? '</div>' : ''; ?>
                            <?php $i++; ?>
                        <?php endwhile; ?>

                    </div>
                </div>
                <?php if (!empty(get_field('tps_speech', 'option'))) :  ?>
                    <div data-aos="zoom-in" class="col-12 col-lg-4 align-self-end">
                        <div class="quote">
                            <div class="quote-content">
                                <?php
                                $title = sanitize_text_field(get_field('tps_title', 'option'));
                                $content = strip_tags(get_field('tps_speech', 'option'), '<p>');
                                $speaker = sanitize_text_field(get_field('tps_speaker', 'option'));

                                printf('<h4>%s</h4>%s<h5>%s</h5>', $title, $content, $speaker);
                                ?>
                            </div>
                            <i class="quote-right fas fa-quote-right"></i>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>