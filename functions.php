<?php


function fullmotion_dev(){

    load_theme_textdomain( 'fullmotion' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
 
add_theme_support("custom-header");
add_theme_support("custom-background");
add_theme_support("post-formats",array("video","audio","image"));

    register_nav_menu("topmenu",__("top menu ","fullmotion"));

}

add_action( 'after_setup_theme', 'fullmotion_dev' );


function fullmotion_script(){


    wp_enqueue_style( 'fullmotion-text','https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800');
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '3.2' );  
    wp_enqueue_style('fullmotion-lightbox','//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.css');
    wp_enqueue_style('custom-style', get_theme_file_uri("custom-style.css"));
    wp_enqueue_style( 'fullmotion-style', get_stylesheet_uri());
	wp_enqueue_style( 'fullmotion', get_template_directory_uri() . '/assets/css/main.css');
    wp_enqueue_script('fullmotion-lightbox','//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.js',array('jquery'),'1.0',true);
	wp_enqueue_script( 'fullmotion-scrolly', get_template_directory_uri() . '/assets/js/jquery.scrolly.min.js',array('jquery'), '20141010', true );
	wp_enqueue_script( 'fullmotion-poptrox', get_template_directory_uri() . '/assets/js/jquery.poptrox.min.js',array('jquery'), '20141010', true );
	wp_enqueue_script( 'fullmotion-skel', get_template_directory_uri() . '/assets/js/skel.min.js',array('jquery'), '20141010', true );
	wp_enqueue_script( 'fullmotion-util', get_template_directory_uri() . '/assets/js/util.js',array('jquery'), '20141010', true );
	wp_enqueue_script( 'fullmotion-main', get_template_directory_uri() . '/assets/js/main.js',array('jquery'), '201410', true );
}

add_action('wp_enqueue_scripts','fullmotion_script');


function mamurjor_sidebar(){	


	register_sidebar( 
			       array(
			        'name' 		=>__('footer sidebar3', 'mamurjor'),
			        'id'		=>__("footer3"),
			        'description'=>__('this is a footer sidebar', 'mamurjor'),
			        'before_widget'=> '<ul>',
			        'after_widget' => '</ul>',
			        'before_title' => '<h3>',
			        'after_title'  => '</h3>',


			    ) );

}

add_action("widgets_init","mamurjor_sidebar");






function juta_footer_settings($wp_customizer){
	$wp_customizer->add_section('cust_footer',array(
		'title'=>__('Header Subtitle','fullmotion'),
		'priority'=>'50'
	));





	$wp_customizer->add_setting('cust_footer_copyright_text',array(
		'transport'=>'refresh', //postMessage
//		'type'=>'option' //theme_mod or option
	));

	$wp_customizer->add_control('cust_services_subheading_ctrl',array(
		'label'=>__('Header Subtitle Text','fullmotion'),
		'section'=>'cust_footer',
		'settings'=>'cust_footer_copyright_text',
		'type'=>'textarea'
	));

}
add_action('customize_register','juta_footer_settings');





function juta_footer($wp_customizer){
	$wp_customizer->add_section('cust_footer',array(
		'title'=>__('Footer Subtitle','fullmotion'),
		'priority'=>'60'
	));





	$wp_customizer->add_setting('cust_footer_text_bottom',array(
		'transport'=>'refresh', //postMessage
//		'type'=>'option' //theme_mod or option
	));

	$wp_customizer->add_control('cust_services_subhead',array(
		'label'=>__('Footer Title Text','fullmotion'),
		'section'=>'cust_footer',
		'settings'=>'cust_footer_text_bottom',
		'type'=>'textarea'
	));


	$wp_customizer->add_setting('cust_footer-top',array(
		'transport'=>'refresh', //postMessage
//		'type'=>'option' //theme_mod or option
	));

	$wp_customizer->add_control('cust_services_subheading_ctrl',array(
		'label'=>__('Footer Subtitle Text','fullmotion'),
		'section'=>'cust_footer',
		'settings'=>'cust_footer-top',
		'type'=>'textarea'
	));

}
add_action('customize_register','juta_footer');


function fullmotion_service($wp_customizer){
	$wp_customizer->add_section('cust_footer',array(
		'title'=>__('Service Title','fullmotion'),
		'priority'=>'70'
	));



	$wp_customizer->add_setting('cust_footer_text_top',array(
		'transport'=>'refresh', //postMessage
//		'type'=>'option' //theme_mod or option
	));

	$wp_customizer->add_control('cust_services_subhead',array(
		'label'=>__('Service Title Text','fullmotion'),
		'section'=>'cust_footer',
		'settings'=>'cust_footer_text_top',
		'type'=>'textarea'
	));


	$wp_customizer->add_setting('cust_service_bottom',array(
		'transport'=>'refresh', //postMessage
//		'type'=>'option' //theme_mod or option
	));

	$wp_customizer->add_control('cust_services_subheading',array(
		'label'=>__('Service Subtitle Text','fullmotion'),
		'section'=>'cust_footer',
		'settings'=>'cust_service_bottom',
		'type'=>'textarea'
	));

}
add_action('customize_register','fullmotion_service');




function fullmotion_customizer_media_upload($wp_customizer){
	$wp_customizer->add_section('banner_video',array(
		'title'=>__('Banner Video','fullmotion'),
	));



	$wp_customizer->add_setting('banner_video',array(
		'transport'=>'refresh', //postMessage
//		'type'=>'option' //theme_mod or option
	));





$wp_customizer->add_control( new WP_Customize_Media_Control( $wp_customizer, 'banner_video',
   array(
      'label' => __( 'Default Media Control' ),
      'description' => esc_html__( 'This is the description for the Media Control' ),
      'section' => 'banner_video',
      'mime_type' => 'video',  // Required. Can be image, audio, video, application, text
      'button_labels' => array( // Optional
         'select' => __( 'Select File' ),
         'change' => __( 'Change File' ),
         'default' => __( 'Default' ),
         'remove' => __( 'Remove' ),
         'placeholder' => __( 'No file selected' ),
         'frame_title' => __( 'Select File' ),
         'frame_button' => __( 'Choose File' ),

      )
   )
) );

}
add_action('customize_register','fullmotion_customizer_media_upload');





function custom_generate_css(){

 		ob_start();
       	require_once("custom-style.php");
        file_put_contents( get_template_directory().'/custom-style.css',ob_get_clean());

}
custom_generate_css();