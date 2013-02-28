<?php
/**
 * question and answer form
 * 
 * @link http://voodoopress.com/how-to-post-from-your-front-end-with-no-plugin/ 
 */

if(isset($_POST['title'])){
    $title = $_POST['title'];
}
if(isset($_POST['description'])){
    
    $description = $_POST['description'];
}
?>

<div class="qaform">
<form id="new_post" name="qaf_new_post" method="post" action="" class="qaf-form" enctype="multipart/form-data">
	<!-- post name -->
	<fieldset name="name">
		<label for="title"><?php _e('Title:','qaf-forum');?></label>
		<input type="text" id="title" value="<?php if ( isset( $_POST['title'] ) ) echo $_POST['title']; ?>" tabindex="5" name="title" class="required"/>
	</fieldset>

	<!-- post Content -->
	<fieldset class="content">
		<label for="description"><?php _e('Description:','qaf-forum');?></label>
		<textarea id="description" value="<?php if ( isset( $_POST['description'] ) ) echo $_POST['description']; ?>" tabindex="15" name="description" cols="80" rows="10" class="required"></textarea>
	</fieldset>
        <!-- post Category -->
	<fieldset class="category">
		<label for="cat"><?php _e('Category:','qaf-forum');?></label>
		<?php wp_dropdown_categories( 'tab_index=10&taxonomy=category&hide_empty=0' ); ?>
	</fieldset>
	<!-- post tags -->
	<fieldset class="tags">
		<label for="post_tags"><?php _e('Tags (comma separated):','qaf-forum');?></label>
		<input type="text" value="" tabindex="35" name="post_tags" id="post_tags" class="required"/>
	</fieldset>

	<fieldset class="submit">
		<input type="submit" value="Post Your Question" tabindex="40" id="submit" name="submit" />
	</fieldset>

	<input type="hidden" name="action" value="qaf_new_post" />
	<?php wp_nonce_field( 'new-post' ); ?>
</form>
</div> <!-- END QAF FORM -->


<?php
global $qaf_post_type;


if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "qaf_new_post") {
       

	$tags = $_POST['post_tags'];

	// ADD THE FORM INPUT TO $new_post ARRAY
	$new_post = array(
	'post_title'	=>	$title,
	'post_content'	=>	$description,
	'post_category'	=>	array($_POST['cat']),  // Usable for custom taxonomies too
	'tags_input'	=>	array($tags),
	'post_status'	=>	'publish',           // Choose: publish, preview, future, draft, etc.
	'post_type'	=>	$qaf_post_type  //'post',page' or use a custom post type if you want to
	);

	//SAVE THE POST
	$pid = wp_insert_post($new_post);

             //SET OUR TAGS UP PROPERLY
	wp_set_post_tags($pid, $_POST['post_tags']);

	

} // END THE IF STATEMENT THAT STARTED THE WHOLE FORM

//POST THE POST YO


?>