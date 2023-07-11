<!-- Pricing -->
<section id="pricing" class="section-2 odd plans" style="border-bottom: 5px solid #19191f;">
    <div class="container">
        <div class="row text-center intro">
            <div class="col-12">
                <span class="pre-title"><?php echo get_field('ps_plans_types', 'option') . ' ' . __('Plans', 'xagora') ?></span>
                <h2><?php echo __('<span class="featured"><span>Pricing</span></span> Table', 'xagora') ?></h2>
                <p class="text-max-800"><?php echo sanitize_textarea_field(get_field('ps_description', 'option')) ?></p>
            </div>
        </div>

        <div class="row justify-content-center text-center items">
            <?php
            $field = get_field('ps_pricing_names', 'option');
            $i = 0;
            ?>
            <?php while (have_rows('pps_pricing_plan', 'option')) : the_row() ?>
                <?php
                $details = get_sub_field('details');
                $features = get_sub_field('pp_features');
                $f_count = count($features);
                ?>
                <div class="col-12 col-md-6 col-lg-4 align-self-center text-center item">
                    <div data-aos="fade-up" class="card">
                        <span class="badge"><?php echo ($details['most_popular']) ?  __('Most<br>Popular', 'xagora') : '';  ?></span>

                        <a href="<?php echo site_url('contact-us') ?>" class="choose-plan">
                            <i class="btn-icon pulse fas fas fa-arrow-right"></i>
                        </a>
                        <i class="icon icon-<?php echo sanitize_text_field($details['icon']) ?>"></i>

                        <h4><?php echo sanitize_text_field($field[$i]['plan_name']) ?></h4>

                        <span class="price">
                            <?php Pricing_seperate($details['plan_price']); ?>
                        </span>

                        <ul class="list-group list-group-flush">

                            <?php while (have_rows('ps_plans_features', 'option')) : the_row() ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center text-left">
                                    <span><?php echo sanitize_text_field(get_sub_field('feature')) ?></span>
                                    <?php
                                    $k = 0;
                                    $icon = false;
                                    while ($k < $f_count) {
                                        if (get_sub_field('feature') == $features[$k]['pps_select_feature']) {
                                            $icon = 'check';
                                        }
                                        $k++;
                                    }
                                    $icon = ($icon) ? $icon : 'times';
                                    echo '<i class="icon-min m-0 fas fa-' . $icon . ' text-right"></i>';
                                    ?>

                                </li>
                            <?php endwhile ?>

                        </ul>
                    </div>
                </div>
                <?php $i++; ?>
            <?php endwhile; ?>

        </div>
    </div>
</section>