<?php
$titulo = get_field('titulo_do_bloco');
$descricao = get_field('descricao_do_bloco');
$numero_de_posts = get_field('numero_de_artigos');

if (!$numero_de_posts) {
    $numero_de_posts = 6;
}

$args = array(
    'posts_per_page' => $numero_de_posts,
);

$query = new WP_Query($args);

if ($query->have_posts()) : ?>
    <div class="container bg-light">
        <h2><?php echo esc_html($titulo); ?></h2>
        <p><?php echo esc_html($descricao); ?></p>
        <div class="row">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="col-md-4 mb-5 d-flex flex-wrap align-items-baseline">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid mb-3">
                    <?php endif; ?>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary mt-auto">Ler mais</a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php else : ?>
    <p>Nenhum artigo encontrado.</p>
<?php endif; ?>