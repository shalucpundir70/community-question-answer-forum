<?php
/*
Plugin Name: Community Questions Answers Forum
Description: This plugin is basically for community based question and answer forum
Author: shalu 
Version: 2.1.4
Author URI: buddydev.com
*/

class CommunityQAHelper{
    private static $instance;
    
    public function __construct(){
        add_action( 'init', array($this,'register_post_type'));
        add_action('plugins_loaded', array($this,'load_module'));
        add_action('wp_enqueue_scripts', array($this, 'load_js')); //load js
        add_action('wp_print_styles', array($this, 'load_css')); //load css
    }
    
    public static function get_instance() {

        if (!isset(self::$instance))
            self::$instance = new self();

        return self::$instance;
    }
    public function register_post_type(){
        
        
        $labels = array(
		'name'               => __( 'Community QA Forum', 'community-qa-forum' ),
		'singular_name'      => __( 'Community QA Forum', 'community-qa-forum' ),
		'add_new'            => __( 'Add New Question', 'community-qa-forum' ),
		'add_new_item'       => __( 'Add New Question','community-qa-forum'),
		'edit_item'          => __( 'Edit Question','community-qa-forum' ),
		'new_item'           => __( 'New Question' ,'community-qa-forum'),
		'all_items'          => __( 'All Questions','community-qa-forum'),
		'view_item'          => __( 'View Question','community-qa-forum'),
		'search_items'       => __( 'Search Questions','community-qa-forum'),
		'not_found'          => __( 'No questions found','community-qa-forum'),
		'not_found_in_trash' => __( 'No questions found in the Trash' ,'community-qa-forum'), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Community QA Forum'
	);
        
        
            $args = array(
		'labels'        => $labels,
		'public' => true,
	        'supports' => array('title','editor','comments','custom-fields'),
	        'taxonomies' => array('post_tag', 'category'),
		'menu_position' => 6,
		'rewrite' => array(
				'slug' => 'community-qa',
				'with_front' => false
			),
		'has_archive' => 'question/recent',
		'capability_type' =>  community_qa_get_capabilities_tag()
	);
           
	register_post_type(community_qa_get_posttype(), $args );	
    }
    
    
    public function load_module(){
        
        include_once 'qa-config.php';
        include_once COMMUNITY_QA_PLUGIN_DIR . '/core/functions.php';
        //include_once COMMUNITY_QA_PLUGIN_DIR . '/template/qa-listquestions.php';
        include_once COMMUNITY_QA_PLUGIN_DIR . '/template/qa-shortcodes.php';
        

        
    }
    function load_js(){
         
         //wp_register_script( 'validation', 'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js', array( 'jquery' ) );
         //wp_enqueue_script( 'validation' );
        
         wp_enqueue_script('community-js', COMMUNITY_QA_PLUGIN_URL . '/_inc/js/qa-forum.js', array('jquery'));
    }
    function load_css() {
       
        wp_register_style('community-qa-css', COMMUNITY_QA_PLUGIN_URL . '/_inc/css/style.css');
        wp_enqueue_style('community-qa-css');
        wp_register_style('bootstrap-css', COMMUNITY_QA_PLUGIN_URL . '/_inc/css/bootstrap.css');
        wp_enqueue_style('bootstrap-css');
        wp_register_style('bootstrap-responsive', COMMUNITY_QA_PLUGIN_URL . '/_inc/css/bootstrap-responsive.css');
        wp_enqueue_style('bootstrap-responsive');
        
        
    }

}
CommunityQAHelper::get_instance();


