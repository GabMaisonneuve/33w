<?php 
/**
 * le modele single
 * represente le modele par defaut de WordPress
 * 
 */
?>
    <?php get_header(); ?> 
 <section class="destinations-populaires">
  <?php if (have_posts()) {
    while (have_posts()) {
      the_post(); 
      the_post_thumbnail('large');
      ?>
      
      <article class="destinations-populaires__destination">
        <h2 class="destinations-populaires__titre"><?php the_title(); ?></h2>
        <?php the_category(); ?>
        <div class="destinations-populaires__texte">
          <?php the_content();
          edit_post_link();
          ?>
          
        </div>
      </article>
      
  <?php }
  } ?>
</section>


    
    <?php get_footer();