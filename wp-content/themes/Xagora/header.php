<!DOCTYPE html>

<html lang="en">

<head>

    <!-- ============================================== Basic Page Needs =============================================== -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head() ?>

    <!-- ============================================== Theme Color =============================================== -->
    <meta name="theme-color" content="#21333e">

    <?php get_my_template_part('header/root') ?>

</head>

<body class="home">

    <!-- Preloader -->
    <div id="preloader" data-timeout="1100" class="odd preloader counter">
        <div data-aos="fade-up" data-aos-delay="150" class="row justify-content-center text-center items">
            <div data-percent="100" class="radial">
                <span></span>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header id="header">

        <?php
        /**
         * Top Navbar
         */
        get_my_template_part('header/top-navbar');

        /**
         * NavBar
         */
        get_my_template_part('header/navbar');
        ?>

    </header>