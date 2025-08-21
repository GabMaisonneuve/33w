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

    <svg class="style-vague" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
            fill="<?= $couleur_bas ?>"
            fill-opacity="1"
            d="M0,32L80,58.7C160,85,320,139,480,133.3C640,128,800,64,960,53.3C1120,43,1280,85,1360,106.7L1440,128L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
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

            if ($exclude_galerie) {
                get_template_part('gabarit/carte');
            } else {
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