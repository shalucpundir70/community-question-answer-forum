//@link http://digwp.com/2010/12/login-register-password-code/
/**
 * 
 */
jQuery(document).ready(function() {
         
         
       
        //post question using ajax
        
        jQuery("#post_question").submit( function() {
            var title = jQuery("#title").val();
            var description = jQuery("#description").val();
            var post_tags = jQuery("#post_tags").val();
            var catid =  jQuery("#cat").val();
           
            jQuery.post('http://localhost/latestwp/wp-admin/admin-ajax.php',
            {
                action: "post_question_action",
                title : title,
                description:description,
                post_tags :post_tags,
                catid :catid
                
                
            },
            function(response) {
                console.log(response);
               if(response.status === "success") {
                    // do something with response.message or whatever other data on success
                    jQuery('.message').html("<div class='updated'>"+response.message+"</div>");
                    jQuery('#site_domain').val(" ");

                    jQuery('.viewtoken').show();

                } else if(response.status === "error") {
                    // do something with response.message or whatever other data on error
                    jQuery('.message').html("<div class='alert alert-error'><a class='close' data-dismiss='alert' href='#'>×</a>"+response.message+"</div>");
                }
            },"json");

            return false;
              
        });
      
        jQuery(".tab_content_login").hide();
        jQuery("ul.tabs_login li:first").addClass("active_login").show();
        jQuery(".tab_content_login:first").show();
        jQuery("ul.tabs_login li").click(function() {
                jQuery("ul.tabs_login li").removeClass("active_login");
                jQuery(this).addClass("active_login");
                jQuery(".tab_content_login").hide();
                var activeTab = jQuery(this).find("a").attr("href");
                if (jQuery.browser.msie) {jQuery(activeTab).show();}
                else {jQuery(activeTab).show();}
                return false;
        });
        
        
        //jQuery("#new_post").validate();
});



