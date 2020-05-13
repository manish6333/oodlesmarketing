<?php

require get_stylesheet_directory() . '/ENV/global_env.php';

define('RE_CAPTCHA_PUBLIC', getenv('RE_CAPTCHA_PUBLIC'));
define('RE_CAPTCHA_SECRET', getenv('RE_CAPTCHA_SECRET'));
define('OT_GMAP_API', getenv('OT_GMAP_API'));




add_theme_support( 'title-tag' );

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    if(!is_front_page()){
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
        wp_enqueue_style( 'owl-css', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css' );
        wp_enqueue_style( 'owl-theme', get_stylesheet_directory_uri() . '/css/owl.theme.default.min.css' );
        wp_enqueue_style('font-awesome.min','https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style( 'bootstrap-style', get_stylesheet_directory_uri() . '/css/bootstrap.min.css' );
    }
    if(is_front_page()){
        wp_enqueue_style( 'owl-css', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css' );
        wp_enqueue_style( 'frontpage-style', get_stylesheet_directory_uri() . '/css/frontpage.css' );
    }
	wp_enqueue_script('jquery.min', get_stylesheet_directory_uri() . '/js/jquery.min.js',array(), 1.0, false);
      wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js' );
    
     wp_localize_script('script-js', 'blogObject', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'site_url'=> get_template_directory_uri()
    ));
    wp_enqueue_script( 'owl-js', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js',array(),1.1,true );
    wp_enqueue_script( 'onwheel-jquery', get_stylesheet_directory_uri() . '/js/jquery.mousewheel.min.js',array(),1.1,true );
    wp_enqueue_script( 'script-jssas', get_stylesheet_directory_uri() . '/js/script.js',array('owl-js'),1.1,true );
}


// Relevant Work Begin - May
/*
* Marketing CPT FILE.
*/
require_once dirname( __FILE__ ) . '/marketing_custom_post_type.php';
// Relevant Work End - May




// Email function


function get_post_fields_variables($post){
        return (array) json_decode( stripslashes( $post ) );
    }

add_action( 'wp_ajax_custom_conatct_us_submit',  'custom_conatct_us_submit'  );
add_action( 'wp_ajax_nopriv_custom_conatct_us_submit', 'custom_conatct_us_submit' );

function custom_conatct_us_submit(){
    $fields = get_post_fields_variables($_POST['fields']);
    extract( $fields );

    $user_name  = sanitize_text_field( $user_name );
    $company_name   = sanitize_text_field( $company_name );
    $user_email = sanitize_email( $user_email );
    $user_phone = sanitize_text_field( $user_phone );
    $quotes     = sanitize_text_field( $quotes );
    $user_query = esc_textarea( $user_query );
    $current_url  = $_POST['current_url'];
    $previous_url = $_POST['previous_url'];
    $location_history = stripslashes( $_POST['all_history'] );
    
    $user_data_arr = array(  'user_name'    => $user_name, 'user_email' => $user_email,  'user_phone'   => $user_phone,  'user_query'   => $user_query,  'previous_url' => $previous_url,  'current_url'    => $current_url,  'location_history'    => $location_history,  'g-recaptcha-response'   => $_POST['g-recaptcha-response']);

    $secretKey = getenv('RE_CAPTCHA_SECRET');

    // Verify the reCAPTCHA response 
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']);  
    // Decode json data 
    $responseData = json_decode($verifyResponse); 
    $response_succ_status = $responseData->success;

    if($response_succ_status){
     custom_smtp_send_mail('ravi.rose@oodlestechnolgies.com', $quotes_, $user_data_arr, $_FILES );
    }else{}
}



// load more
function more_post_ajax(){
    global $post;
    $offset =(isset($_POST["offset"]));
    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 2;
    $page = (isset($_POST['offset'])) ? $_POST['offset'] : 0;
  
    header("Content-Type: text/html");
    $args = get_posts(array( 'post_type' => 'blog', 'posts_per_page' => $ppp, 'offset' => $page));
    $count_all = count( get_posts(array( 'post_type' => 'blog', 'posts_per_page' => -1 )) );

    $out = '';
    if ( $args ) {
        foreach ( $args as $post ) :
            // setup_postdata( $post ); 
            $recent_author = get_user_by( 'ID', $post->post_author );
            // Get user display name
            $author_display_name = $recent_author->display_name;
            $out .= '  <div class="col-md-6"> <div class="blogheadblogs"> <a href="'. get_the_permalink().'"> <div class="zoomblogs"> <img style="width: 100%;height: 210px;" src="'. get_the_post_thumbnail_url() .'" alt=""> </div> <div class="methdocolorblogs"> <h3 class="collaboblogs "><a href="'. get_the_permalink().'"> '. (get_the_title()) .' </a></h3> <h4 class="blog_date_home"> '. get_the_date('') .' </h4> <h4> '. $author_display_name .' </h4> <p><a href="'. get_the_permalink().'"> '. wp_trim_words(get_the_title(),5) .' </a></p> </div> </div> </div>';
        endforeach; 
        wp_reset_postdata();

        if( ( $ppp > count( $args ) ) || $count_all ==  ( $page + $ppp ) ){
            $hide_load_more = true;
        } else {
            $hide_load_more = false;
        }
        wp_send_json( array( 'html' => $out, 'hide_load_more' => $hide_load_more ));
    }
}


add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');


//Two functions to remove slug from related_service  CPTs:
function remove_related_service_slugs($post_link, $post) {

    if('relevant_work' != $post->post_type || 'publish' != $post->post_status) {
        return $post_link;
    }

    $post_link = str_replace('/' . $post->post_type . '/', '/', $post_link);

    return $post_link;
}
add_filter('post_type_link', 'remove_related_service_slugs', 10, 3);

function  parse_related_service_slugs($query) {

    if(!$query->is_main_query() || 2 != count($query->query) || !isset($query->query['page'])) {
        return;
    }

    if(!empty($query->query['name'])) {
        $query->set('post_type', array('post', 'related_services','relevant_work', 'page'));
    }
}
add_action('pre_get_posts', 'parse_related_service_slugs');

// search box 
function template_chooser($template)   
{    
  global $wp_query;   
  $post_type = get_query_var('post_type');   
  if( $wp_query->is_search && $post_type == 'blog' )   
  {
    return locate_template('search.php');  //  redirect to archive-search.php
  }   
  return $template;   
}
add_filter('template_include', 'template_chooser');
/*
		 * Author : Aparajita
		 * Setup custom widget for footer to get dynamic data
*/

function custom_widget_setup() {
    register_sidebar(array(
        'name' => __('Custom Footer1'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your sidebar on blog posts and archive pages.'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Custom Footer2'),
        'id' => 'sidebar-2',
        'description' => __('Add widgets here to appear in your footer.'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Custom Footer3'),
        'id' => 'sidebar-3',
        'description' => __('Add widgets here to appear in your footer.'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    
}
   add_action('widgets_init','custom_widget_setup');
/*
		 * Author : Aparajita
		 * Setup custom widget for footer to get dynamic data
*/
   function custom_widget_setup_footer() {
  register_sidebar(array(
      'name' => __('Custom Footer4'),
      'id' => 'sidebar-4',
      'description' => __('Add widgets here to appear in your footer.'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget' => '</section>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>',
  ));
  register_sidebar(array(
    'name' => __('Custom Footer5'),
    'id' => 'sidebar-5',
    'description' => __('Add widgets here to appear in your footer.'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>',
));

   }
   add_action('widgets_init','custom_widget_setup_footer');
   /*Function to defer or asynchronously load scripts not aggregated by Autoptimize*/
    
    

function js_async_attr($tag){

    # Do not add defer or async attribute to these scripts
    $scripts_to_exclude = array(get_stylesheet_directory_uri() . '/js/jquery.min.js',
            get_stylesheet_directory_uri() . '/js/bootstrap.min.js', 
            get_stylesheet_directory_uri() . '/js/owl.carousel.min.js',
            get_stylesheet_directory_uri() . '/js/jquery.mousewheel.min.js',
            get_stylesheet_directory_uri() . '/js/script.js'
    );
     
    foreach($scripts_to_exclude as $include_script){
        if(true == strpos($tag, $include_script ))
        # Async the scripts included above
        return str_replace( ' src', ' async="async" src', $tag );
    }

    # Return original tag for all scripts not included
    return $tag;

}
add_filter( 'script_loader_tag', 'js_async_attr', 10 );

add_filter('autoptimize_filter_css_tagmedia','check_mediatype',10,2);
function check_mediatype($media) {
  $media=array("all");
  return $media;
}