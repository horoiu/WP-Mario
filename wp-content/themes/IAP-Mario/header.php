<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head(); ?> 
    </head>
    <body>
        <header class="site-header">
            <div class="container">
                <div class="header-hero">

                </div>

                <!-- Menus -->
                <div class="col-sm-9">
                    <!-- <div class="button">Buton</div> -->
                    <div class="primary-menu">
                        <?php 
                            if ( has_nav_menu( 'primary' ) ) :
                                wp_nav_menu(array(
                                    'theme_location' => 'primary',
                                    'container' => 'nav',
                                ) );
                            endif;
                        ?>
                    </div>
                </div>

            </div>
            <!-- <hr> -->
        </header>
