<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title>
        <?php
            if ( is_front_page() && is_home() ) {
                bloginfo( 'name' );  // Para a página inicial, mostra apenas o nome do site
            } elseif ( is_front_page() ) {
                bloginfo( 'name' );  // Para páginas estáticas configuradas como página inicial
            } elseif ( is_home() ) {
                single_post_title();  // Para páginas de postagens (quando a página inicial é uma página estática)
            } else {
                wp_title( '|' , true, 'right' );  // Para todas as outras páginas
            }
        ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <!-- Chama o arquivo minificado do bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="m-auto">
        <div class="container-fluid bg-dark">
            <div class="container">
                <div class="row xl align-items-center">
                    <div class="col">
                    <?php
                        if ( has_custom_logo() ) {
                            $custom_logo_id = get_theme_mod( 'custom_logo' );
                            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                            echo '<img class="logo" src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                        } else {
                            echo '<h1>' . get_bloginfo( 'name' ) . '</h1>'; //aqui faz com que o tema apresente o nome do site caso não seja feito o upload do logotipo.
                        }
                    ?>
                    </div>
                    <div class="col">
                        <!-- Código para chamar o menu do tema-->
                        <nav id="mainMenu" class="navbar navbar-expand-lg navbar-dark bg-dark">
                            <?php wp_nav_menu( array('theme_location' => 'mainMenu', 'container'      => 'div',
                                    'container_id'   => 'mainMenu', ) );
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="flex-shrink-0 m-auto">