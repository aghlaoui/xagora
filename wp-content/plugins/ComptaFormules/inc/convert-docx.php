<?php

class ConvertToDocx
{
    public $notice;

    function __construct()
    {
        $this->notice = $this->noticeAlert();
    }

    function noticeAlert()
    {
        $noticeCode = (isset($_GET['status'])) ? $_GET['status'] : NULL;
        $downloadLink = (isset($_SESSION['DocxLocation'])) ? esc_url($_SESSION['DocxLocation']) : NULL;
        unset($_SESSION['DocxLocation']);

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
            } else {
                $alert = '<div class="row col-md-10 alert-center"><div class="alert alert-danger" role="alert"> le processus de conversion a échoué. réessayez.</div></div>';
            }
        }

        return $alert;
    }
}
