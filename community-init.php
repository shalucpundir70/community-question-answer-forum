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
        add_action( 'init', array($this,'qaf_register_post_type'));
        add_action('plugins_loaded', array($this,'qaf_load_module'));
        add_action('wp_enqueue_scripts', array($this, 'load_js')); //load js
        add_action('wp_print_styles', array($this, 'load_css')); //load css
    }
    
    public static function get_instance() {

        if (!isset(self::$instance))
            self::$instance = new self();

        return self::$instance;
    }
    public function qaf_register_post_type(){
        
        global $qaf_post_type;
        $qaf_post_type = "qaf";
        global $qaf_capabilities_tag;
        $qaf_capabilities_tag = 'post';
        
        $labels = array(
		'name'               => __( 'QA Fourm', 'aqf-forum' ),
		'singular_name'      => __( 'QA Fourm', 'aqf-forum' ),
		'add_new'            => __( 'Add New', 'aqf-forum' ),
		'add_new_item'       => __( 'Add New Question','aqf-forum'),
		'edit_item'          => __( 'Edit Question','aqf-forum' ),
		'new_item'           => __( 'New Question' ,'aqf-forum'),
		'all_items'          => __( 'All Questions','aqf-forum'),
		'view_item'          => __( 'View Question','aqf-forum'),
		'search_items'       => __( 'Search Questions','aqf-forum'),
		'not_found'          => __( 'No questions found','aqf-forum' ),
		'not_found_in_trash' => __( 'No questions found in the Trash' ,'aqf-forum'), 
		'parent_item_colon'  => '',
		'menu_name'          => 'QAFourm'
	);
        
        
            $args = array(
		'labels'        => $labels,
		'public' => true,
	        'supports' => array('title','editor','comments','custom-fields'),
	        'taxonomies' => array('post_tag', 'category'),
		'menu_position' => 6,
		'rewrite' => array(
				'slug' => 'question',
				'with_front' => false
			),
		'has_archive' => 'question/recent',
		'capability_type' =>  $qaf_capabilities_tag
	);
	register_post_type($qaf_post_type, $args );	
    }
    
    
    public function qaf_load_module(){
        include_once 'config.php';
        
        require_once QAF_PLUGIN_DIR . '/modules/questions.php';
        require_once QAF_PLUGIN_DIR . '/modules/listquestions.php';

        
    }
    function load_js(){
         
         // validation
         wp_register_script( 'validation', 'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js', array( 'jquery' ) );
         wp_enqueue_script( 'validation' );
         wp_enqueue_script('qaf-js', QAF_PLUGIN_URL . '/_inc/js/qafourm.js', array('jquery'));
    }
    function load_css() {
       
        wp_register_style('qaf-css', QAF_PLUGIN_URL . '/_inc/css/style.css');
        wp_enqueue_style('qaf-css');
        wp_register_style('bootstrap-css', QAF_PLUGIN_URL . '/_inc/css/bootstrap.css');
        wp_enqueue_style('bootstrap-css');
        wp_register_style('bootstrap-responsive', QAF_PLUGIN_URL . '/_inc/css/bootstrap-responsive.css');
        wp_enqueue_style('bootstrap-responsive');
        
        
    }

}
CommunityQAHelper::get_instance();
