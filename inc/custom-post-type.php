<?php

function create_posttype() {


  $labels = array(
    'name' => 'News',
    'singular_name' => 'news'
  );

  $supports = array(
    'title',
    'editor',
    'author',
    'thumbnail'
  );

  $args = array(
    'labels' => $labels,
    'supports' => $supports,
    'taxonomies' => array('category', 'post_tag'),
    'hierarchical'        => false,
    'has_archive'         => true,
    'public'              => true,
    'capability_type'     => 'post'
  );


  register_post_type('news', $args);
}
    // Hooking up our function to theme setup
    add_action( 'init', 'create_posttype' );
    /* Custom Post Type End */