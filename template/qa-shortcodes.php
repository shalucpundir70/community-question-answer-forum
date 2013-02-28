<?php
/**
 * Community based ask question 
 * @param type $atts
 * @param type $content 
 */
function community_qa_form($atts, $content = "") {
    
   global $user_ID, $user_identity;
   get_currentuserinfo();
    if (!$user_ID || !is_user_logged_in()) {
        
        include_once('qa-loginform.php');
        
    } else {
        
       // include_once('qa-userprofile.php');
        include_once('qa-form.php');
    } 
    
}

add_shortcode('community_qa_form', 'community_qa_form');


/**
 * List all questions
 * 
 * Add this short code in pages it will list all questions
 * @param type $atts
 * @param type $content 
 */
function community_qa_list_question($atts, $content = ""){
    
   include_once('qa-listquestions.php');
}



add_shortcode('community_qa_list_question','community_qa_list_question');
?>