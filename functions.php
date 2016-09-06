<?php
// nous appelons notre nouvelle fonction au moment où WordPress charge les scripts
add_action( 'wp_enqueue_scripts', 'oc_theme_enqueue_styles' );
// nous créons une fonction pour ajouter les styles du parent. 
function oc_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', 'parent-style' );
}
function oc_mon_footer_perso() {
    echo '<div class="monFooter"><p style="font-size: 1em;">Ce thème a été Créé pour un cours <a href="https://openclassrooms.com" target="_blank">Openclassrooms</a></p></div>';
}
//add_action( 'wp_footer', 'oc_mon_footer_perso' );

add_filter( 'the_post', 'oc_modifier_titre_tutoriels');
function oc_modifier_titre_tutoriels ($post) {
  if (  in_category('tutoriel') ) {
    $post->post_title = "Tuto: " . $post->post_title;
  }
  return $post->post_title;
}
