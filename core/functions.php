<?php
/**
 * Questions post type
 * @return string 
 */
function community_qa_get_posttype(){
   return 'questions' ;
    
}


/**
 * Get custom post type capabilty tag
 * @return string 
 */
function community_qa_get_capabilities_tag(){
    return 'post';
}


/**
 * posted question using ajax
 */

add_action("wp_ajax_post_question_action", "community_qa_post_question");

function community_qa_post_question() {
   
   
    $title = $_POST['title'];
    $description = $_POST['description'];
    $tags = $_POST['post_tags'];
    //$catid = $_POST['catid'];
    //$catname = get_cat_name($catid);
   
    if (empty($title) || empty($description) || empty($tags)) {
        
        $message = array('message' => "Please fill required field", 'status' => 'error');
        echo json_encode($message);
       
        exit(0);
    }

    

	// ADD THE FORM INPUT TO $post_question ARRAY
	$post_question = array(
	'post_title'	=>	$title,
	'post_content'	=>	$description,
	'tags_input'	=>	array($tags),
       // 'post_category'	=>	 $catname,
	'post_status'	=>	'publish',           // Choose: publish, preview, future, draft, etc.
	'post_type'	=>	 community_qa_get_posttype()  //'post',page' or use a custom post type if you want to
	);

	//SAVE THE POST
	$pid = wp_insert_post($post_question);

        //SET OUR TAGS UP PROPERLY
	wp_set_post_tags($pid, $_POST['post_tags']);


   
    
    echo json_encode(array('message' => 'Question posted successfully', 'status' => 'success'));
    exit(0);
    
}


?>
