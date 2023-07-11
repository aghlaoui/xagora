<?php
$page = get_page_by_path('partners');
$id = $page->ID;
?>
<!-- Partners -->
<section id="partners" class="section-<?php echo (is_page('partners')) ? '1' : '4' ?> offers testimonials">
    <div class="container">
        <div class="row text-center intro">
            <div class="col-12">
                <span class="pre-title"><?php echo sanitize_text_field(get_field('pp_subtitle', $id)) ?></span>
                <h2><?php replaceWithSpanTags(get_field('pp_title', $id)) ?></h2>
                <p class="text-max-800"><?php echo sanitize_text_field(get_field('pp_description', $id)) ?></p>
            </div>
        </div>
        <div class="row justify-content-center items">
            <?php while (have_rows('pp_partner', 208)) : the_row() ?>
                <div data-aos="fade-up" class="col-12 col-md-6 item">
                    <div class="card">
                        <div class="col-12">
                            <img src="<?php echo esc_url(get_sub_field('logo')['url']) ?>" alt="Logo" class="logo">
                            <p><?php echo sanitize_text_field(get_sub_field('description')) ?></p>

                            <!-- Action -->
                            <?php if (get_sub_field('button')) : ?>
                                <div class="buttons">
                                    <div class="d-sm-inline-flex">
                                        <?php
                                        $linkGroup = get_sub_field('link');
                                        $link = ($linkGroup['project_using']) ? get_the_permalink($linkGroup['project_link_select']) : $linkGroup['button_link'];
                                        ?>
                                        <a href="<?php echo esc_url($link) ?>" class="mt-3 btn outline-button" target="_blank">
                                            <?php echo sanitize_text_field(get_sub_field('button_text')) ?>
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>