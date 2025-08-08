<?php
function theme_31w_customize_register($wp_customize) {

    // Section Hero
    $wp_customize->add_section('hero_section', array(
        'title'    => __('Section Héro - Accueil', 'theme_31w'),
        'priority' => 30,
    ));

    // Titre (Texte)
    $wp_customize->add_setting('hero_title', array(
        'default'           => __('Bienvenue sur mon site', 'theme_31w'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_title', array(
        'label'   => __('Auteur', 'theme_31w'),
        'section' => 'hero_section',
        'type'    => 'text',
    ));

    // Couleur du texte
    $wp_customize->add_setting('hero_couleur', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hero_couleur', array(
        'label'   => __('Couleur du texte', 'theme_31w'),
        'section' => 'hero_section',
    )));

    // Image d’arrière-plan 1
    $wp_customize->add_setting('hero_background_0', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_0', array(
        'label'   => __('Image en arrière-plan 1', 'theme_31w'),
        'section' => 'hero_section',
    )));

    // Image d’arrière-plan 2
    $wp_customize->add_setting('hero_background_1', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_1', array(
        'label'   => __('Image en arrière-plan 2', 'theme_31w'),
        'section' => 'hero_section',
    )));

    // Image d’arrière-plan 3
    $wp_customize->add_setting('hero_background_2', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_2', array(
        'label'   => __('Image en arrière-plan 3', 'theme_31w'),
        'section' => 'hero_section',
    )));
}
add_action('customize_register', 'theme_31w_customize_register');
