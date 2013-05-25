 <script>
  $(function() {
    $( "#options" ).tabs({
      collapsible: true,
    });
    $( "#options_save" )
      .button({
      icons: {
        primary: "ui-icon-locked",
      },
      text: false
    });
      });	
  </script>
  <style>
	#options_save
	{
		float: right;
	}
  </style>
<body>
<div id='options'>
	<form action='writefiles' method='POST'>
		<ul>
			<li><a href='#home'>home</a></li>
			<li><a href='#vacatures'>vacatures</a></li>
			<input id='options_save' type='submit' value='save all files'>
		</ul>
		<div id='home'>
			<textarea name='home' class='wysiwygBig'><?php include '../application/views/users/home.php' ?></textarea>
		</div>
		<div id='vacatures'>
			<textarea name='vacatures' class='wysiwygBig'><?php include '../application/views/users/vacatures.php' ?></textarea>
		</div>
	</form>
</div>