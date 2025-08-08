<?php 
$hero_auteur = get_theme_mod('hero_auteur', 'Default Title');
?>

<?php 
$hero_couleur = get_theme_mod('hero_couleur');
$hero_auteur = get_theme_mod('hero_auteur', 'Gabriel Labrie');
$hero_adresse = get_theme_mod('hero_adresse', '356 Hamel');
?>
<style>
  .hero_contenu {
    color: <?= $hero_couleur ?>;
  }
</style>
<section class="hero">
      <div class="container hero__contenu">
        <h1 class="hero__titre"><?php bloginfo('name') ?></h1>
        <p class="hero__description">
          <?php bloginfo('description') ?>
          <p> Auteur du thème <?= $hero_auteur ?> </p>
          <!-- Découvrez des destinations uniques et inoubliables avec notre club de
          voyage. Explorez le monde avec nous et créez des souvenirs mémorables. -->
        </p>
        <div class="hero__informations">
          <p class="hero__description">info@cmaisonneuve.qc.ca</p>
          <p class="hero__description">3600, rue Sherbrooke, Montreal</p>
          <p class="hero__description">514-254-7131</p>
        </div>
        <?php get_template_part('gabarit/icone'); ?>
        <div class="hero__bouton">S'inscrire</div>
      </div>
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
            <input
              type="email"
              id="courriel"
              placeholder="Écrivez votre courriel"
            />
          </div>
          <div class="hero__formulaire-groupe">
            <label for="telephone">Téléphone</label>
            <input
              type="tel"
              id="telephone"
              placeholder="Écrivez votre téléphone"
            />
          </div>
          <div class="hero__bouton hero__bouton-blanc">S'inscrire</div>
        </form>
      </div>
    </section>