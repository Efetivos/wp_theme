<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#000000">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php 
    if(is_front_page())
        echo "Front Page Title";
    else if(is_404())
        echo "Page Not Found";
    else
        the_title();
    echo ' | '.get_bloginfo('name');  
?></title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css">

    <!-- init Wp Header -->
    <?php wp_head(); ?>
    <!-- final Wp Header -->
</head>
<body>

    
    <!-- TRIGGER MENU -->
    <div class="box-trg-menu">
        <div class="holder-trg-menu e-rel e-flex-col">
            <div class="line-trg-menu e-wp"></div>
            <div class="line-trg-menu e-wp"></div>
            <div class="line-trg-menu e-wp"></div>
        </div>
    </div>

    <!-- MENU MOB -->
    <div class="menu-mob">
        <div class="holder-menu-mob e-flex-col e-rel">

            <div class="box-logo-menu e-flex">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo-efet-branco.svg" alt="" class="logo-menu-mob">
            </div>

            <div class="box-links-mob e-flex-col">
                <a href="#" class="link-menu-mob">Home</a>
                <a href="#" class="link-menu-mob">Sobre</a>
                <a href="#" class="link-menu-mob">Serviços</a>
                <a href="#" class="link-menu-mob">Galeria</a>
                <a href="#" class="link-menu-mob">Novidades</a>
                <a href="#" class="link-menu-mob">Contato</a>

            <a href="http://efetivos.com" target="_blank" class="e-flex dev-box e-wvw">
                <img src="<?php echo get_template_directory_uri(); ?>/images/desenvolvimento_dev_branco.svg" alt="" class="desenv-menu">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo-efet-branco.svg" alt="" class="logo-efet-menu">
            </a>
            </div>

        </div>
    </div>
    

 <!-- --------------- HEADER --------------- -->
 <!-- --------------- HEADER --------------- -->
    <header>
        <div class="holder-header e-rel">
            <!-- logo -->
            <div class="box-logo-main">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo-efet-preto.svg" alt="" class="logo-main">
            </div>
            <!-- MENU DESK -->
            <div class="box-links-desk e-flex">
                <a href="#" class="link-menu-desk">Home <div class="traco-menu e-wp"></div></a>
                <a href="#" class="link-menu-desk">Sobre <div class="traco-menu e-wp"></div></a>
                <a href="#" class="link-menu-desk">Serviços <div class="traco-menu e-wp"></div></a>
                <a href="#" class="link-menu-desk">Galeria <div class="traco-menu e-wp"></div></a>
                <a href="#" class="link-menu-desk">Novidades <div class="traco-menu e-wp"></div></a>
                <a href="#" class="link-menu-desk">Contato <div class="traco-menu e-wp"></div></a>

            </div>
        </div>
    </header>
   