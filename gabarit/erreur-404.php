<?php 
/**
 * Gabarit de la page 404
 */
?>

<section class="erreur-404" style="background-image: url('<?php echo get_theme_mod('section_404_image', get_template_directory_uri() . '/images/ilepalmier.jpg'); ?>');">
  
  <div class="erreur-404__contenu">

    <h1 class="erreur-404__titre">
      <?php echo get_theme_mod('section_404_titre', "Oops, vous avez échoué sur l'île 404 !"); ?>
    </h1>

    <p class="erreur-404__texte">
        <?php echo get_theme_mod('erreur404_texte', "Pas de panique, cher membre explorateur ! Vous avez dérivé un peu trop loin des destinations de rêve que notre club a soigneusement sélectionnées pour vous. Reprenez votre périple en cliquant sur 'Accueil' pour découvrir à nouveau nos voyages d’exception !"); ?>
    </p>

    <!-- Zone de recherche -->
 

    <!-- Menu personnalisé pour 404 -->
    
    <!-- Bouton retour accueil -->
    <a href="<?php echo home_url(); ?>" class="erreur-404__btn" style="background-color: <?php echo get_theme_mod('section_404_couleur_btn', '#ffe217'); ?>;">
        Retour à l’accueil
    </a>
    
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

       <div class="erreur-404__search-custom">
        <form role="search" method="get" class="recherche-404-form" action="<?php echo esc_url(home_url('/')); ?>">
            <input type="search" 
                   class="recherche-404-input" 
                   placeholder="Rechercher..." 
                   value="<?php echo get_search_query(); ?>" 
                   name="s" 
                   autocomplete="off" />
            <input type="submit" class="recherche-404-submit" value="Rechercher" />
        </form>
    </div>
  </div>
</section>