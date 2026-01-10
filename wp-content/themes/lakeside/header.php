<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <title><?php wp_title( '|', true, 'right' ); ?> - Hire In</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/css/responsive.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/css/fonts.css" />
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="site-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-default">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <?php bloginfo( 'name' ); ?>
                            </a>
                        </div>
                        
                        <div class="navbar-collapse">
                            <?php
                            wp_nav_menu( array(
                                'theme_location' => 'primary',
                                'menu_class'     => 'navbar-nav',
                                'container'      => false,
                            ) );
                            ?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
