<!DOCTYPE html>
<html lang="en" xmlns:v-on="http://www.w3.org/1999/xhtml">
<head>
    <link rel="shortcut icon" href="<?= BASE_URL ?>img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?=BASE_URL?>img/favicon.ico" type="image/x-icon">
    <title><?=$data["title"]?> | Pasar Tradisional</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?=BASE_URL?>css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?=BASE_URL?>css/animate.css">

    <link rel="stylesheet" href="<?=BASE_URL?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=BASE_URL?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?=BASE_URL?>css/magnific-popup.css">

    <link rel="stylesheet" href="<?=BASE_URL?>css/aos.css">

    <link rel="stylesheet" href="<?=BASE_URL?>css/ionicons.min.css">

    <link rel="stylesheet" href="<?=BASE_URL?>css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?=BASE_URL?>css/jquery.timepicker.css">


    <link rel="stylesheet" href="<?=BASE_URL?>css/flaticon.css">
    <link rel="stylesheet" href="<?=BASE_URL?>css/icomoon.css">
    <link rel="stylesheet" href="<?=BASE_URL?>css/style.css">
</head>
<body class="goto-here">
<div id="<?=$data["vue"]?>">
    <div class="py-1 bg-primary">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                            <span class="text">+ 1235 2355 98</span>
                        </div>
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                            <span class="text">cs@pasartradisional.com</span>
                        </div>
                        <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                            <span class="text">1 Business days delivery &amp; Free Returns</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="<?=BASE_URL?>">PASAR TRADISIONAL</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="<?=BASE_URL?>" class="nav-link">Home</a></li>
                    <li class="nav-item active dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="<?=BASE_URL?>Shop">Shop</a>
                            <a class="dropdown-item" href="<?=BASE_URL?>Cart">Cart</a>
                            <a class="dropdown-item" href="<?=BASE_URL?>History">History</a>
                        </div>
                    </li>
                    <li class="nav-item"><a href="<?=BASE_URL?>Contact" class="nav-link">Contact</a></li>
                    <li class="nav-item cta cta-colored"><a href="<?=BASE_URL?>cart" class="nav-link"><span class="icon-shopping_cart"></span>[{{cart}}]</a></li>
                    <li class="nav-item active dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                src="<?= BASE_URL ?>uploads/<?=$data['user']['avatar']?>" alt="avatar" style="border-radius: 50%" height="25rem" width="25rem"></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown05">
                            <a class="dropdown-item" href="<?=BASE_URL?>"><b><?=$data['user']['full_name']?></b></a>
                            <a class="dropdown-item" href="<?=BASE_URL?>authentication/logout">Logout</a>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->
