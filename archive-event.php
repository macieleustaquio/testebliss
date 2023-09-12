<?php get_header(); ?>

<div class="container my-5">
    <div class="row">
        <?php
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $numero_de_eventos = get_field('numero_de_eventos_por_pagina', 'option'); // Obtenha o valor do ACF

        if (!$numero_de_eventos) {
            $numero_de_eventos = 9; // valor padrão
        }

        $args = array(
            'post_type' => 'event',
            'posts_per_page' => $numero_de_eventos,
            'paged' => $paged
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
        ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                    <div class="card-body">
                        <small class="d-block mb-2">
                            Data do Evento: <?php the_field('data_do_evento'); ?>
                        </small>
                        <h5 class="card-title"><?php the_title(); ?></h5>
                        <p class="card-text"><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Ver mais</a>
                    </div>
                </div>
            </div>
        <?php endwhile; endif; ?>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <?php 
            $big = 999999999;

            echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $query->max_num_pages
            ) );
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>