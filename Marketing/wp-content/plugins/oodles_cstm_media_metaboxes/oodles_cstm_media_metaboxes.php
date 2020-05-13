<?php
/*
Plugin Name: Oodles Custom Media Metaboxes
Description: This Plugin is use for making a custom metabox for upload media on specific post
Author: Oodles Technologies
Author URI: https://oodlestechnologies.com/
Version: 1.0
*/

// We Use OCMM (Oodles Custom Media Metaboxes) prefix for our function for make them unique


/* Admin Menu Page  */

function ocmm_admin_menu(){
    add_menu_page('Oodles Media Metabox','Oodles Media Metabox','manage_options','oodles_cstm_metabox','oodles_media_metabox_fcn',
        'dashicons-nametag',
        40
    );
}
add_action( 'admin_menu', 'ocmm_admin_menu');

/**********************************/


/************** Form Page *******************/
function oodles_media_metabox_fcn()
{
  ?>
      <div class="wrap">
  
         <form method="post" action="options.php">
            <?php
               settings_fields("ocmm_group");
  
               do_settings_sections("oodles_cstm_metabox");
                 
               submit_button(); 
            ?>
         </form>
      </div>
      <div style="width:500px;">
        <h4>For Show Custom Metabox image use below function</h4>  

      <div style="background: #ffffff; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;"><pre style="margin: 0; line-height: 125%">get_post_meta(<span style="color: #FF0000; background-color: #FFAAAA">$</span>post<span style="color: #333333">-&gt;</span>ID, <span style="background-color: #fff0f0">&#39;ocmm_post_type_image&#39;</span>, true);
        </pre></div>

    
      </div>
   <?php
}

/**********************************************/

/******************* Settings API ***************************/
function ocmm_settings()
{
    add_settings_section("oodles_cstm_metabox_section","Select Post Type", null,'oodles_cstm_metabox');
    add_settings_field("ocmm_post_type", "Post Type", "ocmm_select_dropdown", "oodles_cstm_metabox", "oodles_cstm_metabox_section");  
    register_setting("ocmm_group", "ocmm_post_type");
}

/*****************************/

/************Convert Multidimentional Array Into single Array ****/
function con_mul_To_single($ar){
    $new_ar = array();
    $i = 0;
  foreach($ar as $val){
    $new_ar[$i] = $val;
    $i++;
  }
  return $new_ar;
}
/**END**/

/********** Select Dropdown for settings *******************/

function ocmm_select_dropdown()
{

    $ocmm_args = array(
        'public'   => true,
     );
       
     $ocmm_output = 'names'; // 'names' or 'objects' (default: 'names')
     $ocmm_operator = 'and'; // 'and' or 'or' (default: 'and')
       
     $ocmm_post_types = get_post_types( $ocmm_args, $ocmm_output, $ocmm_operator );
     

   ?>
        <select name="ocmm_post_type">
        <option value="all" <?php selected(get_option('ocmm_post_type'), 'all'); ?>>All</option>
        <?php 
        foreach($ocmm_post_types as $key => $value){
            if($key == 'attachment'){
                continue;
            }
        ?>
          <option value="<?php echo $key;?>" <?php selected(get_option('ocmm_post_type'), $key); ?>><?php echo $value;?></option>
          
          <?php 
        }
        ?>
        </select>
   <?php
}

add_action("admin_init", "ocmm_settings");

/***********************************/

/********** Meta Box For Image *******************/

function ocmm_meta_boxes(){
    $ocmm_args = array(
    'public'   => true,
    );
    
    $ocmm_output = 'names'; // 'names' or 'objects' (default: 'names')
    $ocmm_operator = 'and'; // 'and' or 'or' (default: 'and')
    
    $ocmm_post_types = get_post_types( $ocmm_args, $ocmm_output, $ocmm_operator );
    $screen = get_option('ocmm_post_type');
    if($screen == 'all'){
        $screen = con_mul_To_single($ocmm_post_types);
        
    }
    add_meta_box( 'ocmm_metabox', 'Optimize Image Metabox', 'ocmm_metabox_fcn', $screen );

}
add_action( 'add_meta_boxes', 'ocmm_meta_boxes' );

/******************************/


/********** Meta Box Form *******************/
function ocmm_metabox_fcn(){
    global $post;
    $url = get_post_meta($post->ID, 'ocmm_post_type_image', true);
    ?>
    <input id="ocmm_image_URL" name="ocmm_image_URL" type="text"
    value="<?php echo $url;?>" style="width:400px;" readonly/>
    
    <input id="my_upl_button" type="button" value="Upload Image" /><br/><br/>
    
    <img src="<?php echo $url;?>" style="width:200px;" id="ocmm_img" />

    <script>
    jQuery(document).ready( function($) {
        var img_src = $("#ocmm_image_URL").attr("src");
        $("#ocmm_img").val()
        frame = wp.media({
            title: 'Select or Upload Media',
            button: {
                text: 'Use this media'
            },
            multiple: false  // Set to true to allow multiple files to be selected
            });
        $("#my_upl_button").click(function () {
            frame.open();
        });
        frame.on( 'select', function() {
      
            // Get media attachment details from the frame state
            var attachment = frame.state().get('selection').first().toJSON();
            $("#ocmm_img").attr("src",attachment.url);
            $("#ocmm_image_URL").val(attachment.url);
        });
    });
    </script>
    <?php
}

/********** END *********/



/************* Save Values ****************/
add_action('save_post', function ($post_id) {
if (isset($_POST['ocmm_image_URL'])){
    update_post_meta($post_id, 'ocmm_post_type_image', $_POST['ocmm_image_URL']);
}

});

/********** END *********/



/********** Function For retrieve Value *********/
// function ocmm_thumbnail_image($id,$post_title = "Default",$class="ocmm_class"){
    
//     $url = get_post_meta($id, 'ocmm_post_type_image', true);

//     $img = '<img class="'.$class.'" src="'.$url.'" alt="'.$post_title.'">';
//     $ts = '<h1>hello</h1>';
//     return $img;

// }

// add_action( 'admin_init', 'ocmm_thumbnail_image' );



