<?php 
 
// KLEUREN
$colors = array();

$colors[] = array(
  'slug'=>'cookiebar_kleur', 
  'default' => '#efefef',
  'label' => __('Cookiebar kleur', 'Ari')
);
$colors[] = array(
  'slug'=>'cookiebar_button_kleur', 
  'default' => '#333',
  'label' => __('Cookiebar button kleur', 'Ari')
);
$colors[] = array(
  'slug'=>'cookiebar_button_tekst_kleur', 
  'default' => '#333',
  'label' => __('Cookiebar button tekst kleur', 'Ari')
);
$colors[] = array(
  'slug'=>'primaire_kleur', 
  'default' => '#333',
  'label' => __('Primaire kleur voor dit thema', 'Ari')
);
$colors[] = array(
  'slug'=>'secondaire_kleur', 
  'default' => '#333',
  'label' => __('Secondaire kleur voor dit thema', 'Ari')
);
$colors[] = array(
  'slug'=>'tertiaire_kleur', 
  'default' => '#333',
  'label' => __('Tertiaire kleur voor dit thema', 'Ari')
);
$colors[] = array(
  'slug'=>'menu_link_kleur', 
  'default' => '#fff',
  'label' => __('Tekstkleur voor menu items', 'Ari')
);
$colors[] = array(
  'slug'=>'menu_link_kleur_hover', 
  'default' => '#000',
  'label' => __('Tekstkleur voor menu items hover', 'Ari')
);
$colors[] = array(
  'slug'=>'button_tekst_kleur', 
  'default' => '#fff',
  'label' => __('Tekstkleur voor buttons', 'Ari')
);
$colors[] = array(
  'slug'=>'tekst_kleur', 
  'default' => '#333',
  'label' => __('De kleur van de body tekst', 'Ari')
);
$colors[] = array(
  'slug'=>'link-tekst_kleur', 
  'default' => '#333',
  'label' => __('De kleur van tekstuele linkjes', 'Ari')
);
foreach( $colors as $color ) {
  // SETTINGS
  $wp_customize->add_setting(
    $color['slug'], array(
      'default' 	=> $color['default'],
      'type' 		=> 'option', 
      'capability' 	=> 'edit_theme_options'
    )
  );
  // CONTROLS
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      $color['slug'], 
      array('label' => $color['label'], 
      'section' 	=> 'colors',
      'settings' 	=> $color['slug'])
    )
  );
}// EIND KLEUREN



//GOOGLE CODES
// section
$wp_customize->add_section("google_codes", array(
	"title" 		=> __("Scripts", "customizer_ga_sections"),
	"priority" 		=> 30,
));
// setting
$wp_customize->add_setting("ga_code", array(
	"default" 		=> "",
	"transport" 	=> "postMessage",
));
$wp_customize->add_setting("google_tagmanager_code", array(
	"default" 		=> "",
	"transport" 	=> "postMessage",
));

// control
$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize,
	"ga_code",
	array(
	"label" 		=> __("Google Analytics Code (UA-xxxxx)", "customizer_ga_code_label"),
		"section" 	=> "google_codes",
		"settings" 	=> "ga_code",
		"type" 		=> "textarea",
	)
));
$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize,
	"google_tag_head",
	array(
		"label" 		=> __("Google Tagmanager Code", "customizer_tag_head_code_label"),
		"section" 		=> "google_codes",
		"settings" 		=> "google_tagmanager_code",
		"type" 			=> "textfield",
		"description" 	=> __( 'Geef code in van Tagmanager' ),
	)
));



//LOGO UPLOAD
$wp_customize->add_section( 'eigen_logo_section' , array(
    'title'       => __( 'Logo', 'eigen' ),
    'priority'    => 40,
    'description' => 'Upload hier je logo',
) );
$wp_customize->add_setting( 'eigen_logo' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'eigen_logo', array(
    'label'    => __( 'Logo', 'eigen' ),
    'section'  => 'eigen_logo_section',
    'settings' => 'eigen_logo',
) ) );



//COOKIEMELDING
$wp_customize->add_section( 'cookie_melding_section' , array(
    'title'       => __( 'AVG / cookies' ),
    'priority'    => 50,
    'description' => 'Stel hier alles in voor AVG',
) );
// tekst voor cookiemelding NL
$wp_customize->add_setting("cookie_tekst", array(
	"default" => "",
	"transport" => "postMessage",
));
$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize,
	"cookie_tekst",
	array(
		"label" 	=> __("Tekst voor cookiemelding NL", "cookie_tekst_label"),
		"section" 	=> "cookie_melding_section",
		"settings" 	=> "cookie_tekst",
		"type" 		=> "textarea",
	)
));
// tekst voor cookiemelding EN
$wp_customize->add_setting("cookie_tekst_en", array(
	"default" 		=> "",
	"transport" 	=> "postMessage",
));
$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize,
	"cookie_tekst_en",
	array(
		"label" 	=> __("Tekst voor cookiemelding EN", "cookie_tekst_en_label"),
		"section" 	=> "cookie_melding_section",
		"settings" 	=> "cookie_tekst_en",
		"type" 		=> "textarea",
	)
));
// url privacy statement
$wp_customize->add_setting("cookie_privacystatement", array(
	"default" 		=> "",
	"transport" 	=> "postMessage",
));
$wp_customize->add_control(new WP_Customize_Control(
	$wp_customize,
	"cookie_privacystatement",
	array(
		"label" 	=> __("URL privacy statement i.v.t.", "cookie_privacystatement_label"),
		"section" 	=> "cookie_melding_section",
		"settings" 	=> "cookie_privacystatement",
		"type" 		=> "textfield",
	)
));
// vinkje cookiemelding
$wp_customize->add_setting( 'cookie_melding' );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cookie_melding', array(
    'label'    		=> __( 'Cookiebar inschakelen' ),
    'section'  		=> 'cookie_melding_section',
    'settings' 		=> 'cookie_melding',
    'type' 			=> 'checkbox',
	"description" 	=> __( 'Maak de cookiebar actief' ),
) ) );
// vinkje cookiemelding versie 2
$wp_customize->add_setting( 'cookie_melding_v2' );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'cookie_melding_v2', array(
    'label'    		=> __( 'Cookiebar versie 2' ),
    'section'  		=> 'cookie_melding_section',
    'settings' 		=> 'cookie_melding_v2',
    'type' 			=> 'checkbox',
	"description" 	=> __( 'Hiermee wordt versie 2 van de cookiebar actief.' ),
) ) );
// EIND COOKIEMELDING
