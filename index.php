
    <?php get_header(); ?> 
    <section class="hero">
      <div class="container hero__contenu">
        <h1 class="hero__titre">Club de voyage</h1>
        <p class="hero__description">
          Découvrez des destinations uniques et inoubliables avec notre club de
          voyage. Explorez le monde avec nous et créez des souvenirs mémorables.
        </p>
        <div class="hero__informations">
          <p class="hero__description">info@cmaisonneuve.qc.ca</p>
          <p class="hero__description">3600, rue Sherbrooke, Montreal</p>
          <p class="hero__description">514-254-7131</p>
        </div>
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

    <section class="galerie">
      <div class="container">
        <h2>Nos destinations favorites</h2>
        <div class="grille">
          <article class="carte">
            <img class="carte__image" src="images/destination1.jpg" alt="" />
          </article>
          <article class="carte">
            <img class="carte__image" src="images/destination1.jpg" alt="" />
          </article>
          <article class="carte">
            <img class="carte__image" src="images/destination1.jpg" alt="" />
          </article>
          <article class="carte">
            <img class="carte__image" src="images/destination1.jpg" alt="" />
          </article>
          <article class="carte">
            <img class="carte__image" src="images/destination1.jpg" alt="" />
          </article>
          <article class="carte">
            <img class="carte__image" src="images/destination1.jpg" alt="" />
          </article>
          <article class="carte">
            <img class="carte__image" src="images/destination1.jpg" alt="" />
          </article>
          <article class="carte">
            <img class="carte__image" src="images/destination1.jpg" alt="" />
          </article>
          <article class="carte">
            <img class="carte__image" src="images/destination1.jpg" alt="" />
          </article>
          <article class="carte">
            <img class="carte__image" src="images/destination1.jpg" alt="" />
          </article>
        </div>
      </div>
    </section>
 <section class="destinations-populaires">
  <?php if (have_posts()) {
    while (have_posts()) {
      the_post(); ?>
      
      <article class="destinations-populaires__destination">
        <h2 class="destinations-populaires__titre"><?php the_title(); ?></h2>
        <div class="destinations-populaires__texte">
          <?php the_content(); ?>
        </div>
      </article>
      
  <?php }
  } ?>
</section>


    
    <?php get_footer();