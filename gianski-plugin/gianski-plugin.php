<?php
/**
* @package GianskiPlugin
*/

/*
Plugin Name: Gianski Plugin - Portfolio Post Type
Plugin URI: http://www.gianski.xyz
Description: Portfolio post type for Gianski Theme
Version: 1.0.0
Author: Gian Bancod
Author URI: http://www.gianski.xyz
License: GPLv2 or later
Text Domain: gianski-plugin
*/

defined('ABSPATH') or die('Tangina mo!');

class GianskiPlugin{
  function __construct(){
    add_action('init', array($this, 'portfolio_post_type'));
  }
  function activate(){

  }
  function deactivate(){

  }
  function uninstall(){

  }
  function portfolio_post_type(){
    $labels = array(
      'name' => 'Portfolio',
      'singular_name' => 'Portfolio',
      'add_new' => 'Add Item',
      'all_items' => 'All Items',
      'add_new_item' => 'Add Item',
      'edit_item' => 'Edit Item',
      'new_item' => 'New Item',
      'view_item' => 'View Item',
      'search_item' => 'Search Portfolio',
      'not_found' => 'No items found',
      'not_found_in_trash' => 'No items found in trash',
      'parent_item_colon' => 'Parent Item'
    );
    $args = array(
      'labels' => $labels,
      'public'  => true,
      'has_archive' => true,
      'publicly_queryable' => true,
      'query_var' => true,
      'rewrite' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
      'supports' => array(
        'title',
        'editor',
        'excerpt',
        'thumbnail',
        'revisions',
      ),
      'taxonomies' => array('category','post_tag'),
      'menu_position' => 5,
      'exclude_from_search' => false
    );
    register_post_type('portfolio', $args);
  }
}

if (class_exists('GianskiPlugin')){
  $gianskiPlugin = new GianskiPlugin();
}

//activation
register_activation_hook( __FILE__, array($gianskiPlugin, 'activate') );

//deactivation
register_deactivation_hook( __FILE__, array($gianskiPlugin, 'deactivate') );
