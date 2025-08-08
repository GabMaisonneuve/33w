<?php 
/**
 * le modele index
 * represente le modele par defaut de WordPress
 * 
 */
?>
    <?php get_header(); ?> 
 <section class="destinations-populaires">
  <h2><?php single_cat_title() ?></h2>
  <?= category_description(); ?>
  <?php if (have_posts()) {
    while (have_posts()) {
      the_post(); 
      the_post_thumbnail('thumbnail');
      ?>
      
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