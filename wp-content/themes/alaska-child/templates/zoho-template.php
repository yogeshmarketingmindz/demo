<?php
	/**
	* Template Name: loginpage
	*
	* @author ThemeStudio
	* @package Alaska
	* @since 1.0.0
	*/
get_header();
global $ts_alaska, $post;
?>
<!-- Note :
   - You can modify the font style and form style to suit your website. 
   - Code lines with comments “Do not remove this code”  are required for the form to work properly, make sure that you do not remove these lines of code. 
   - The Mandatory check script can modified as to suit your business needs. 
   - It is important that you test the modified form before going live.-->
<div id='crmWebToEntityForm' style='width:600px;margin:auto;'>
   <META HTTP-EQUIV ='content-type' CONTENT='text/html;charset=UTF-8'>
   <form action='https://crm.zoho.com/crm/WebToLeadForm' name=WebToLeads1034225000008473049 method='POST' onSubmit='javascript:document.charset="UTF-8"; return checkMandatory()' accept-charset='UTF-8'>

	 <!-- Do not remove this code. -->
	<input type='text' style='display:none;' name='xnQsjsdp' value='95007a9a8779a4be6ae5cdcf3e210c453cd00783ac7f09914c76dbe67e521b0d'/>
	<input type='hidden' name='zc_gad' id='zc_gad' value=''/>
	<input type='text' style='display:none;' name='xmIwtLD' value='7a04cad070193e4b4128ce824e1b581863f87c7624c505009f4e61d0aa3bbbca'/>
	<input type='text' style='display:none;'  name='actionType' value='TGVhZHM='/>

	<input type='text' style='display:none;' name='returnURL' value='http&#x3a;&#x2f;&#x2f;compliance.xl.fastpbx.com&#x2f;' /> 
	 <!-- Do not remove this code. -->
	<style>
		tr , td { 
			padding:6px;
			border-spacing:0px;
			border-width:0px;
			}
	</style>
	



	<input type='text' style='width:250px;'  maxlength='80' name='Last Name' />

	<input type='text' style='width:250px;'  maxlength='100' name='Email' />

	<input type='text' style='width:250px;'  maxlength='30' name='Phone' />
	<input type='checkbox'  name='LEADCF102' />

	<input type='checkbox'  name='LEADCF109' />

	<input type='checkbox'  name='LEADCF106' />

	<input type='checkbox'  name='LEADCF103' />

	
		<input style='font-size:12px;color:#131307' type='submit' value='Submit' />
		
	    
	
	<script>
 	  var mndFileds=new Array('Last Name','Email','Phone');
 	  var fldLangVal=new Array('Name','Email','Phone');
		var name='';
		var email='';

 	  function checkMandatory() {
		for(i=0;i<mndFileds.length;i++) {
		  var fieldObj=document.forms['WebToLeads1034225000008473049'][mndFileds[i]];
		  if(fieldObj) {
			if (((fieldObj.value).replace(/^\s+|\s+$/g, '')).length==0) {
			 if(fieldObj.type =='file')
				{ 
				 alert('Please select a file to upload.'); 
				 fieldObj.focus(); 
				 return false;
				} 
			alert(fldLangVal[i] +' cannot be empty.'); 
   	   	  	  fieldObj.focus();
   	   	  	  return false;
			}  else if(fieldObj.nodeName=='SELECT') {
  	   	   	 if(fieldObj.options[fieldObj.selectedIndex].value=='-None-') {
				alert(fldLangVal[i] +' cannot be none.'); 
				fieldObj.focus();
				return false;
			   }
			} else if(fieldObj.type =='checkbox'){
 	 	 	 if(fieldObj.checked == false){
				alert('Please accept  '+fldLangVal[i]);
				fieldObj.focus();
				return false;
			   } 
			 } 
			 try {
			     if(fieldObj.name == 'Last Name') {
				name = fieldObj.value;
 	 	 	    }
			} catch (e) {}
		    }
		}
	     }
	   
</script>
	</form>
</div>
<?php get_footer(); ?>