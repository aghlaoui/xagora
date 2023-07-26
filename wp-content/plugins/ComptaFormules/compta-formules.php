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
        add_action('init', [$this, 'comptaFormules_init_session']);
    }
    function onActivate()
    {
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta("CREATE TABLE $this->tableName (
            id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            fullname VARCHAR(60) NOT NULL DEFAULT '',
            companyname VARCHAR(60) NOT NULL DEFAULT '',
            docxfile VARCHAR(60) NOT NULL DEFAULT '',
            pdffile VARCHAR(60) NOT NULL DEFAULT '',
            PRIMARY KEY  (id)
        ) $this->charset;");
    }

    function comptaFormules_init_session()
    {
        if (!session_id()) {
            session_start();
        }
    }

    function generatedocx()
    {
        if (current_user_can('administrator')) {
            $genre = ($_POST['genre'] ?? '') == 1 ? 'Monsieur' : 'Madame';
            $fullname = sanitize_text_field($_POST['fullname'] ?? '');

            $birthdayInit = $_POST['birthday'] ?? '';
            setlocale(LC_TIME, 'fr', 'fr_FR', 'fr_FR@euro', 'fr_FR.utf8', 'fr-FR', 'fra');
            date_default_timezone_set('Europe/Paris');
            $birthday = strftime('%d %B %Y', strtotime(sanitize_text_field($birthdayInit)));
            $formatter = new IntlDateFormatter('en_US', IntlDateFormatter::LONG, IntlDateFormatter::NONE);

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
            $filePath = '/src/saved-doc/' . $fileName . '.docx';

            $pathToSave = plugin_dir_path(__FILE__) .  $filePath;

            $this->templateProcessor->saveAs($pathToSave);

            if (file_exists($pathToSave)) {
                /**
                 * Insert data to DB
                 */
                global $wpdb;
                $wpdb->insert($this->tableName, array(
                    'fullname'      => $fullname,
                    'companyname'   => $companyName,
                    'docxfile'      => $fileName
                ));

                wp_redirect(site_url('status-creator?status=success'));

                $_SESSION['DocxLocation'] = plugins_url($filePath, __FILE__);
            } else {
                wp_redirect(site_url('status-creator?status=fail'));
            }
        } else {
            wp_redirect(esc_url(site_url()));
        }
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
        $folder_name = 'docx'; // Change this to your desired folder name.
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
        }
        return $template;
    }

    function loadAssets()
    {
        if (is_page('status-creator') || is_page('list-status')) {
            wp_enqueue_style('compta-style', plugin_dir_url(__FILE__) . 'src/compta-style.css');
            wp_enqueue_style('bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');
        }
    }
}

$comptaFormule = new ComptaFormule();
