<div id='link'>
	<div id='accent1'></div>
	<ul>
		<li class='homepage' hidden><a href='<?php echo BASE_URL; ?>/users/homepage/home'>home</a></li>
		<li class='homepage' hidden><a href='<?php echo BASE_URL; ?>/users/homepage/vacatures'>vacatures</a></li>
		<li class='admin musician' hidden><a href='<?php echo BASE_URL; ?>/musicians/options'>options</a></li>
		<li class='admin musician' hidden><a href='<?php echo BASE_URL; ?>/musicians/quotes'>add quotes</a></li>
	</ul>
	<div id='accent2'></div>
</div>
<script>
	$('.<?php echo ACTION; ?>').removeAttr('hidden');
	$(".<?php if (isset ($_SESSION['userrole']))
	{
	echo $_SESSION['userrole'];		
	}  ?>").removeAttr('hidden');
</script>