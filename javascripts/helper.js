$(document).ready(function($){


		if($('#errmsgs').html() == ''){
				$('#errmsgs').hide();
		}


});
function validater(o){

	if($('#email').val() == ''){
	$('#errmsgs').html('mail required');
	$('#errmsgs').show();
		return false;
	}
		if($('#pword').val() == ''){
	$('#errmsgs').html('password required');
	$('#errmsgs').show();
		return false;
	}
	
	return true;
}
function postvalidater(o){

	if($('#title').val() == ''){
	$('#errmsgs').html('title required');
	$('#errmsgs').show();
		return false;
	}
		if($('#content').val() == ''){
	$('#errmsgs').html('content required');
	$('#errmsgs').show();
		return false;
	}
	
	return true;
}