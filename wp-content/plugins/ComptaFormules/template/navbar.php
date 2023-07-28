<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php esc_url(site_url('word')) ?>">Générateur DOCX</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Basculer la navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php echo (is_page('status-creator')) ? 'active' : '' ?>" href="<?php echo esc_url(site_url('status-creator')) ?>">
                        Créateur de Statut
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo (is_page('list-status')) ? 'active' : '' ?>" href="<?php echo esc_url(site_url('list-status')) ?>">
                        List Des Status
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo esc_url(wp_logout_url(site_url('login'))) ?>">
                        LogOut
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>