<?php

/*
  Plugin Name: Compta Formules
  Version: 1.0
  Author: Zakarya Aghlaoui
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly
require WP_PLUGIN_DIR . '/ComptaFormules/vendor/autoload.php';

class ComptaFormule
{
    public $templateProcessor;
    public $tableName;
    public $charset;
    function __construct()
    {
        global $wpdb;
        $this->templateProcessor = new PhpOffice\PhpWord\TemplateProcessor(plugin_dir_path(__FILE__) . 'src/docx/template.docx');
        $this->charset = $wpdb->get_charset_collate();
        $this->tableName = $wpdb->prefix . 'company_status';


        add_action('activate_ComptaFormules/compta-formules.php', [$this, 'onActivate']);

        add_action('wp_print_styles', [$this, 'remove_all_theme_styles'], 100);
        add_action('wp_enqueue_scripts', [$this, 'loadAssets']);
        add_filter('template_include', [$this, 'loadTemplate'], 99);
        register_activation_hook(__FILE__, [$this, 'custom_folder_plugin_activate']);

        add_action('admin_post_generatedocx', [$this, 'generatedocx']);
        add_action('admin_post_nopriv_generatedocx', [$this, 'generatedocx']);

        add_action('admin_post_nopriv_converttopdf', [$this, 'converttopdf']);
        add_action('admin_post_converttopdf', [$this, 'converttopdf']);

        add_action('init', [$this, 'comptaFormules_init_session']);

        add_action('wp_login_failed', [$this, 'front_end_login_fail']);
        add_action('authenticate', [$this, 'check_username_password'], 1, 3);

        add_action('lostpassword_user_data', [$this, 'forgot_password_validate']);
    }
    function onActivate()
    {
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta("CREATE TABLE $this->tableName (
            id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            fullname VARCHAR(60) NOT NULL DEFAULT '',
            companyname VARCHAR(60) NOT NULL DEFAULT '',
            docxfile VARCHAR(60) NOT NULL DEFAULT '',
            pdffile VARCHAR(60) NOT NULL DEFAULT '0',
            PRIMARY KEY  (id)
        ) $this->charset;");
    }

    function forgot_password_validate($user_data)
    {
        if (!$user_data) {
            wp_safe_redirect(site_url('lost-password') . '?login=failed');
            $_SESSION['loginerr'] = true;
            exit;
        } else {
            $_SESSION['passsent'] = true;
        }
        return $user_data;
    }

    function front_end_login_fail($username)
    {
        // Getting URL of the login page
        $referrer = $_SERVER['HTTP_REFERER'];
        // if there's a valid referrer, and it's not the default log-in screen
        if (!empty($referrer) && !strstr($referrer, 'wp-login') && !strstr($referrer, 'wp-admin')) {
            $_SESSION['loginerr'] = true;
            wp_safe_redirect(site_url('login') . "?login=failed");
            exit;
        }
    }


    function check_username_password($login, $username, $password)
    {
        // Getting URL of the login page
        $referrer = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : null;

        // if there's a valid referrer, and it's not the default log-in screen
        if (!empty($referrer) && !strstr($referrer, 'wp-login') && !strstr($referrer, 'wp-admin')) {
            if ($username == "" || $password == "") {
                $_SESSION['loginerr'] = true;
                wp_safe_redirect(site_url('login') . "?login=empty");
                exit;
            }
        }

        if (!empty($referrer) && !strstr($referrer, 'lostpassword') && !strstr($referrer, 'wp-admin')) {
            if ($username == "") {
                $_SESSION['loginerr'] = true;
                wp_safe_redirect(site_url('login') . "?login=empty");
                exit;
            }
        }
    }
    function comptaFormules_init_session()
    {
        if (!session_id()) {
            session_start();
        }
    }

    function converttopdf()
    {
        if (current_user_can('administrator')) {
            global $wpdb;
            $statusID = sanitize_text_field($_POST['idstatuts']);
            $query = $wpdb->prepare("SELECT * FROM $this->tableName WHERE id = $statusID");
            $status = $wpdb->get_results($query)[0];

            /**
             * Generate PDF File
             */
            if ($status->pdffile === '0') {
                $statusDOCX = wp_upload_dir()['basedir'] . '/status/' .  $status->docxfile . '.docx';

                $fileName = $this->generateFileName($status->companyname);
                $filePath = wp_upload_dir()['basedir'] . '/status/' . $fileName . '.pdf';

                $FileHandle = fopen($filePath, 'w+');

                $curl = curl_init();

                $instructions = '{
                "parts":[
                            {
                                "file": "document"
                            }
                        ]
                }';

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.pspdfkit.com/build',
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_POSTFIELDS => array(
                        'instructions' => $instructions,
                        'document' => new CURLFILE($statusDOCX)
                    ),
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: Bearer pdf_live_7hNqDrCVlrkn4mX4qe6X76aEe8avc43fvHRClTemaxG'
                    ),
                    CURLOPT_FILE => $FileHandle,
                ));

                $response = curl_exec($curl);

                curl_close($curl);

                fclose($FileHandle);
                if (file_exists($filePath)) {
                    $wpdb->update($this->tableName, ['pdffile' => $fileName], ['id' => $statusID]);

                    $_SESSION['pdfconverted'] = true;
                    wp_safe_redirect(site_url('list-status?status=success'));
                } else {
                    wp_safe_redirect(site_url('list-status?status=fail'));
                }
            }
        } else {
            wp_safe_redirect(site_url());
        }
        exit;
    }

    function generatedocx()
    {
        if (current_user_can('administrator')) {
            $genre = ($_POST['genre'] ?? '') == 1 ? 'Monsieur' : 'Madame';
            $fullname = sanitize_text_field($_POST['fullname'] ?? '');


            setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR@euro', 'fr_FR.utf8', 'fr-FR', 'fra');
            date_default_timezone_set('Europe/Paris');
            $birthdayInit = $_POST['birthdayclient'] ?? '';
            $birthday = strftime('%d %B %Y', strtotime($birthdayInit));

            $birthplace = sanitize_text_field($_POST['birthplace'] ?? '');
            $cin = sanitize_text_field($_POST['cin'] ?? '');
            $companyName = sanitize_text_field($_POST['companyname'] ?? '');
            $companyType = sanitize_text_field($_POST['companytype'] ?? '');
            $capital = ($_POST['capital']) ? number_format($_POST['capital'], 2, ',', '.') : '';
            $addresssieage = sanitize_text_field($_POST['addresssieage'] ?? '');
            $addressclient = sanitize_text_field($_POST['addressclient'] ?? '');

            /**
             * Generate Docx File
             */
            $this->templateProcessor->setValues(
                array(
                    'genre'         => $genre,
                    'fullname'      => $fullname,
                    'birthday'      => $birthday,
                    'birthplace'    => $birthplace,
                    'cin'           => $cin,
                    'companytype'   => $companyType,
                    'addresssieage' => $addresssieage,
                    'companyname'   => $companyName,
                    'capital'       => $capital,
                    'addressclient' => $addressclient
                )
            );

            $fileName = $this->generateFileName($companyName);
            $filePath = '/status/' . $fileName . '.docx';

            $pathToSave = wp_upload_dir()['basedir'] .  $filePath;

            $this->templateProcessor->saveAs($pathToSave);

            if (file_exists($pathToSave)) {
                /**
                 * Insert data to DB
                 */
                global $wpdb;
                $wpdb->insert($this->tableName, array(
                    'fullname'      => $fullname,
                    'companyname'   => $companyName,
                    'docxfile'      => $fileName,
                    'pdffile'       => 0
                ));

                wp_safe_redirect(site_url('status-creator?status=success'));

                $_SESSION['DocxLocation'] = esc_url(wp_upload_dir()['baseurl'] . $filePath);
            } else {
                wp_safe_redirect(site_url('status-creator?status=fail'));
            }
        } else {
            wp_safe_redirect(esc_url(site_url()));
        }
        exit;
    }

    function generateFileName($name)
    {
        $theName = (!empty($name)) ? $name : 'Default';
        $time = date('m-d-Y_his');

        $fileName = $theName . '_' . $time;

        return $fileName;
    }

    function custom_folder_plugin_activate()
    {
        $upload_dir = wp_upload_dir();
        $folder_name = 'status'; // Change this to your desired folder name.
        $new_folder_path = $upload_dir['basedir'] . '/' . $folder_name;

        if (!file_exists($new_folder_path)) {
            wp_mkdir_p($new_folder_path);
        }
    }

    function remove_all_theme_styles()
    {
        global $wp_styles;
        $styles_to_keep = array('bootstrap', 'compta-style');
        if (is_page('status-creator') || is_page('list-status')) {
            foreach ($wp_styles->queue as $style_handle) {
                if (!in_array($style_handle, $styles_to_keep)) {
                    wp_dequeue_style($style_handle);
                    wp_deregister_style($style_handle);
                }
            }
        }
    }

    function loadTemplate($template)
    {
        if (is_page('status-creator')) {
            return plugin_dir_path(__FILE__) . 'inc/template-status.php';
        } elseif (is_page('list-status')) {
            return plugin_dir_path(__FILE__) . 'inc/template-list-status.php';
        } elseif (is_page('login')) {
            return plugin_dir_path(__FILE__) . 'inc/template-login.php';
        } elseif (is_page('lost-password')) {
            return plugin_dir_path(__FILE__) . 'inc/template-forget-pwd.php';
        }
        return $template;
    }

    function loadAssets()
    {
        if (is_page('status-creator') || is_page('list-status')) {
            wp_enqueue_style('compta-style', plugin_dir_url(__FILE__) . 'src/compta-style.css');
            wp_enqueue_style('bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');
        } elseif (is_page('login') || is_page('lost-password')) {
            wp_enqueue_style('bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css');
            wp_enqueue_style('login-style', plugin_dir_url(__FILE__) . 'src/iofrm-style.css');
            wp_enqueue_style('login-style-2', plugin_dir_url(__FILE__) . 'src/iofrm-theme1.css');
        }
    }
}

$comptaFormule = new ComptaFormule();
