<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>

<body>
    <?php include_once WP_PLUGIN_DIR . '/ComptaFormules/template/navbar.php' ?>
    <?php

    global $wpdb;
    $tableName = $wpdb->prefix . 'company_status';
    $query = $wpdb->prepare("SELECT * FROM $tableName");
    $status = $wpdb->get_results($query);
    ?>
    <div class="container mt-5">
        <h1 class="display-6 mb-5 text-center">Liste Des Status:</h1>
        <table class="table table-striped">
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
                            $docx = $statu->docxfile . '.docx';
                            $downloadDocx = esc_url(WP_PLUGIN_URL . '/ComptaFormules/src/saved-doc/' . $docx);

                            echo '<a target="_blank" class="btn btn-primary btn-sm" href="' . $downloadDocx . '">Download DOCX</a>';
                            ?>
                        </td>
                        <td>
                            <form action="">
                                <button class="btn btn-warning btn-sm">Convert PDF</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <!-- <tr>

                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>
                        <form action="">
                            <button class="btn btn-primary btn-sm">Download DOCX</button>
                        </form>
                    </td>
                    <td>
                        <form action="">
                            <button class="btn btn-primary btn-sm">Download PDF</button>
                        </form>
                    </td>
                </tr>
                <tr>

                    <td>Larry the Bird</td>
                    <td>@twitter</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                </tr> -->
            </tbody>
        </table>
    </div>
</body>

</html>