<?php
// Use the image passed from the query or fallback to featured image or default
$image_url = get_query_var('custom_image_url', '');
if (!$image_url) {
    // fallback to the featured image if the query var is not set
    $image_url = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'miniature') : get_template_directory_uri() . '/assets/images/default.jpg';
}
?>
<article class="destinations-populaires__destination conteneur__carte">
    <img src="<?= esc_url($image_url) ?>" alt="<?php the_title(); ?>" class="carte__image">

    <h2 class="destinations-populaires__titre"><?php the_title(); ?></h2>

    <?php 
    $lien = "<a class='conteneur__carte__lien' href=" . get_permalink() . ">Suite</a>";
    echo '<p class="conteneur__carte__description">' . wp_trim_words(get_the_excerpt(), 10, $lien) . '</p>';
    ?>

    <p class="conteneur__carte__temperature">
        <img src="<?php echo get_template_directory_uri(); ?>/images/froid.png" alt="Température minimum">
        Température minimum : <?php the_field('temperature_minimum'); ?> &deg;C
    </p>
    <p class="conteneur__carte__temperature">
        <img src="<?php echo get_template_directory_uri(); ?>/images/moyen.png" alt="Température moyenne">
        Température moyenne : <?php the_field('temperature_moyenne'); ?> &deg;C
    </p>
    <p class="conteneur__carte__temperature">
        <img src="<?php echo get_template_directory_uri(); ?>/images/chaud.png" alt="Température maximum">
        Température maximum : <?php the_field('temperature_maximum'); ?> &deg;C
    </p>

    <div class="conteneur__categories">
        <?php
        $categories = get_the_category();
        $exclude = ['Destination', 'Populaire']; // exclusions

        if (! empty($categories)) {
            echo '<ul class="categories-list">';
            foreach ($categories as $category) {
                if (! in_array($category->name, $exclude)) {
                    echo '<li class="categorie-item">';
                    echo '<a class="categorie-badge" href="' . esc_url(get_category_link($category->term_id)) . '">';
                    echo esc_html($category->name);
                    echo '</a>';
                    echo '</li>';
                }
            }
            echo '</ul>';
        }
        ?>
    </div>
</article>