<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<meta name="description" content="">-->
    <!--<meta name="author" content="">-->
    <!--<link rel="icon" href="../../../../favicon.ico">-->

    <title>Gonçalo Peres Team Forum</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo BASE_URI; ?>templates/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo BASE_URI; ?>templates/css/custom.css" rel="stylesheet">
    <?php
    //Check if title is set, if not assign it
    if (!isset($title))
    {
        $title = SITE_TITLE;
    }
    ?>
</head>

<body>

<nav class="navbar navbar-expand-md navbar-inverse fixed-top">
    <a class="navbar-brand" href="<?php echo BASE_URI; ?>">Gonçalo Peres Team Forum</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo BASE_URI; ?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <?php if (!isLoggedIn()) : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URI; ?>register.php">Join the Team</a>
            </li>
            <?php else : ?>
            <li class="nav-item">
                <a class="nav-link disabled" href="<?php echo BASE_URI; ?>create.php">Create Topic</a>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<main role="main" class="container">

    <div class="row">
        <div class="col-md-8">
            <div class="main-col">
                <div class="block">
                    <h1 class="pull-left"><?php echo $title; ?></h1>
                    <h4 class="pull-right">More than a Team, a Family</h4>
                    <div class="clearfix"></div>
                    <hr>

                    <?php displayMessage(); ?>