<?php 
/**
 * Gabarit de la page 404
 */
?>

<section class="erreur-404" style="background-image: url('<?php echo get_theme_mod('section_404_image', get_template_directory_uri() . '/images/ilepalmier.jpg'); ?>');">
  
  <div class="erreur-404__contenu">

    <h1 class="erreur-404__titre">
      <?php echo get_theme_mod('section_404_titre', 'Erreur 404'); ?>
    </h1>

    <h2 class="erreur-404__message">
      <?php echo get_theme_mod('section_404_message', "Oops, vous avez échoué sur l'île 404 !"); ?>
    </h2>

    <p class="erreur-404__texte">
        <?php echo get_theme_mod('erreur404_texte', "Pas de panique, cher membre explorateur ! Vous avez dérivé un peu trop loin des destinations de rêve que notre club a soigneusement sélectionnées pour vous. Reprenez votre périple en cliquant sur 'Accueil' pour découvrir à nouveau nos voyages d’exception !"); ?>
    </p>

    <!-- Zone de recherche -->
    <div class="erreur-404__search">
      <?php get_search_form(); ?>
    </div>

    <!-- Menu personnalisé pour 404 -->
    <nav class="erreur-404__menu">
      <?php
        wp_nav_menu(array(
          'theme_location' => 'menu_404',
          'container'      => false,
          'menu_class'     => 'erreur-404__menu-list',
          'fallback_cb'    => false
        ));
      ?>
    </nav>

    <!-- Bouton retour accueil -->
    <a href="<?php echo home_url(); ?>" class="erreur-404__btn" style="background-color: <?php echo get_theme_mod('section_404_couleur_btn', '#ff6600'); ?>;">
      Retour à l’accueil
    </a>

  </div>
</section>