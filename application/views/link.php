<div id='link'>
<<<<<<< HEAD
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
=======
	<ul>
		<?php if ( isset($_SESSION['userrole'] ))
		{
			switch ($_SESSION['userrole'])
			{
				case "administrator":
					echo "<li><a href='".BASE_URL."administrators/viewall'>
								gebruikers
							  </a>
						  </li>";
					echo "<li><a href='".BASE_URL."administrators/add_user'>
								voeg toe
							  </a>
						  </li>";
					echo "<li><a href='".BASE_URL."administrators/add_product'>
								add product
							  </a>
						  </li>";
					echo "<li><a href=''>Admin4</a></li>";
					echo "<li><a href=''>Admin5</a></li>";
					echo "<li><a href=''>Admin6</a></li>";
				break;
				case "root":
					echo "<li><a href=''>root1</a></li>";
					echo "<li><a href=''>root2</a></li>";
					echo "<li><a href=''>root3</a></li>";
					echo "<li><a href=''>root4</a></li>";
				break;
			}
			echo "<li><a href='../users/logout'>logout</a></li>";
		}
		else
		{
			echo "<li><a href=''>TODO1</a></li>";
			echo "<li><a href=''>TODO2</a></li>";
			echo "<li><a href=''>TODO3</a></li>";
			echo "<li><a href=''>TODO4</a></li>";
			echo "<li><a href=''>TODO5</a></li>";
		}
		?>
	</ul>
</div>
>>>>>>> 8eac29eca5975d3592eeb51e369d1cf5368344b7
