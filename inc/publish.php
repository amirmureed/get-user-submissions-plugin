<?php

function my_ajax_handler() {

    $post_title = $_POST['title'];
    $image = $_POST['image'];
    $post_content = $_POST['content'];
    $post_id = $_POST['catid'];

    $new_post = array(
    'post_title' => $post_title,
    'post_content' => $post_content,
    'post_status' => 'publish',
    'post_name' => 'blog',
    'post_type' => 'post',
    'post_category' => array($post_id)
    );
    
    if ( !is_wp_error( $new_post ) ) {
        $pid = wp_insert_post($new_post);
        add_post_meta($pid, 'meta_key', true);
        echo "success";
    }else{
        $error_string = $result->get_error_message();
        echo '<div id="message" class="error"><p>' . $error_string . '</p></div>';
    }

    if (!function_exists('wp_generate_attachment_metadata'))
    {
    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
    require_once(ABSPATH . "wp-admin" . '/includes/media.php');
    }
    if ($_FILES)
    {
    foreach ($_FILES as $file => $array)
    {
        if ($_FILES[$file]['error'] !== UPLOAD_ERR_OK)
        {
        return "upload error : " . $_FILES[$file]['error'];
        }
        $attach_id = media_handle_upload( $file, $pid );
    }
    }
    if ($attach_id > 0)
    {
    //and if you want to set that image as Post then use:
    update_post_meta($pid, '_thumbnail_id', $attach_id);
    }
    die();
  }
  
  add_action("wp_ajax_my_ajax_handler", "my_ajax_handler");
  add_action("wp_ajax_nopriv_my_ajax_handler", "my_ajax_handler");
?>