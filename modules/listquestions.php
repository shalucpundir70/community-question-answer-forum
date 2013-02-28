<?php
////allow short codes  [list_questions]
function qaf_list_question($atts,$content = "")
{
	global $qaf_post_type;
        
        $args['post_type'] = $qaf_post_type;
	$args['post_status'] = 'publish';
        $args['post_per_page'] = 5;
       
        $qaf_query =  new WP_Query($args);
       
        if ($qaf_query->have_posts() ){
           /* while ($qaf_query->have_posts() ){
                
                  
                  $question = get_post($qaf_query->post);
                  
                  $listhtml .="<ul class='list-question'>";
                  //$listhtml .= "<li><span class='list-question-title'><a class='list-answer-link' href='" . get_permalink($question->ID) ."'>" . $question->post_title . "</a></span>";
                  
                  $listhtml .="</ul>";
                 }*/
            }
        else{
            $listhtml .= "<ul class='no-question'><li>".__('Apologies, No questions found tll now.','qna-forum')."</li></ul>";
        }
         return $listhtml;
        
}

add_shortcode('qaf_list_questions','qaf_list_question');
?>

