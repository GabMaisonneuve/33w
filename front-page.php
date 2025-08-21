<?php 
/**
 * Le modèle front-page.php 
 * Permet d'afficher la page d'accueil
 */
?>

<?php get_header(); ?>

<?php
// Récupérer le nombre d’images défini dans le customizer (par défaut 3)
$nb_images = get_theme_mod('hero_nb_images', 3);
$hero_backgrounds = [];

// Charger les backgrounds définis
for ($i = 0; $i < $nb_images; $i++) {
    $bg = get_theme_mod("hero_background_$i");
    if ($bg) {
        $hero_backgrounds[] = $bg;
    }
}
?>

<section class="hero">
  <?php foreach ($hero_backgrounds as $index => $background): ?>
    <div 
      class="carrousel <?= $index === 0 ? 'active' : '' ?>" 
      style="background-image: url('<?= esc_url($background) ?>');">
    </div>
  <?php endforeach; ?>

  <form class="carrousel__form">
    <?php foreach ($hero_backgrounds as $i => $bg): ?>
      <input 
        type="radio" 
        class="carrousel__radio" 
        name="carrousel__radio" 
        value="<?= $i ?>" 
        <?= $i === 0 ? 'checked' : '' ?>
      >
    <?php endforeach; ?>
  </form>

  <?php get_template_part("gabarit/hero"); ?>
</section>

<section class="populaire">
  <?php afficher_cartes_categorie("populaire"); ?>
</section>

<section class="destination">
  <?php extraire_list_categories("destination"); ?>
  <h2 class="destination__titre">Articles de la categorie</h2>
  <div class="destination__list"></div>
</section>

<?php get_footer(); ?>