<?php
/**
 * @author Eddie Moya
 * 
 * Ajax callback for getting subcategories
 */
function get_subcategories_ajax(){

    if(isset($_POST['category_id'])){
        $parent = absint((int)$_POST['category_id']);

        wp_dropdown_categories(array(
            'depth'=> 1,
            'child_of' => $parent,
            'hierarchical' => true,
            'hide_if_empty' => true,
            'class' => 'input_select',
            'name' => 'sub-category',
            'id' => 'sub-category',
            //'echo' => false
        ));
         exit;
    }
}
add_action('wp_ajax_get_subcategories_ajax', 'get_subcategories_ajax');
add_action('wp_ajax_nopriv_get_subcategories_ajax', 'get_subcategories_ajax');


/**
 * @author Eddie Moya
 * 
 */
function get_template_ajax(){

    if( isset($_POST['template']) ){
        get_template_part($_POST['template']);
    } else {
        echo "<!-- No template selected -->";
    }
    exit;
    
}

add_action('wp_ajax_nopriv_get_template_ajax', 'get_template_ajax');
add_action('wp_ajax_get_template_ajax', 'get_template_ajax');

/**
 * @author Eddie Moya
 * 
 */
function get_posts_ajax(){

    if( isset($_POST['template']) ){
        global $wp_query;
        $wp_query = new WP_Query(array('cat' => $_POST['category']));
        
        loop_by_type($_POST['template']);
        wp_reset_query();


    } else {
        echo "<!-- No template selected -->";
    }


    exit;
    
}

add_action('wp_ajax_nopriv_get_posts_ajax', 'get_posts_ajax');
add_action('wp_ajax_get_posts_ajax', 'get_posts_ajax');