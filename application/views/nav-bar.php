	<form id='radio'>
	<input type="radio" id="radio1" name="radio" /><label for="radio1">home</label>
    <input type="radio" id="radio2" name="radio" /><label for="radio2">pics</label>
    <input type="radio" id="radio3" name="radio" /><label for="radio3">vids</label>
    <input type="radio" id="radio4" name="radio" /><label for="radio4">blog</label>
    <input type="radio" id="radio5" name="radio" /><label for="radio5">music</label>
    <input type="radio" id="radio6" disabled name="radio" /><label for="radio6">tour</label>
    <input type="radio" id="radio7" disabled name="radio" /><label for="radio7">downloads</label>
    <input type="radio" id="radio9" disabled name="radio" /><label for="radio9">faq</label>
    <input type="radio" id="radio10" disabled name="radio" /><label for="radio10">questions</label>
	<?php if (! isset ($_SESSION['userrole']))
	{
		echo '<input type="radio" id="radio11" name="radio" /><label for="radio11">login</label>'	;
	} 
	else 
	{
		echo '<input type="radio" id="radio12" name="radio" /><label for="radio12">logout</label>'	;
	} ?>
	
	<script>
  $(function() {
    $( "#radio" ).buttonset();
	$("#radio1").button( { icons: {primary:'ui-icon-home'}, text : false } ).click(function(){window.location.assign("<?php echo BASE_URL; ?>/users/homepage");	});
	$("#radio2").button( { icons: {primary:'ui-icon-image'}, text : false } ).click(function(){window.location.assign("<?php echo BASE_URL; ?>/users/pics");	});
	$("#radio3").button( { icons: {primary:'ui-icon-video'}, text : false } ).click(function(){window.location.assign("<?php echo BASE_URL; ?>/users/vids");	});
	$("#radio4").button( { icons: {primary:'ui-icon-info'}, text : false } ).click(function(){window.location.assign("<?php echo BASE_URL; ?>/users/blog");	});
	$("#radio5").button( { icons: {primary:'ui-icon-volume-on'}, text : false } ).click(function(){window.location.assign("<?php echo BASE_URL; ?>/users/music");	});
	$("#radio6").button( { icons: {primary:'ui-icon-search'}, text : false } ).click(function(){window.location.assign("<?php echo BASE_URL; ?>/users/tour");	});
	$("#radio7").button( { icons: {primary:'ui-icon-arrowthick-1-s'}, text : false } ).click(function(){window.location.assign("<?php echo BASE_URL; ?>/users/downloads");	});
	$("#radio8").button( { icons: {primary:'ui-icon-gear'}, text : false } ).click(function(){window.location.assign("<?php echo BASE_URL; ?>/users/options");	});
	$("#radio9").button( { icons: {primary:'ui-icon-notice'}, text : false } ).click(function(){window.location.assign("<?php echo BASE_URL; ?>/users/faq");	});
	$("#radio10").button( { icons: {primary:'ui-icon-help'}, text : false } ).click(function(){window.location.assign("<?php echo BASE_URL; ?>/users/questions");	});
	<?php if (! isset ($_SESSION['userrole']))
	{ echo"
	$('#radio11').button( { icons: {primary:'ui-icon-power'}, text : false } ).click(function(){	$('#dialogform_login').dialog('open');	});
	"; }
	else
	{
	echo "
	$('#radio12').button( { icons: {primary:'ui-icon-power'}, text : false } ).click(function(){window.location.assign('".BASE_URL."/users/logout');	});
	"; 
	} ?>
	$('#dialogform_login').dialog(
		{
			width: 400,
			autoOpen:false,
			modal:true
		});
	$('#submitLogin').button();
		
		
  });
  </script>
</form>
<div id='dialogform_login'>
<table>
	<form action='<?php echo BASE_URL; ?>/users/login' method='post' >
		<tr>
			<td>gebruikersnaam</td>
			<td><input type='text' name='username' /></td>
		</tr>
		<tr>
			<td>wachtwoord</td>
			<td><input type='password' name='password' /></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input id='submitLogin' type='submit' name='submit' value='login' /></td>
		</tr>	
	</form>
</table>
</div>
  