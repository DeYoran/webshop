<p><h3><?php echo $header; ?></h3></p>
<table>
	<form action='./viewall' method='post'>
		<tr>
			<td>voornaam</td>
			<td><input type='text' name='firstname'></td>
		</tr>
		<tr>
			<td>tussenvoegsel</td>
			<td><input type='text' name='infix'></td>
		</tr>
		<tr>
			<td>achternaam</td>
			<td><input type='text' name='surname'></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type='submit' name='submit' value='verstuur'></td>
		</tr>
	</form>
</table>