<!-- Contact -->
<?php
if (is_page('contact-us')) {
    $section = '1';
}
?>
<section id="contact" class="section-<?php echo (is_archive()) ? '3' : '4' ?> form contact">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 pr-md-5 align-self-center text">
                <div class="row intro">
                    <div class="col-12 p-0">
                        <span class="pre-title m-0"><?php echo __('Send a message', 'xagora') ?></span>
                        <h2><?php echo __('Get in <span class="featured"><span>Touch</span></span>', 'xagora') ?></h2>
                        <p><?php echo __('We will respond to your message as soon as possible.', 'xagora') ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 p-0">
                        <?php echo do_shortcode('[contact-form-7 id="449" title="Contact-us"]') ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="contacts">
                    <h4><?php echo __('Contact Us', 'xagora') ?></h4>
                    <p><?php echo __('Contact us for any inquiries or to schedule an appointment.', 'xagora') ?></p>
                    <p><?php echo __('We would love to hear from you!', 'xagora') ?></p>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="tel:<?php echo sanitize_text_field(get_theme_mod('phone_number')) ?>" class="nav-link">
                                <i class="fas fa-phone-alt mr-2"></i>
                                <?php echo sanitize_text_field(get_theme_mod('phone_number')) ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="mailto:<?php echo sanitize_text_field(get_theme_mod('email_adress')) ?>" class="nav-link">
                                <i class="fas fa-envelope mr-2"></i>
                                <?php echo sanitize_text_field(get_theme_mod('email_adress')) ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link" data-toggle="modal" data-target="#map">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                <?php echo sanitize_text_field(get_theme_mod('office_adress')) ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="mt-2 btn outline-button" data-toggle="modal" data-target="#map"><?php echo __('VIEW MAP', 'xagora') ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>