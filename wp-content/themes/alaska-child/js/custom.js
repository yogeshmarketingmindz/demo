jQuery(document).ready(function(){

	/*using display login toggle from*/
    jQuery("#Login_frm_mm").hide();
    jQuery("#login").click(function(){
        jQuery("#Login_frm_mm").slideToggle(1000);
    });
	
	//......................................................................

    //Add id in mobile...

    width = jQuery( window ).width();
   
    if(width > 1024){
         jQuery('.nav-menu ul li a').removeAttr('data-toggle');  
    }
    
    if(width <= 480){
			jQuery('#mm_cont').attr('id', 'zoho_cont');
   		jQuery('.vc_custom_1482485961201').attr('id', 'zoho_cont11');

		}
     jQuery( ".ts-main-recent-post p" ).append( "..." );

    //......................................................................
    
     //Voip-reseller page in reseller checkbox.
     jQuery('.reseller #ch2').attr('checked', false);
     jQuery('.reseller #ch3').attr('checked', false);
});

