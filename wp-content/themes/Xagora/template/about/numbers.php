<?php $id = get_the_ID() ?>
<!-- About 2 -->
<section id="about-2" class="section-2 odd highlights image-right counter funfacts featured">
    <div class="container">
        <div class="row">
            <?php if (have_rows('aun_numbers', $id) && get_field('aun_content', $id) && get_field('aun_title', $id)) : ?>
                <div class="col-12 col-md-6 pr-md-5 align-self-top text">
                    <div data-aos="fade-up" class="row intro m-0 m-md-auto">
                        <div class="col-12 p-0">
                            <span class="pre-title m-0"><?php echo sanitize_text_field(get_field('aun_subtitle', $id)) ?></span>
                            <h2><?php replaceWithSpanTags(get_field('aun_title', $id)) ?></h2>
                            <?php echo strip_tags(get_field('aun_content', $id), '<br>') ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 pr-md-5 align-self-top text">
                    <?php $i = 0; ?>
                    <?php while (have_rows('aun_numbers', $id)) : the_row() ?>
                        <?php echo ($i % 2 == 0) ? '<div class="row items">' : '' ?>
                        <div data-aos="fade-up" class="col-12 col-md-6 p-0 pr-md-4 mb-2 item">
                            <div data-percent="<?php echo get_sub_field('number') ?>" class="radial left">
                                <span></span>
                            </div>
                            <h4><?php echo sanitize_text_field(get_sub_field('title')) ?></h4>
                            <p><?php echo sanitize_text_field(get_sub_field('description')) ?></p>
                        </div>
                        <?php echo ($i % 2 !== 0) ? '</div>' : '' ?>
                        <?php $i++; ?>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <div class="col-12 col-md-8 no-about-content">
                    <span><?php echo __('No Content Available', 'xagora') ?></span>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>