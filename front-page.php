<?php 
/**
 * Le modele front-page.php 
 * Permet d'afficher la page d'accueil
 */
?>
    <?php get_header(); ?>
    <?php
    $hero_background[0] = get_theme_mod("hero_background_0");
    $hero_background[1] = get_theme_mod("hero_background_1");
    $hero_background[2] = get_theme_mod("hero_background_2");

    ?>
    <section class="hero">
    <div class="carrousel active" style="background-image: url('<?= $hero_background[0] ?>');"></div>
    <div class="carrousel" style="background-image: url('<?= $hero_background[1] ?>');"></div>
    <div class="carrousel" style="background-image: url('<?= $hero_background[2] ?>');"></div>
    <form class="carrousel__form">
    <input type="radio" class="carrousel__radio" name="carrousel__radio" value="0" checked>
    <input type="radio" class="carrousel__radio" name="carrousel__radio" value="1">
    <input type="radio" class="carrousel__radio" name="carrousel__radio" value="2">
    </form>



    <?php get_template_part("gabarit/hero") ?>
    </section>


    <section class="populaire">
  <?php get_template_part("gabarit/populaire")  ?>
  </section>

  <section class="destination">
    <?php extraire_list_categories("destination"); ?>
    <h2 class="destination__titre">Articles de la categorie</h2>
    <div class="destination__list"></div>
  </section>
    
    <?php get_footer();