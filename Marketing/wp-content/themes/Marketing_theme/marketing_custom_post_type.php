<?php
add_action( 'init', 'marketing_register_relevant_work' );

function marketing_register_relevant_work() {
    $marketing_labels = array(  'name' => _x( 'Relevant Work', 'marketing_textdomain' ), 'singular_name' => _x( 'Relevant Work', 'marketing_textdomain' ), 'add_new' => _x( 'Add New', 'marketing_textdomain' ), 'add_new_item' => _x( 'Add New Relevant Work', 'marketing_textdomain' ), 'edit_item' => _x( 'Edit Relevant Work', 'marketing_textdomain' ), 'new_item' => _x( 'New Relevant Work', 'marketing_textdomain' ), 'view_item' => _x( 'View Relevant Work', 'marketing_textdomain' ), 'search_items' => _x( 'Search Relevant Work', 'marketing_textdomain' ), 'not_found' => _x( 'No Relevant Work found', 'marketing_textdomain' ), 'not_found_in_trash' => _x( 'No Relevant Work found in Trash', 'marketing_textdomain' ), 'parent_item_colon' => _x( 'Parent Relevant Work:', 'marketing_textdomain' ), 'menu_name' => _x( 'Relevant Work', 'marketing_textdomain' ), 'all_items' => _x( 'All Relevant Work', 'marketing_textdomain' ), );

    $marketing_args = array(  'labels' => $marketing_labels, 'capabilities' => array( 'publish_posts' => 'manage_options', 'edit_posts' => 'manage_options', 'edit_others_posts' => 'manage_options', 'delete_posts' => 'manage_options', 'delete_others_posts' => 'manage_options', 'read_private_posts' => 'manage_options', 'edit_post' => 'manage_options', 'delete_post' => 'manage_options', 'read_post' => 'manage_options', ), 'hierarchical' =>TRUE, 'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments','page-attributes' ), 'public' => true, 'show_ui' => true, 'show_in_menu' => true, 'show_in_nav_menus' => true, 'publicly_queryable' => true, 'exclude_from_search' => FALSE, 'query_var' => true, 'can_export' => true, 'rewrite' => array('slug' => 'relevant_work','with_front' => false), 'capability_type' => 'post');
    // Add new taxonomy,
    $marketing_taxlabls = array( 'name' => _x( 'Relevant Work Category', 'taxonomy Display name' ), 'singular_name' => _x( 'Relevant Work Category', 'taxonomy Display name' ), 'search_items'  => __( 'Search Relevant Work Category' ), 'popular_items'   => __( 'Popular Relevant Work Category' ), 'all_items'  => __( 'All Relevant Work Category' ), 'parent_item'    => null, 'parent_item_colon'    => null, 'edit_item'    => __( 'Edit Relevant Work Category' ), 'update_item'   => __( 'Update Relevant Work Category' ), 'add_new_item'    => __( 'Add New Relevant Work Category' ), 'new_item_name'  => __( 'New Relevant Work Category Name' ), 'separate_items_with_commas'  => __( 'Separate Relevant Work Category with commas' ), 'add_or_remove_items' => __( 'Add or remove Relevant Work Category' ), 'choose_from_most_used'   => __( 'Choose from the most used Relevant Work Category' ), 'not_found'   => __( 'No Relevant Work Category found.' ), 'menu_name'   => __( 'Relevant Work Category' ), );
    $marketing_taxargs = array( 'hierarchical'  => TRUE, 'labels'  => $marketing_taxlabls, 'show_ui' => true, 'show_admin_column'   => true, 'update_count_callback'   => '_update_post_term_count', 'query_var'   => true, 'rewrite' => array( 'slug' => 'relevant_work_category' ), );
    register_taxonomy('relevant_work_category','relevant_work',$marketing_taxargs );
    register_post_type( 'relevant_work', $marketing_args );
    flush_rewrite_rules();
}



add_action( 'init', 'marketing_register_blog' );
function marketing_register_blog() {
    $marketing_labels = array(  'name' => _x( 'Blog', 'marketing_textdomain' ), 'singular_name' => _x( 'Blog', 'marketing_textdomain' ), 'add_new' => _x( 'Add New', 'marketing_textdomain' ), 'add_new_item' => _x( 'Add New Blog', 'marketing_textdomain' ), 'edit_item' => _x( 'Edit Blog', 'marketing_textdomain' ), 'new_item' => _x( 'New Blog', 'marketing_textdomain' ), 'view_item' => _x( 'View Blog', 'marketing_textdomain' ), 'search_items' => _x( 'Search Blog', 'marketing_textdomain' ), 'not_found' => _x( 'No Blog found', 'marketing_textdomain' ), 'not_found_in_trash' => _x( 'No Blog found in Trash', 'marketing_textdomain' ), 'parent_item_colon' => _x( 'Parent Blog:', 'marketing_textdomain' ), 'menu_name' => _x( 'Blog', 'marketing_textdomain' ), 'all_items' => _x( 'All Blog', 'marketing_textdomain' ), );

    $marketing_args = array( 'labels' => $marketing_labels, 'capabilities' => array( 'publish_posts' => 'manage_options', 'edit_posts' => 'manage_options', 'edit_others_posts' => 'manage_options', 'delete_posts' => 'manage_options', 'delete_others_posts' => 'manage_options', 'read_private_posts' => 'manage_options', 'edit_post' => 'manage_options', 'delete_post' => 'manage_options', 'read_post' => 'manage_options',), 'hierarchical' =>TRUE, 'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments','page-attributes' ), 'public' => true, 'show_ui' => true, 'show_in_menu' => true, 'show_in_nav_menus' => true, 'publicly_queryable' => true, 'exclude_from_search' => FALSE, 'query_var' => true, 'can_export' => true, 'rewrite' => array( 'slug' => 'blog', 'with_front' => false ), 'capability_type' => 'post' );

    // Add new taxonomy,
    $marketing_taxlabls = array( 'name' => _x( 'Blog Category', 'taxonomy Display name' ), 'singular_name'  => _x( 'Blog Category', 'taxonomy Display name' ), 'search_items'   => __( 'Search Blog Category' ), 'popular_items'    => __( 'Popular Blog Category' ), 'all_items'   => __( 'All Blog Category' ), 'parent_item' => null, 'parent_item_colon'    => null, 'edit_item'    => __( 'Edit Blog Category' ), 'update_item'    => __( 'Update Blog Category' ), 'add_new_item' => __( 'Add New Blog Category' ), 'new_item_name'   => __( 'New Blog Category Name' ), 'separate_items_with_commas' =>  __( 'Separate Blog Category with commas' ), 'add_or_remove_items'   => __( 'Add or remove Blog Category' ), 'choose_from_most_used' => __( 'Choose from the most used Blog Category' ), 'not_found' => __( 'No Blog Category found.' ), 'menu_name' => __( 'Blog Category' ),
    );
    $marketing_taxargs = array( 'hierarchical'  => TRUE, 'labels'   => $marketing_taxlabls, 'show_ui'   => true, 'show_admin_column'    => true, 'update_count_callback' => '_update_post_term_count', 'query_var'      => true, 'rewrite'  => array( 'slug' => 'blog_category' ),
    );
    register_taxonomy('blog_category','blog',$marketing_taxargs );
    register_post_type( 'blog', $marketing_args );
    flush_rewrite_rules();   
} 

add_action('init', 'blog_support_author');
function blog_support_author() {
    add_post_type_support( 'blog', 'author' );
}

?>