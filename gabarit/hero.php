<?php 
$hero_couleur = get_theme_mod('hero_couleur');
$hero_auteur = get_theme_mod('hero_auteur', 'Gabriel Labrie');
$hero_adresse = get_theme_mod('hero_adresse', '356 Hamel');
?>
<style>
  .hero__contenu {
  color: <?= $hero_couleur ?>;
  }
</style>

<section class="hero">
  <!-- Texte animé -->
  <div class="container hero__contenu-wrapper">
    <div class="hero__contenu">
      <h1 class="hero__titre"><?php bloginfo('name') ?></h1>
      <p class="hero__description">
        <?php bloginfo('description') ?>
      </p>
      <p class="hero__description">
        Auteur du thème <?= $hero_auteur ?>
      </p>
      <div class="hero__informations">
        <p class="hero__description">info@cmaisonneuve.qc.ca</p>
        <p class="hero__description"><?= $hero_adresse ?></p>
        <p class="hero__description">514-254-7131</p>
      </div>
      <?php get_template_part('gabarit/icone'); ?>
      <div class="hero__bouton">S'inscrire</div>
    </div>
  </div>

  <!-- Formulaire -->
  <div class="container">
    <form class="hero__formulaire">
      <div class="hero__formulaire-groupe">
        <label for="nom">Nom</label>
        <input type="text" id="nom" placeholder="Écrivez votre nom" />
      </div>
      <div class="hero__formulaire-groupe">
        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" placeholder="Écrivez votre prénom" />
      </div>
      <div class="hero__formulaire-groupe">
        <label for="courriel">Courriel</label>
        <input type="email" id="courriel" placeholder="Écrivez votre courriel" />
      </div>
      <div class="hero__formulaire-groupe">
        <label for="telephone">Téléphone</label>
        <input type="tel" id="telephone" placeholder="Écrivez votre téléphone" />
      </div>
      <div class="hero__bouton hero__bouton-blanc">S'inscrire</div>
    </form>
  </div>
</section>