<?php $id = get_the_ID()  ?>

<!-- About -->
<section id="about" class="section-1 highlights team image-right">
    <div class="container">
        <div class="row">
            <?php if (get_field('aua_title', $id) && get_field('aua_content', $id)) : ?>
                <div class="col-12 col-lg-<?php echo (have_rows('aua_features', $id)) ? '8' : '12' ?> align-self-top text">
                    <div class="row intro m-0">
                        <div class="col-12 p-0">
                            <span class="pre-title m-0"><?php echo get_field('aua_subtitle', $id) ?></span>
                            <h2><?php replaceWithSpanTags(get_field('aua_title', $id)) ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 p-0 pr-md-5">
                            <?php
                            $content = get_field('aua_content', $id);
                            $allowed_tags = '<a><p><b><blockquote><u><ul><li><h1><h2><h3><h4><h5><h6><strong><figure><img>';

                            echo strip_tags($content, $allowed_tags);
                            ?>
                        </div>
                    </div>
                </div>
                <?php if (have_rows('aua_features', $id)) : ?>
                    <div data-aos="zoom-in" class="col-12 col-lg-4">
                        <div class="quote mt-5 mt-lg-0">
                            <ul class="list-group list-group-flush">
                                <?php while (have_rows('aua_features', $id)) : the_row() ?>
                                    <li class="list-group-item d-flex justify-content-center align-items-center">
                                        <a href="javascript:void(0)"><i class="icon icon-<?php echo sanitize_text_field(get_sub_field('icon')) ?>"></i></a>
                                        <div class="list-group-content">
                                            <h4><?php echo sanitize_text_field(get_sub_field('title')) ?></h4>
                                            <p><?php echo sanitize_text_field(get_sub_field('description')) ?></p>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            <?php else : ?>
                <div class="col-12 col-lg-8 no-about-content">
                    <span><?php echo __('No About Content Available', 'xagora') ?></span>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>