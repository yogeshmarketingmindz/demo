<?php
add_action('init', function() {

    if (!isset($_COOKIE['utm_source_co'])) {
    	$data = $_GET['utm_source'];
    	$path = parse_url(get_option('siteurl'), PHP_URL_PATH);
    	$host = parse_url(get_option('siteurl'), PHP_URL_HOST);
    	if($path == '')
    	{
    		$path = '/';
    	}
        setcookie('utm_source_co', $data, strtotime('+30 day'), $path, $host);
    }
    else{

    	$available_cookie = $_COOKIE['utm_source_co'];
       	$newsource = $_GET['utm_source'];
    	if($newsource){
    		if (isset($_COOKIE['utm_source_co'])) {
    			$path = parse_url(get_option('siteurl'), PHP_URL_PATH);
    			$host = parse_url(get_option('siteurl'), PHP_URL_HOST);
    			if($path == '')
		    	{
		    		$path = '/';
		    	}
    	   		setcookie('utm_source_co', $newsource, strtotime('+30 day'), $path, $host);
    		}
    	}

    }

});
// Creating the widget

class wpb_widget extends WP_Widget {



function __construct() {

parent::__construct(

// Base ID of your widget

'wpb_widget',

 

// Widget name will appear in UI

__('Zoho Form', 'wpb_widget_domain'),

 

// Widget description

array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain' ), )

);

}


// This is where the action happens

public function widget( $args, $instance ) {

$title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes

echo $args['before_widget'];

if ( ! empty( $title ) )

echo $args['before_title'] . $title . $args['after_title'];

 

// This is where you run the code and display the output

//echo __( 'Hello, World!', 'wpb_widget_domain' );
$cookies = $_COOKIE['utm_source_co'];
$utm = $_GET['utm_source'];
if($cookies && !$utm) { 
  	$data = $_COOKIE['utm_source_co'];
  
}
else
{
	$data = $_GET['utm_source'];
	
}
?>

<div id='crmWebToEntityForm' style='width:600px;margin:auto;'>
   
  <!--  <form action='https://crm.zoho.com/crm/WebToLeadForm' name=WebToLeads1034225000008473049 method='POST' onSubmit='javascript:document.charset="UTF-8"; return checkMandatory()' accept-charset='UTF-8'> -->
   <form action='https://crm.zoho.com/crm/WebToLeadForm' name=WebToLeads1034225000008473049 method='POST' onsubmit="return(checkMandatory());" accept-charset='UTF-8'>

	 <!-- Do not remove this code. -->
	<input type='text' style='display:none;' name='xnQsjsdp' value='95007a9a8779a4be6ae5cdcf3e210c453cd00783ac7f09914c76dbe67e521b0d'/>
	<input type='hidden' name='zc_gad' id='zc_gad' value=''/>
	<input type='text' style='display:none;' name='xmIwtLD' value='7a04cad070193e4b4128ce824e1b581863f87c7624c505009f4e61d0aa3bbbca'/>
	<input type='text' style='display:none;'  name='actionType' value='TGVhZHM='/>

	<?php $url = home_url('/thank-you/'); ?>
	<input type='text' style='display:none;' name='returnURL' value='<?php echo $url; ?>' /> 
	 <!-- Do not remove this code. -->
	


		
 		
<div id="Next-form">
	<div class="main-table">
            <?php
                if($data){ 
		        	echo "<input type='hidden' value='$data'  maxlength='80' name='Lead Source' />"; 
	        	}
	        ?>
		<div class="Learn-div"><h4>How Can FastPBX Phone Services Work For You?</h4></div>
		<div class="new-border">
			<div class="input-lable">
				<input type='text' placeholder="Name" id="name" value=''  maxlength='80' />
				<input type='hidden' id="firstname" value='' name='First Name' />
				<input type='hidden' id="lastname" value='' name='Last Name' />
			</div>
			<div class="input-lable">
				<input type='text' placeholder="Email" id="email"  maxlength='100' name='Email' />
			</div>
			<div class="input-lable">
				<input type='text'  placeholder="Phone" id="phone-number-field" maxlength='12' name='Phone' onkeypress='addDashes(this)' />
			</div>
			<div class="chech_box_div">
				<div class="check_panel">
				<!--<input type='checkbox' id="ch1"  name='LEADCF103' checked /><span class="check_pan_left" >Also Email Me Info About</span> -->
				<span class="check_pan_left mm-check" >Contact Me About:</span>   
				</div>
				<div class="check_panel"><input type='checkbox' id="ch2"  name='LEADCF102' checked /><span class="check_pan_left">Business Phone Services</span>
				</div>
				<div class="check_panel"><input type='checkbox' id="ch3"  name='LEADCF109' checked /><span class="check_pan_left">Phone Hardware</span>
				</div>
				<div class="check_panel"><input type='checkbox' id="ch4"  name='LEADCF106' checked /><span class="check_pan_left">Reseller Partner Program</span>
				</div>
				
			</div>
			<div class="Learn-div"><input type='submit' value='Learn More' /></div>
			</div>
	</div>
</div>
	<script>


		jQuery( document ).ready(function() {
			jQuery('#phone-number-field').mask("999-999-9999");

			jQuery('#ch1').click(function(){
				var ch = jQuery('#ch1').attr('checked');
				
					if (ch != "checked") {
						jQuery('#ch2').attr('checked', false);
						jQuery('#ch3').attr('checked', false);
						jQuery('#ch4').attr('checked', false);

					}
			});

			//code for first name and last name value
			jQuery('#name').focusout(function(){
				var firstname = '';
				var lastname = '';
				var fullname = jQuery('#name').val();
				var brek = fullname.split(" ");
				var firstname = brek[0];

				if(brek[2] == undefined)
				{
					var nam = "";
				}
				else{
					var nam = brek[2];
				}

				if(brek[1] == undefined)
				{
					var nam2 = "";
				}
				else{
					var nam2 = brek[1];
				}
				
				
				var lastname = nam2 +' '+ nam;
				jQuery('#firstname').val(firstname); 
				if(lastname){
					jQuery('#lastname').val(lastname);
				}
				/*else{
					jQuery('#lastname').val('-');
				}*/
			
			});
		});
 
		var mndFileds=new Array('Last Name','Email','Phone');
		var fldLangVal=new Array('Name','Email','Phone');
		var name='';
		var email='';
		var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		function validateEmail($email) {
		  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		  return emailReg.test( $email );
		}

		function isNumber(n) {
			return !isNaN(parseFloat(n)) && isFinite(n);
		}
		

 	  	function checkMandatory() {

 	  		//Validation for name
 	  		var Name = document.getElementById('name').value;
 	  		var Flname = jQuery("#name").val().match(/^([a-zA-Z]+)\s+([a-zA-Z]+)$/);
 	  		if( Name == "")
	         {
	            alert( "Please Enter your Name!" );
	            document.getElementById("name").focus();
	            return false;
	         }
	         else{
	         	var name1 = jQuery( "#name" ).val();
	         	if(!isNaN(name1))
	        	{
	        		alert("Please Enter only words");
	        		document.getElementById("name").focus();
	            	return false;
	        	}

	         	
	         }
	         
         	if(!Flname){
	         	alert( "Please Enter your Last Name!" );
	            document.getElementById("name").focus();
	            return false;
         	}

	         //Validation for Email
 	  	
	 	  	if( document.WebToLeads1034225000008473049.Email.value == "" ){
	            alert( "Please Enter your Email!" );
	            document.WebToLeads1034225000008473049.Email.focus() ;
	            return false;
         	}
	        else{
	        	var mail = jQuery( "#email" ).val();
	        	if( !validateEmail(mail)){
	        		alert("Invalid email");
	        		document.WebToLeads1034225000008473049.Email.focus() ;
	            	return false;
	        	}
	        		           
	        }

	        //Validation for Phone

	        if( document.WebToLeads1034225000008473049.Phone.value == "" ){
	            alert( "Please Enter your Phone!" );
	            document.WebToLeads1034225000008473049.Phone.focus() ;
	            return false;
         	}
         	else{
	         	var phone = jQuery( "#phone-number-field" ).val().match(/^\d+(-\d+)*$/);
	         	if(!phone){
	        		alert("Please Enter only number");
	        		document.WebToLeads1034225000008473049.Phone.focus() ;
	            	return false;
	        	}
	        	else{
	        		var myLength = jQuery("#phone-number-field").val().length;
		        		if(myLength != 12){
		        			alert("Please Enter 10 digits numbers!");
		        		}
	        		
	        	}

	         	
	         }
        
	
	   }
	 
	   
	   
</script>
	</form>
</div>
<?php echo $args['after_widget']; }

         

// Widget Backend

public function form( $instance ) {

if ( isset( $instance[ 'title' ] ) ) {

$title = $instance[ 'title' ];

}

else {

$title = __( 'New title', 'wpb_widget_domain' );

}

// Widget admin form

?>

<p>

<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>

<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />

</p>

<?php

}

     

// Updating widget replacing old instances with new

public function update( $new_instance, $old_instance ) {

$instance = array();

$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

return $instance;

}

} // Class wpb_widget ends here

 

// Register and load the widget

function wpb_load_widget() {

    register_widget( 'wpb_widget' );

}

add_action( 'widgets_init', 'wpb_load_widget' );

?>