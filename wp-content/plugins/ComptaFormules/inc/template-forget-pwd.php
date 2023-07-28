<?php
require_once WP_PLUGIN_DIR . '/ComptaFormules/inc/convert-docx.php';

$notices = new ConvertToDocx();

include_once WP_PLUGIN_DIR . '/ComptaFormules/template/login-header.php' ?>

<div class="row">
    <div class="img-holder">
        <div class="bg"></div>
        <div class="info-holder">

        </div>
    </div>
    <div class="form-holder">
        <div class="form-content">
            <?php if (isset($_GET['login']) && $_GET['login'] == 'sent' && isset($_SESSION['passsent'])) : ?>

                <div class="form-sent show-it">
                    <div class="tick-holder">
                        <div class="tick-icon"></div>
                    </div>
                    <h3>Lien de mot de passe envoyé</h3>
                    <p>Veuillez vérifier votre boîte de réception</p>
                    <div class="info-holder">
                        <span>Pas sûr que l'adresse e-mail soit correcte ?</span> <a href="<?php echo esc_url(site_url('contact')) ?>">Nous pouvons vous aider</a>.
                        <a class="fgt-pass-connect" href="<?php echo esc_url(site_url('login')) ?>">Connecter</a>
                    </div>
                </div>
                <?php unset($_SESSION['passsent']) ?>

            <?php else : ?>

                <div class="form-items">
                    <h3>Réinitialisation du mot de passe</h3>
                    <p>Pour réinitialiser votre mot de passe, entrez l'adresse électronique ou le nom d'utilisateur que vous utilisez pour vous connecter.</p>
                    <form name="lostpasswordform" method="POST" action="<?php echo site_url('/wp-login.php?action=lostpassword'); ?>">
                        <?php echo $notices->loginNotice ?>
                        <input class="form-control" type="text" name="user_login" placeholder="E-mail Address Or Username" required>
                        <div class="form-button full-width">
                            <input type="hidden" name="redirect_to" value="<?php echo esc_url(site_url('lost-password?login=sent')) ?>">
                            <button id="wp-submit" type="submit" class="ibtn btn-forget" name="wp-submit">Send Reset Link</button>
                        </div>
                    </form>
                </div>

            <?php endif; ?>
        </div>
    </div>
</div>

<?php include_once WP_PLUGIN_DIR . '/ComptaFormules/template/login-footer.php' ?>