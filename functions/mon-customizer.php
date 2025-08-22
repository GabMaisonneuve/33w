<?php
function club_voyage_customize_register($wp_customize) {

    //Section 404
      $wp_customize->add_section('section_404', array(
        'title'       => __('Page 404', 'theme-textdomain'),
        'description' => __('Personnalisez la page d’erreur 404', 'theme-textdomain'),
        'priority'    => 160,
    ));

    // Image d’arrière-plan
    $wp_customize->add_setting('section_404_image', array(
        'default' => get_template_directory_uri() . '/images/ilepalmier.jpg',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'section_404_image_control', array(
        'label'    => __('Image d’arrière-plan', 'theme-textdomain'),
        'section'  => 'section_404',
        'settings' => 'section_404_image',
    )));

    // Titre
    $wp_customize->add_setting('section_404_titre', array(
        'default' => "Erreur 404",
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('section_404_titre_control', array(
        'label'   => __('Titre principal', 'theme-textdomain'),
        'section' => 'section_404',
        'type'    => 'text',
    ));

    // Message
    $wp_customize->add_setting('section_404_message', array(
        'default' => "Oops, vous avez échoué sur l'île 404 !",
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('section_404_message_control', array(
        'label'   => __('Message', 'theme-textdomain'),
        'section' => 'section_404',
        'type'    => 'textarea',
    ));

    // Ajouter un setting pour le texte d'erreur
    $wp_customize->add_setting('erreur404_texte', array(
        'default' => "Pas de panique, cher membre explorateur ! Vous avez dérivé un peu trop loin des destinations de rêve que notre club a soigneusement sélectionnées pour vous. Reprenez votre périple en cliquant sur 'Accueil' pour découvrir à nouveau nos voyages d’exception !",
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Contrôle (champ texte)
    $wp_customize->add_control('erreur404_texte', array(
        'label' => 'Texte de la page 404',
        'section' => 'section_404',
        'type' => 'textarea',
    ));

    // Couleur bouton
    $wp_customize->add_setting('section_404_couleur_btn', array(
        'default' => '#ff6600',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'section_404_couleur_btn_control', array(
        'label'   => __('Couleur du bouton', 'theme-textdomain'),
        'section' => 'section_404',
        'settings'=> 'section_404_couleur_btn',
    )));


    // Section Hero
    $wp_customize->add_section('hero_section', array(
        'title'    => __('Section Héro - Accueil', 'club-voyage'),
        'priority' => 30,
    ));

    // Titre (Texte)
    $wp_customize->add_setting('hero_title', array(
        'default'           => __('Bienvenue sur mon site', 'club-voyage'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_title', array(
        'label'   => __('Auteur', 'club-voyage'),
        'section' => 'hero_section',
        'type'    => 'text',
    ));

    // Couleur du texte
    $wp_customize->add_setting('hero_couleur', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hero_couleur', array(
        'label'   => __('Couleur du texte', 'club-voyage'),
        'section' => 'hero_section',
    )));

    // Image jusqu'à 15
     $wp_customize->add_setting('hero_background_count', array( // Renvoie un booléen
        'default'           => 3,
        'sanitize_callback' => 'absint',
        'transport'         => 'refresh',
    ));
 
    $wp_customize->add_control('hero_background_count', array(
        'label'       => __('Nombre d’images du carrousel', 'club-voyage'),
        'section'     => 'hero_section',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 1,
            'max'  => 10,
            'step' => 1,
        ),
    ));
 
    for ($i = 0; $i < 15; $i++) {
        $setting_id = "hero_background_$i";
        /* créer le champ */
        $wp_customize->add_setting($setting_id, array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        /* créer le contrôleur */
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $setting_id, array(
            'label' => sprintf(__('Image en arrière plan %d', 'club-voyage'), $i + 1),
            'section' => 'hero_section',
        )));
    }

    function club_voyage_customize_controls_js() {
        wp_enqueue_script(
            'club-voyage-customizer',
            get_template_directory_uri() . '/script/customizer.js',
            array('jquery', 'customize-controls'),
            '1.0.0',
            true
        );
    }
    add_action('customize_controls_enqueue_scripts', 'club_voyage_customize_controls_js');

    }
    add_action('customize_register', 'club_voyage_customize_register');
