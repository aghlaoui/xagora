<!-- Subscribe -->
<?php if (!is_page('about-us') && !is_page('pricing') && !is_front_page() && get_post_type() != 'project' && (get_post_type() != 'service' && !is_archive())) : ?>
    <section id="subscribe" class="section-3 odd subscribe">
        <div class="container smaller">
            <div class="row">
                <div class="col-12 col-md-6 m-md-0 intro">
                    <span class="pre-title m-0"><?php echo __('Newsletter', 'xagora') ?></span>
                    <h2><?php echo __('<span class="featured"><span>Know</span></span> First', 'xagora') ?></h2>
                    <p><?php echo __('Follow closely and receive content about our company and the news of the current market.', 'xagora') ?></p>
                </div>
                <div class="col-12 col-md-6">
                    <form method="post" action="<?php echo esc_url(site_url('/')) . '?na=s' ?>" class="row m-auto items">
                        <input type="hidden" name="nlang" value="">
                        <div class="col-12 mt-0 input-group align-self-center item">
                            <input type="text" name="nn" id="tnp-1" class="form-control less-opacity field-name" placeholder="<?php echo __('Name', 'xagora') ?>">
                        </div>
                        <div class="col-12 input-group align-self-center item">
                            <input type="email" name="ne" id="tnp-2" class="form-control less-opacity field-email" placeholder="<?php echo __('Email', 'xagora') ?>" required>
                        </div>
                        <div class="col-12 input-group align-self-center item">
                            <input class="tnp-submit btn primary-button news-letter-button" type="submit" value="<?php echo __('SUBSCRIBE', 'xagora') ?>">
                        </div>
                        <div class="col-12 item">
                            <span class="form-alert mt-3 mb-0"></span>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
<?php endif; ?>