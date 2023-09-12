<?php
//chama o arquivo style.css do meu tema
function tema_enqueue_styles() {
  wp_enqueue_style( 'style', get_stylesheet_uri() );
}

//adiciona o campo de imagem destacada
add_theme_support( 'post-thumbnails' );

//inclui as folhas de estilos personalizadas no site
add_action( 'wp_enqueue_scripts', 'tema_enqueue_styles' );

//adiciona o logotipo do site no tema
function logotipo() {
  add_theme_support( 'custom-logo', array(
    'height'      => 100,
    'width'       => 150,
    'flex-height' => true,
    'flex-width'  => true,
  ) );
}
add_action( 'after_setup_theme', 'logotipo' );

// faz o registro do menu no tema
function registrar_meu_menu() {
  register_nav_menus(
    array(
      'mainMenu' => __( 'Menu Principal' ),
      // Você pode registrar mais localizações aqui, se necessário
    )
  );
}
add_action( 'init', 'registrar_meu_menu' );

//cria a função hero background com o ACF
function your_hero_function() {
  $image_array = get_field('hero_background');
  $hero_title = get_field('hero_title');
  $hero_text = get_field('hero_text');

  if ($image_array) {
    $image_url = $image_array['url'];
    echo '<div class="container-fluid p-0 hero" style="background-image: url(' . $image_url . ');">';
    echo '  <div class="hero-content">';

    // Verifica se o título do hero foi definido
    if ($hero_title) {
      echo '    <h1>' . esc_html($hero_title) . '</h1>';
    } else {
      echo '    <h1>' . get_the_title() . '</h1>';
    }

    // Verifica se o texto do hero foi definido
    if ($hero_text) {
      echo '    <p>' . esc_html($hero_text) . '</p>';
    }

    echo '  </div>';
    echo '</div>';
  }
}

//Cria o bloco de Slider
function your_slider_function() {
  if (have_rows('slider_images')): ?>
      <div class="slider">
          <?php while (have_rows('slider_images')): the_row();
              $image = get_sub_field('image'); ?>
              <div class="slide">
                  <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
              </div>
          <?php endwhile; ?>
      </div>
  <?php endif;
}

function your_slider_shortcode() {
  ob_start();
  your_slider_function();
  return ob_get_clean();
}

add_shortcode('your_slider', 'your_slider_shortcode');

// Registra do bloco ACF para o Slider
function register_acf_slider_block() {
  // Verifique se a função acf_register_block_type existe (ela faz parte do ACF 5.8+)
  if( function_exists('acf_register_block_type') ) {
      acf_register_block_type(array(
          'name'              => 'acf_slider',
          'title'             => __('Slider Personalizado'),
          'description'       => __('Um slider personalizado feito com ACF.'),
          'render_template'   => get_template_directory() . '/slider-template.php', // O caminho para o arquivo de template do seu bloco
          'category'          => 'formatting',
          'icon'              => 'images-alt2',
          'keywords'          => array('slider', 'carousel'),
      ));
  }
}
add_action('acf/init', 'register_acf_slider_block');

//registra o bloco de artigos recentes
function registrar_bloco_artigos_recentes() {
  if( function_exists('acf_register_block_type') ) {
      acf_register_block_type(array(
          'name' => 'artigos_recentes',
          'title' => __('Artigos Recentes'),
          'description' => __('Um bloco para exibir artigos recentes.'),
          'render_template' => get_template_directory() . '/recents-articles-block.php',
          'category' => 'formatting',
          'icon' => 'admin-comments',
          'keywords' => array('artigos', 'recentes'),
      ));

      // Adiciona uma mensagem de depuração, tive problemas para fazer com que o tema mostrasse os artigos recentes.
      error_log('Bloco de Artigos Recentes foi registrado.');
  } else {
      // Se a função acf_register_block_type não existir, isso será registrado
      error_log('A função acf_register_block_type não existe.');
  }
}
add_action('acf/init', 'registrar_bloco_artigos_recentes');

//limita o tamanho do texto da função excerpet
function custom_excerpt_length( $length ) {
  return 20; // O número de palavras que você deseja no resumo
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

//faz com que apenas sejam exibidos artigos na página de pesquisa
function filter_search_results($query) {
  if ($query->is_search && !is_admin()) {
      $query->set('post_type', 'post');
  }
}
add_action('pre_get_posts', 'filter_search_results');

//Cria o post type eventos para o tema
function criar_post_type_evento() {
  $labels = array(
    'name'               => 'Eventos',
    'singular_name'      => 'Evento',
    'add_new'            => 'Adicionar Novo',
    'add_new_item'       => 'Adicionar Novo Evento',
    'edit_item'          => 'Editar Evento',
    'new_item'           => 'Novo Evento',
    'all_items'          => 'Todos os Eventos',
    'view_item'          => 'Visualizar Evento',
    'search_items'       => 'Procurar Eventos',
    'not_found'          => 'Nenhum evento encontrado',
    'not_found_in_trash' => 'Nenhum evento encontrado na lixeira',
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'has_archive'        => true,
    'supports'           => array('title', 'editor', 'thumbnail'),
    'show_in_rest'       => true, // Habilita o Gutenberg para este post type
  );

  register_post_type('event', $args);
}

add_action('init', 'criar_post_type_evento');

//Funções do tema
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
      'page_title'    => 'Configurações do Tema',
      'menu_title'    => 'Configurações do Tema',
      'menu_slug'     => 'configuracoes-do-tema',
      'capability'    => 'edit_posts',
      'redirect'      => false
  ));
}