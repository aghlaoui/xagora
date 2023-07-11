<!-- Subscribe -->
<section id="subscribe" class="section-<?php echo (is_single() && get_post_type() == 'project') ? '3' : '6' ?> odd subscribe">
    <div class="container smaller">
        <div class="row">
            <div class="col-12 col-md-6 m-md-0 intro">
                <span class="pre-title m-0">Newsletter</span>
                <h2><span class="featured"><span>Know</span></span> First</h2>
                <p>Follow closely and receive content about our company and the news of the current market.</p>
            </div>
            <div class="col-12 col-md-6">
                <form method="post" action="<?php echo esc_url(site_url('/')) . '?na=s' ?>" class="row m-auto items">
                    <input type="hidden" name="nlang" value="">
                    <div class="col-12 mt-0 input-group align-self-center item">
                        <input type="text" name="nn" class="<?php echo (is_single() && get_post_type() == 'project') ? 'less-opacity ' : '' ?>form-control field-name" placeholder="<?php echo __('Name', 'xagora') ?>">
                    </div>
                    <div class="col-12 input-group align-self-center item">
                        <input type="email" name="ne" class="<?php echo (is_single() && get_post_type() == 'project') ? 'less-opacity ' : '' ?>form-control field-email" placeholder="<?php echo __('Email', 'xagora') ?>">
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