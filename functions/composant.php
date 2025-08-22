<?php

/**
 * Gabarits sous forme de fonctions. Chacune peut être paramétré
 * 
 */

function icone_sociaux($couleur)
{
    // pour enle ver le # de la position 0 on extrait à partir de la position 1   
    $couleur = substr($couleur, 1);
?>

    <a class="sociaux" href="https://github.com/eddytuto/33w-ete-25">
        <img src="https://s2.svgbox.net/social.svg?ic=github&color=<?= $couleur ?>" width="32" height="32">
    </a>
    <a class="sociaux" href="https://facebook.com">
        <img src="https://s2.svgbox.net/social.svg?ic=facebook&color=<?= $couleur ?>" width="32" height="32">
    </a>

<?php }

/**
 * générateur de vague pour séparer deux sections
 */

function vague($couleur_haut, $couleur_bas)
{ ?>
    <style>
        .style-vague {
            position: relative;
            top: 9px;
            background-color: <?= $couleur_haut ?>;
        }
    </style>

  <svg class="style-vague" xmlns="http://www.w3.org/2000/svg" 
     viewBox="0 0 1440 100" preserveAspectRatio="none">
  <path fill="<?= $couleur_bas ?>" 
        d="M0,15L80,30C160,45,320,70,480,65C640,60,800,30,960,25C1120,20,1280,45,1360,60L1440,75L1440,100L0,100Z">
  </path>
</svg>


<?php } 

function petite_vague($couleur_bas = '#966e49', $height = 40) { ?>
    <svg class="petite-vague" xmlns="http://www.w3.org/2000/svg" 
         viewBox="0 0 1440 100" preserveAspectRatio="none" 
         style="width:100%; height: <?= $height ?>px;">
        <path fill="<?= esc_attr($couleur_bas) ?>" 
              d="M0,20L80,35C160,50,320,70,480,60C640,50,800,30,960,35C1120,40,1280,60,1360,70L1440,80L1440,100L0,100Z">
        </path>
    </svg>
<?php }

function extraire_list_categories($nom_categorie)
{
    //$parent_category_id = get_term_by("slug", $nom_categorie, "category");
    $parent_category = get_category_by_slug($nom_categorie);
    $tableau = array(
        'parent' => $parent_category->term_id,
        'hide_empty' => true
    );
    $list_categories = get_categories($tableau);
    echo "<ul class='list_categories'>";
    foreach ($list_categories as $categorie) {
        echo "<li data-id='" . $categorie->term_id . "'>" . $categorie->name . "</li>";
    }
    echo "</ul>";
}


function afficher_cartes_categorie($categorie_id = 'populaire') {

    if (!is_numeric($categorie_id)) {
        $categorie = get_category_by_slug($categorie_id);
        if (!$categorie) {
            echo '<p>Aucune catégorie trouvée</p>';
            return;
        }
        $categorie_id = $categorie->term_id;
    }

    $galerie_cat = get_category_by_slug('galerie');
    $galerie_id = ($galerie_cat && is_object($galerie_cat)) ? $galerie_cat->term_id : 0;

    $default_image = get_template_directory_uri() . '/assets/images/default.jpg'; // 👈 Default image path

    $args = array(
        'cat' => intval($categorie_id),
        'posts_per_page' => 10,
        'post_status' => 'publish'
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        echo '<section class="destinations-populaires populaire">';
        echo '<div class="conteneur global">';
       
        while ($query->have_posts()) {
            $query->the_post();

            $categories = get_the_category();
            $exclude_galerie = true;
           
            foreach ($categories as $cat) {
                if ($cat->term_id === $galerie_id) {
                    $exclude_galerie = false;
                    break;
                }
            }

            // Check if the post has a featured image
            if (has_post_thumbnail()) {
                $image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            } else {
                $image_url = $default_image; // Use default if no featured image
            }

            // Pass the image URL to your template
            if ($exclude_galerie) {
                set_query_var('custom_image_url', $image_url);
                get_template_part('gabarit/carte');
            } else {
                set_query_var('custom_image_url', $image_url);
                get_template_part('gabarit/galerie');
            }
        }

        echo '</div>';
        echo '</section>';
       
        wp_reset_postdata();
    } else {
        echo '<p>Aucun article trouvé dans cette catégorie</p>';
    }
}

function club_voyage_register_menus() {
    register_nav_menu('menu_404', __('Menu 404', 'theme-textdomain'));
}
add_action('after_setup_theme', 'club_voyage_register_menus');