<?php get_header(); // Inclui o header.php ?>



<?php //chama a função de artigos recentes
if (function_exists('exibir_artigos_recentes')) {
    exibir_artigos_recentes();
}
?>

<?php get_footer(); // Inclui o footer.php ?>