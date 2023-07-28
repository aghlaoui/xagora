<?php
if (!is_user_logged_in() || !current_user_can('manage_options')) {
    wp_redirect(home_url());
    exit;
}

require_once plugin_dir_path(__FILE__) . 'convert-docx.php';

$convertToDocx = new ConvertToDocx();
?>

<head>
    <?php wp_head(); ?>
</head>

<body>
    <!-- NavBar -->
    <?php include_once WP_PLUGIN_DIR . '/ComptaFormules/template/navbar.php' ?>

    <div class="container mt-3">

        <?php
        /**
         * Notices Section
         */
        echo $convertToDocx->notice;
        ?>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="<?php echo esc_url(admin_url('admin-post.php')) ?>" method="POST">
                    <div class="row">
                        <!-- Title -->
                        <h1 class="display-6">Details Personnelle:</h1>
                        <div class="mb-3 col-2 form-group">
                            <label for="genre">Genre</label>
                            <select name="genre" class="form-select" id="genre" aria-label="Sélection par défaut">
                                <option selected>Genre</option>
                                <option value="1">Monsieur</option>
                                <option value="2">Madame</option>
                            </select>
                        </div>
                        <div class="mb-3 col-3 form-group">
                            <label for="fullname">Nom complet</label>
                            <input class="form-control" type="text" name="fullname" id="fullname" placeholder="Nom complet">
                        </div>
                        <div class="mb-3 col-5 form-group">
                            <label for="birthdayclient">Date de naissance du client</label>
                            <input class="form-control" type="date" name="birthdayclient" id="birthdayclient" placeholder="Date de naissance du client">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-5 form-group">
                            <label for="birthplaceclient">Lieu de naissance du client</label>
                            <input class="form-control" type="text" name="birthplaceclient" id="birthplaceclient" placeholder="Lieu de naissance du client">
                        </div>
                        <div class="mb-3 col-5 form-group">
                            <label for="cin">CIN</label>
                            <input class="form-control" type="text" name="cin" id="cin" placeholder="CIN">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-10 form-group">
                            <label for="addressclient">Adresse du client</label>
                            <input class="form-control" type="text" name="addressclient" id="addressclient" placeholder="Adresse du client">
                        </div>
                    </div>
                    <!-- Title -->
                    <h1 class="display-6 mt-4">Details D'entreprise:</h1>
                    <div class="row">
                        <div class="mb-3 col-5 form-group">
                            <label for="companyname">Nom de l'entreprise</label>
                            <input class="form-control" type="text" name="companyname" id="companyname" placeholder="Nom de l'entreprise">
                        </div>
                        <div class="mb-3 col-5 form-group">
                            <label for="companytype">Type d'entreprise</label>
                            <input class="form-control" type="text" name="companytype" id="companytype" placeholder="Type d'entreprise">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-5 form-group">
                            <label for="capital">Capital</label>
                            <input class="form-control" type="number" name="capital" id="capital" placeholder="Capital">
                        </div>
                        <div class="mb-3 col-5 form-group ">
                            <label for="addresssieage">Siège social</label>
                            <input class="form-control" type="text" name="addresssieage" id="addresssieage" placeholder="Siège social">
                        </div>
                    </div>

                    <div class="mb-3 form-group">
                        <input type="hidden" name="action" value="generatedocx">
                        <button class="btn btn-primary mb-3">Sumbit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>