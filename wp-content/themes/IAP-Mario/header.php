<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head(); ?> 
    </head>
    <body>
        <header class="site-header">

            <!-- Hero background-->
            <div class="header-hero"></div>

            <!-- Menus -->
            <div class="container">  
                <div class="col-sm-9">
                    <div class="row">
                        <!-- <div class="button">Buton</div> -->
                        <div class="primary-menu">
                            <?php 
                                if ( has_nav_menu( 'primary' ) ) :
                                    wp_nav_menu(array(
                                        'theme_location' => 'primary',
                                        'container' => 'nav',
                                        'depth' => '4',
                                    ) );
                                endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            
        </header>
