<style>
.odd
{
	background-color :#aaf;
	font-size:1em;
}

.even
{
	background-color:#bbf;
	font-size:1em;
}

.highlight
{
	background-color:#fff;
	font-size:1em;
}

.title
{
	background-color:#fff;
	font-size:1.3em;
}

td, th
{
	padding:0.3em 1.0em;
	text-align:center;
}

</style>
<script type='text/javascript'>
	$('document').ready(function(){
		$(".articles tr:even").addClass("even");
		$(".articles tr:odd").addClass("odd");
		$(".articles th").addClass("title");
		$(".articles tr").hover(
			function(){
				$(this).toggleClass('highlight');
			},
			function(){
				$(this).toggleClass('highlight');
			}
		);
	});
</script>

<h3><?php echo $header; ?></h3>
<table class='articles'>
	<thead>
		<tr>
			<th>artikelnr.</th>
			<th>productfoto</th>
			<th>product</th>
			<th>prijs</th>
			<th>winkelwagen</th>
		</tr>
	</thead>
	<tbody
		<?php echo $products; ?>
	</tbody>
</table>