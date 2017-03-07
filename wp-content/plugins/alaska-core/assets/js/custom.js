jQuery(document).ready(function($){
    // Subcribe
    $(document).on('submit', 'form[name="news_letter"]', function(e){
    
    	var $this = $(this);
    	var thisWrap = $this.closest('.newsletter-form-wrap');
    
    	if ( $this.hasClass('processing') ) {
    		return false;
    	}
    
    	var api_key = $this.find('input[name="api_key"]').val();
    	var list_id = $this.find('input[name="list_id"]').val();
    	var success_message = $this.find('input[name="success_message"]').val();
    	var email = $this.find('input[name="email"]').val();
    
    	var data = {
    		action: 'alaska_subcrible_submit',
    		api_key: api_key,
    		list_id: list_id,
    		success_message: success_message,
    		email: email
    	}
    
    	$this.addClass('processing');
    	thisWrap.find('.return-message').remove();
    
    	$.post(ajaxurl, data, function(response){
    
    		if ( $.trim(response['success']) == 'yes' ) {
    			$this.after('<p class="return-message bg-success">' + response['message'] + '</p>');
    			$this.find('input[name="email"]').val('');
    		}
    		else{
    			$this.after('<p class="return-message bg-danger">' + response['message'] + '</p>');
    		}
    
    		//console.log(response);
    
    		$this.removeClass('processing');
    
    	});
    
    	$(".ts-alaska-subscribe").click(function(){
    
        	($(".newsletter-form-wrap").toggleClass("intro"))
    
        });
    
    	e.preventDefault();
    	return false;
    
    });
});
