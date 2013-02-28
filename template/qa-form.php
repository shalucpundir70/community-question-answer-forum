<?php
/**
 * question and answer form
 * 
 * @link http://voodoopress.com/how-to-post-from-your-front-end-with-no-plugin/ 
 */

?>
<div class="message"></div>
<form id="post_question" name="qaf_new_post" method="post" action="" class="qaf-form" enctype="multipart/form-data">
	<!-- post name -->
        <div class="control-group">
            <div class="controls">
                <div class="input-prepend">
                    <span class="add-on">Title</span>
                    <input class="span2" name="title" id="title" type="text">
                </div>
                <p class="help-block">This field required*</p>
            </div>
        </div>

         <div class="control-group">
          <label class="control-label">Description</label>
          <div class="controls">
            <div class="textarea">
                  <textarea type="" class="" name="description" id="description"> </textarea>
            </div>
          </div>
         </div>
        
        <!-- list category -->
        <div class="control-group">
          <label class="control-label">Select Category</label>
          <div class="controls">
            <?php wp_dropdown_categories( 'tab_index=10&taxonomy=category&hide_empty=0' ); ?>
          </div>
        </div>
        
	<!-- tags -->
        <div class="control-group">
          <label class="control-label">Tags:(seprated by comma)</label>
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on">Tags</span>
              <input class="span2" id="post_tags" type="text" name="post_tags">
            </div>
            
          </div>
        </div>

        
         <div class="control-group">
        
              <button type="submit" class="btn btn-primary">Post Your Question</button>
              <button type="button" class="btn">Cancel</button>
            
        </div>

	<input type="hidden" name="action" value="qaf_new_post" />
	<?php wp_nonce_field( 'post_question' ); ?>
</form>



<?php


/*
if(isset($_POST['title'])){
    $title = $_POST['title'];
}
if(isset($_POST['description'])){
    
    $description = $_POST['description'];
}
if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "qaf_new_post") {
       

	$tags = $_POST['post_tags'];

	// ADD THE FORM INPUT TO $new_post ARRAY
	$new_post = array(
	'post_title'	=>	$title,
	'post_content'	=>	$description,
	'post_category'	=>	array($_POST['cat']),  // Usable for custom taxonomies too
	'tags_input'	=>	array($tags),
	'post_status'	=>	'publish',           // Choose: publish, preview, future, draft, etc.
	'post_type'	=>	community_qa_get_posttype()  //'post',page' or use a custom post type if you want to
	);

	//SAVE THE POST
	$pid = wp_insert_post($new_post);

        //SET OUR TAGS UP PROPERLY
	wp_set_post_tags($pid, $_POST['post_tags']);

	

} // END THE IF STATEMENT THAT STARTED THE WHOLE FORM

//POST THE POST YO
*/

?>