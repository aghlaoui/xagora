<?php

use Svg\Tag\AbstractTag;

if (!is_user_logged_in()) {
    wp_safe_redirect(esc_url(site_url('login')));
    exit;
} elseif (!current_user_can('manage_options')) {
    wp_safe_redirect(esc_url(home_url()));
    exit;
}

include_once WP_PLUGIN_DIR . '/ComptaFormules/template/navbar.php';
require_once plugin_dir_path(__FILE__) . 'convert-docx.php';
$convertToDocx = new ConvertToDocx();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>

<body>
    <?php
    global $wpdb;
    $tableName = $wpdb->prefix . 'company_status';
    $query = $wpdb->prepare("SELECT * FROM $tableName");
    $status = $wpdb->get_results($query);
    ?>

    <div class="container mt-5">
        <?php echo $convertToDocx->notice; ?>
        <h1 class="display-6 mb-5 text-center">Liste Des Status:</h1>
        <table class="table table-striped docs-table">
            <thead>
                <tr>
                    <th scope="col">Nom complet</th>
                    <th scope="col">Entreprise</th>
                    <th scope="col">DOCX</th>
                    <th scope="col">PDF</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($status as $statu) : ?>
                    <tr>
                        <td><?php echo $statu->fullname ?></td>
                        <td><?php echo $statu->companyname ?></td>
                        <td>

                            <?php
                            $downloadDocx = esc_url($convertToDocx->generateDOCXLink($statu->docxfile));
                            echo '<a target="_blank" class="btn btn-primary btn-sm" href="' . $downloadDocx . '">Download DOCX</a>';
                            ?>

                        </td>
                        <td>
                            <?php if ($statu->pdffile === '0') :  ?>

                                <form action="<?php echo esc_url(admin_url('admin-post.php')) ?>" method="POST">
                                    <input type="hidden" name="action" value="converttopdf">
                                    <input type="hidden" name="idstatuts" value="<?php echo $statu->id ?>">
                                    <button class="btn btn-warning btn-sm">Convert PDF</button>
                                </form>

                            <?php else : ?>

                                <?php
                                $downloadPDF = esc_url($convertToDocx->generatePDFLink($statu->pdffile));
                                echo '<a target="_blank" href="' . $downloadPDF . '" class="btn btn-danger btn-sm">Download PDF</a>';
                                ?>

                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</body>

</html>