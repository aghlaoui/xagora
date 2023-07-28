<?php
require_once WP_PLUGIN_DIR . '/ComptaFormules/inc/convert-docx.php';

$notices = new ConvertToDocx();

/**
 * Header Section
 */
include_once WP_PLUGIN_DIR . '/ComptaFormules/template/login-header.php';

?>

<div class="row">
    <div class="img-holder">
        <div class="bg"></div>
        <div class="info-holder">

        </div>
    </div>
    <div class="form-holder">
        <div class="form-content">
            <div class="form-items">
                <h3>Faites plus de choses en vous connectant à la plateforme.</h3>

                <form class="mt-5" name="loginform" id="loginform" action="<?php echo site_url('/wp-login.php'); ?>" method="POST">

                    <?php echo $notices->loginNotice ?>

                    <input class="form-control" type="text" name="log" placeholder="Username" required>
                    <input class="form-control" type="password" name="pwd" placeholder="Password" required>
                    <div class="form-button">
                        <!-- <input type="sumnit" name="wp-submit" id="wp-submit" class="ibtn"> -->
                        <button id="wp-submit" type="submit" name="wp-submit" class="ibtn">Login</button>
                        <input type="hidden" value="1" name="testcookie">
                        <input type="hidden" value="<?php echo esc_attr(site_url('list-status')); ?>" name="redirect_to">
                        <a href="<?php echo esc_url(site_url('lost-password')) ?>">Forget password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once WP_PLUGIN_DIR . '/ComptaFormules/template/login-footer.php' ?>