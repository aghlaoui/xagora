<?php $id = get_the_ID() ?>
<!-- About 2 -->
<?php if (get_field('sssp_title', $id) && get_field('sssp_description', $id)) : ?>
    <section id="about-2" class="section-3 odd highlights team image-right">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-<?php echo (!empty(get_field('sssp_speech_box', $id)['title']) && !empty(get_field('sssp_speech_box', $id)['speech'])  && !empty(get_field('sssp_speech_box', $id)['speech_owner'])) ? '8' : '12' ?> align-self-top text">
                    <div class="row intro m-0">
                        <div class="col-12 p-0">
                            <span class="pre-title m-0"><?php echo sanitize_text_field(get_field('sssp_subtitle', $id)) ?></span>
                            <h2><?php replaceWithSpanTags(get_field('sssp_title', $id)) ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 p-0 pr-md-5">
                            <p><?php echo sanitize_textarea_field(get_field('sssp_description', $id)) ?></p>
                        </div>
                    </div>

                    <!-- Action -->
                    <div data-aos="fade-up" class="buttons">
                        <div class="d-sm-inline-flex mt-4">
                            <a href="#contact" class="smooth-anchor mt-4 btn primary-button"><?php echo __('GET IN TOUCH', 'xagora') ?></a>
                        </div>
                    </div>
                </div>
                <?php if (!empty(get_field('sssp_speech_box', $id)['title']) && !empty(get_field('sssp_speech_box', $id)['speech'])  && !empty(get_field('sssp_speech_box', $id)['speech_owner'])) : ?>
                    <div data-aos="zoom-in" class="col-12 col-lg-4 align-self-end">
                        <div class="quote">
                            <?php while (have_rows('sssp_speech_box', $id)) : the_row() ?>
                                <div class="quote-content">
                                    <h4><?php echo sanitize_text_field(get_sub_field('title')) ?></h4>
                                    <p><?php echo strip_tags(get_sub_field('speech'), '<br>') ?></p>
                                    <h5><?php echo sanitize_text_field(get_sub_field('speech_owner')) ?></h5>
                                </div>
                                <i class="quote-right fas fa-quote-right"></i>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>