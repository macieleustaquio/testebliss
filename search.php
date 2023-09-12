<?php get_header(); ?>

<div class="container-fluid">
  <!-- Seção do Formulário de Pesquisa -->
  <section class="search-form py-5">
    <div class="container">
      <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
        <div class="input-group">
          <input type="text" class="form-control" name="s" id="s" placeholder="Digite sua pesquisa">
          <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
      </form>
    </div>
  </section>

  <div class="container py-5">
    <div class="row">
<!-- Seção de Resultados da Pesquisa -->
<div class="col-md-8">
    <section class="search-results">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="mb-5 d-flex flex-wrap align-items-start">
                <!-- Imagem Destacada -->
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="col-md-4 mb-md-0 me-3">
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid">
                    </div>
                <?php endif; ?>

                <div class="col-md-7">
                    <!-- Metabox -->
                    <div class="mb-3">
                        <small>
                            Publicado em: <?php the_time('F j, Y'); ?> |
                            Autor: <?php the_author(); ?>
                        </small>
                    </div>

                    <!-- Título e Excerpt -->
                    <h2 class="mb-3"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php the_excerpt(); ?>

                    <!-- Botão Ler Mais -->
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary mt-3">Ler mais</a>
                </div>
            </div>
        <?php endwhile; else: ?>
            <p>Nenhum resultado encontrado.</p>
        <?php endif; ?>
    </section>
</div>

      <!-- Sidebar -->
      <div class="col-md-3">
        <?php get_sidebar(); ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
