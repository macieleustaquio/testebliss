<?php get_header(); ?>

<?php
// Chama a função do "hero" se ela existir
if (function_exists('your_hero_function')) {
    your_hero_function();
}
?>

<!-- Conteúdo principal da página -->
<div class="container p-3">
<h1><?php the_title(); ?></h1>
    <?php
    // Loop WordPress para o conteúdo da página
        if (have_posts()):
            while (have_posts()): the_post();
                the_content();
            endwhile;
        endif;
    ?>
</div>

<?php get_footer(); ?>