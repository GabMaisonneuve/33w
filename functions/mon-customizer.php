<?php
function club_voyage_customize_register($wp_customize) {

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
