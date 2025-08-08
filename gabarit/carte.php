<?php  /**
 * Template-part carte.php
 * Affiche une carte dans un conteneur flex */ 
$lien = "<a class='conteneur__carte__lien' href=" . get_permalink() . ">Suite</a>";
?>
<article class="destinations-populaires__destination conteneur__carte">
            <?php the_post_thumbnail('miniature'); ?> 
            <h2 class="destinations-populaires__titre"><?php the_title(); ?></h2>
            <?php 
            
         echo '<p class="conteneur__carte__description">' . wp_trim_words(get_the_excerpt( ), 10, $lien) . '</p>';
            ?>
            <p class="conteneur__carte__temperature">
  <img src="<?php echo get_template_directory_uri(); ?>/images/froid.png" alt="Température minimum">Température minimum :
  <?php the_field('temperature_minimum'); ?> &deg;C
</p>
 
<p class="conteneur__carte__temperature">
  <img src="<?php echo get_template_directory_uri(); ?>/images/moyen.png" alt="Température moyenne">Température moyenne :
  <?php the_field('temperature_moyenne'); ?> &deg;C
</p>
 
<p class="conteneur__carte__temperature">
  <img src="<?php echo get_template_directory_uri(); ?>/images/chaud.png" alt="Température maximum">Température maximum :
  <?php the_field('temperature_maximum'); ?> &deg;C
</p>
            <?php  the_category(); ?>
          </article>