<!DOCTYPE html>
<html lang="en" data-textdirection="<?php echo check_language() == 'arabic' ? 'rtl' : 'ltr'; ?>" class="loading">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="PIXINVENT">
        <title><?php echo $title ?></title>
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo general_app_assets('images/ico/apple-icon-60.png'); ?>">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo general_app_assets('images/ico/apple-icon-76.png'); ?>">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo general_app_assets('images/ico/apple-icon-120.png'); ?>">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo general_app_assets('images/ico/apple-icon-152.png'); ?>">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo general_app_assets('images/ico/favicon.ico'); ?>">
        <link rel="shortcut icon" type="image/png" href="<?php echo general_app_assets('images/ico/favicon-32.png'); ?>">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="default">


        <!-- BEGIN VENDOR CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo check_language() == 'arabic' ? general_app_assets('css-rtl/bootstrap.css') : general_app_assets('css/bootstrap.css'); ?>">

        <!-- font icons-->
        <link rel="stylesheet" type="text/css" href="<?php echo general_app_assets('fonts/icomoon.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo general_app_assets('fonts/flag-icon-css/css/flag-icon.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo general_app_assets('vendors/css/sliders/slick/slick.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo general_app_assets('vendors/css/extensions/pace.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo general_app_assets('vendors/css/tables/datatable/dataTables.bootstrap4.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo general_app_assets('vendors/css/tables/extensions/responsive.dataTables.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo general_app_assets('vendors/css/tables/extensions/colReorder.dataTables.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo general_app_assets('vendors/css/tables/extensions/buttons.dataTables.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo general_app_assets('vendors/css/tables/datatable/buttons.bootstrap4.min.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo general_app_assets('vendors/css/tables/extensions/fixedHeader.dataTables.min.css'); ?>">

        <link rel="stylesheet" type="text/css" href="<?php echo general_app_assets('vendors/css/charts/jquery-jvectormap-2.0.3.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo general_app_assets('vendors/css/charts/morris.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo general_app_assets('vendors/css/extensions/unslider.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo general_app_assets('vendors/css/weather-icons/climacons.min.css'); ?>">

        <!-- END VENDOR CSS-->





        <!-- END VENDOR CSS-->
        <!-- BEGIN ROBUST CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo check_language() == 'arabic' ? general_app_assets('css-rtl/bootstrap-extended.css') : general_app_assets('css/bootstrap-extended.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo check_language() == 'arabic' ? general_app_assets('css-rtl/app.css') : general_app_assets('css/app.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo check_language() == 'arabic' ? general_app_assets('css-rtl/colors.css') : general_app_assets('css/colors.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo check_language() == 'arabic' ? general_app_assets('css-rtl/custom-rtl.css') : general_app_assets('css/custom.css'); ?>">
        <!-- END ROBUST CSS-->
        <!-- BEGIN Page Level CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo check_language() == 'arabic' ? general_app_assets('css-rtl/core/menu/menu-types/vertical-menu.css') : general_app_assets('css/core/menu/menu-types/vertical-menu.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo check_language() == 'arabic' ? general_app_assets('css-rtl/core/menu/menu-types/vertical-overlay-menu.css') : general_app_assets('css/core/menu/menu-types/vertical-overlay-menu.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo check_language() == 'arabic' ? general_app_assets('css-rtl/core/colors/palette-gradient.css') : general_app_assets('css/core/colors/palette-gradient.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo check_language() == 'arabic' ? general_app_assets('css-rtl/plugins/calendars/clndr.css') : general_app_assets('css/plugins/calendars/clndr.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo check_language() == 'arabic' ? general_app_assets('css-rtl/plugins/animate/animate.css') : general_app_assets('css/plugins/animate/animate.css'); ?>">
        <!-- END Page Level CSS-->
        <!-- BEGIN Custom CSS-->
        <link rel="stylesheet" type="text/css" href="<?php echo check_language() == 'arabic' ? general_assets('css/style-rtl.css') : general_assets('css/style.css'); ?>">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
        <!-- END Custom CSS-->
    </head>

    <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">
