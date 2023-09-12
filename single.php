<?php get_header(); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php if ( has_post_thumbnail() ): ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail('full', ['class' => 'img-fluid']); ?>
            </div>
        <?php endif; ?>

        <h1><?php the_title(); ?></h1>
        <p><?php the_time('F j, Y'); ?> por <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></p>

        <div class="content">
            <?php the_content(); ?>
        </div>

        <?php endwhile; else : ?>
            <p><?php esc_html_e( 'Desculpe, nenhum post corresponde aos seus critérios.' ); ?></p>
        <?php endif; ?>

        </div>

        <div class="col-md-4 py-3 bg-light">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
