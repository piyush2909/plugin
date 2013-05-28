 function validation(){
   var name = document.getElementById('nw_name').value;
	var email = document.getElementById('nw_email').value;
	if(name == ""){
		alert("Sorry, you did not enter all the required fields.Please try again.");
	return false;	
	}
	else if(email == ""){
		alert("Sorry, you did not enter all the required fields.Please try again.");
	return false;	
	}
	else{
		var name = document.getElementById('nw_name').value;
		var email = document.getElementById('nw_email').value;
		jQuery.ajax({
		type: 'POST',
		url: pluginurl+'/news_class.php',
		data: {
		action:'insert_newslatter',
		name:name,
		email:email
		
		},
		success: function(data){
		jQuery("#successful").html(data);
		},
		
		});
		
		return true;	
	}
}
 jQuery(document).ready(function(){
	if (getCookie('hide') == "true")
	{
		jQuery("#mainform").hide();     
	}
	else{	
		setCookie('hide', "true", 2);
		setTimeout( "jQuery('#mainform').show('100');",10);
	}
});
function cnacle(){
		document.getElementById( 'mainform' ).style.display = 'none';
	}
		function setCookie(c_name,value,exdays)
		{
			var exdate=new Date();
			exdate.setDate(exdate.getDate() + exdays);
			var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
			document.cookie=c_name + "=" + c_value;
		}
		function getCookie(c_name)
		{
			var c_value = document.cookie;
			var c_start = c_value.indexOf(" " + c_name + "=");
			if (c_start == -1)
			{
				c_start = c_value.indexOf(c_name + "=");
			}
			if (c_start == -1)
			{
				c_value = null;
			}
			else
			{
				c_start = c_value.indexOf("=", c_start) + 1;
				var c_end = c_value.indexOf(";", c_start);
				if (c_end == -1)
				{
					c_end = c_value.length;
				}
				c_value = unescape(c_value.substring(c_start,c_end));
			}
			return c_value;
		}
