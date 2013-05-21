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
		$(".articles tfoot td").addClass("title");
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
			<th>aantal</th>
			<th>prijs per stuk</th>
			<th>prijs</th>
		</tr>
	</thead>
	<tbody
		<?php echo $products; ?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="3">bij bestellingen boven de 100 euro rekenen we geen verzendkosten</td>
			<td colspan="3">totaal incl verzendkosten: &euro;<?php echo number_format($foot, 2, ",", ".") ; ?></td>
		</tr>
	</tfoot>
</table>