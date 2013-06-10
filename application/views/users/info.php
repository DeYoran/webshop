<h3>info</h3>
<p>
	deze website is opgezet voor het verkopen van muziekinstrumenten. <br />
	Op dit moment word er nog aan gewerkt om de website op te zetten <br />
	maar we adviseren je om binnenkort weer te kijken, <br />
	als er meer functionaliteit is.
</p><br />&nbsp;
<h3>disclaimer</h3>
<p>
	<table>
		<tr>
			<td>afbeeldingen : </td>
			<td>alle afbeeldingen zijn rechtenvrije stock-foto's</td>
		</tr>
		<tr>
			<td>teksten : </td>
			<td>alle teksten zijn bedacht en geschreven door yoran engelberts</td>
		</tr>
		<tr>
			<td>code</td>
			<td>alle code is geschreven door yoran engelberts</td>
		</tr>
		<tr>
			<td>ontwerp</td>
			<td>het ontwerp van de website komt van yoran engelberts</td>
		</tr>
	</table>
</p><br />&nbsp;
<script>
var st = '<?php echo $scrollto; ?>';
switch(st){
	case 'info':{
		$('div #content').scrollTop(0);	
		break;		
	}
	case 'disclaimer':{
		$('div #content').scrollTop(85);	
		break;		
	}
	case 'contact':{
		$('div #content').scrollTop(160);	
		break;		
	}
	case 'colofon':{
		$('div #content').scrollTop(250);	
		break;		
	}
	case 'sponsors':{
		$('div #content').scrollTop(250);	
		break;	
	}
	default:{
		$('div #content').scrollTop(0);	
		break;		
	}
}
</script>