<?php

class ConvertToDocx
{
    public $notice;
    public $loginNotice;
    function __construct()
    {
        if (is_page('status-creator') || is_page('list-status')) {
            $this->notice = $this->noticeAlert();
        }

        if (is_page('login') || is_page('lost-password')) {
            $this->loginNotice = $this->loginNotice();
        }
    }

    function loginNotice()
    {
        $error = isset($_GET['login']) ? sanitize_text_field($_GET['login']) : null;

        $alert = '';
        if ($error && isset($_SESSION['loginerr'])) {
            $alert .= '<div class="alert alert-dark"><p>';
            if ($error == 'failed') {
                if (is_page('login')) $alert .= "Le nom d'utilisateur ou le mot de passe est incorrect";
                if (is_page('lost-password')) $alert .= "Il n'y a pas de compte avec ce nom d'utilisateur ou cette adresse électronique.";
            } elseif ($error == 'empty') {
                $alert .= "le nom d'utilisateur ou le mot de passe est vide";
            }
            $alert .= '</p></div>';

            unset($_SESSION['loginerr']);
        }

        return $alert;
    }

    function noticeAlert()
    {
        $noticeCode = (isset($_GET['status'])) ? $_GET['status'] : NULL;
        $downloadLink = (isset($_SESSION['DocxLocation'])) ? esc_url($_SESSION['DocxLocation']) : NULL;
        unset($_SESSION['DocxLocation']);

        $pdfAvailability = (isset($_SESSION['pdfconverted'])) ? $_SESSION['pdfconverted'] : NULL;
        unset($_SESSION['pdfconverted']);
        $alert = '';
        if ($noticeCode && $downloadLink) {
            if ($noticeCode == 'success') {
                $alert = sprintf(
                    '<div class="row col-md-10 alert-center">
                        <div class="alert alert-success" role="alert"> 
                            Fichier généré avec succès. Télécharger depuis <a target="_blank" href="%s" class="alert-link">ici</a>. 
                        </div> 
                    </div>',
                    $downloadLink
                );
            } elseif ($noticeCode == 'fail') {
                $alert = '<div class="row col-md-10 alert-center"><div class="alert alert-danger" role="alert"> le processus de conversion a échoué. réessayez.</div></div>';
            }
        } elseif ($noticeCode && $pdfAvailability) {
            if ($noticeCode == 'success') {
                $alert = '<div class="row col-md-13 alert-center"> <div class="alert alert-success" role="alert"> Fichier généré avec succès. </div> </div>';
            } else {
                $alert = "<div class='row col-md-13 alert-center'> <div class='alert alert-danger' role='alert'> le fichier n'a pas été généré. </div> </div>";
            }
        }

        return $alert;
    }

    function generatePDFLink($name)
    {
        $name = sanitize_text_field($name);
        $downloadLink = esc_url(wp_upload_dir()['baseurl'] . '/status/' . $name . '.pdf');

        return $downloadLink;
    }

    function generateDOCXLink($name)
    {
        $name = sanitize_text_field($name);
        $downloadLink = esc_url(wp_upload_dir()['baseurl'] . '/status/' . $name . '.docx');

        return $downloadLink;
    }
}
