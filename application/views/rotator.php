<?php
function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return '#' .random_color_part() . random_color_part() . random_color_part();
}

?>
<style>
	.rot
	{
		position: absolute;
		left: 0px;
		box-shadow: 0px 0px 30px 10px #fff inset;
	}
	#lyr1
	{
		z-index : 9;
	}
	#lyr2
	{
		z-index : 8;
	}
	#lyr3
	{
		z-index : 7;
	}
	#lyr4
	{
		z-index : 6;
	}
	#lyr5
	{
		z-index : 5;
	}
	#lyr6
	{
		z-index : 4;
	}
	#lyr7
	{
		z-index : 3;
	}
	#lyr8
	{
		z-index : 2;
	}
	#lyr9
	{
		z-index : 1;
	}
	#lyr10
	{
		z-index : 0;
	}
	img[alt='r01']
	{
		background-color: <?php echo random_color() ?>;
	}
	img[alt='r02']
	{
		background-color: <?php echo random_color() ?>;
	}
	img[alt='r03']
	{
		background-color: <?php echo random_color() ?>;
	}
	img[alt='r05']
	{
		background-color: <?php echo random_color() ?>;
	}
	img[alt='r06']
	{
		background-color: <?php echo random_color() ?>;
	}
	img[alt='r07']
	{
		background-color: <?php echo random_color() ?>;
	}
	img[alt='r08']
	{
		background-color: <?php echo random_color() ?>;
	}
	img[alt='r09']
	{
		background-color: <?php echo random_color() ?>;
	}
</style>
<img src='<?php echo BASE_URL; ?>/img/r01.png' alt='r01' width='202' height='80' id='lyr1' class = 'rot'>
<img src='<?php echo BASE_URL; ?>/img/r02.png' alt='r02' width='202' height='80' id='lyr2' class = 'rot'>
<img src='<?php echo BASE_URL; ?>/img/r03.png' alt='r03' width='202' height='80' id='lyr3' class = 'rot'>
<img src='<?php echo BASE_URL; ?>/img/r04.png' alt='r04' width='202' height='80' id='lyr4' class = 'rot'>
<img src='<?php echo BASE_URL; ?>/img/r05.png' alt='r05' width='202' height='80' id='lyr5' class = 'rot'>
<img src='<?php echo BASE_URL; ?>/img/r06.png' alt='r06' width='202' height='80' id='lyr6' class = 'rot'>
<img src='<?php echo BASE_URL; ?>/img/r07.png' alt='r07' width='202' height='80' id='lyr7' class = 'rot'>
<img src='<?php echo BASE_URL; ?>/img/r08.png' alt='r08' width='202' height='80' id='lyr8' class = 'rot'>
<img src='<?php echo BASE_URL; ?>/img/r09.png' alt='r09' width='202' height='80' id='lyr9' class = 'rot'>
<script type='text/javascript' >
	$("document").ready(function(){
	//alert('done')
	setInterval("changePict()",4000)
	$("#lyr1").fadeTo(4000,0.001);
	});
	function changePict()
	{
		$("#lyr1").attr("id","lyr10")
		$("#lyr2").attr("id","lyr1")
		$("#lyr3").attr("id","lyr2")
		$("#lyr4").attr("id","lyr3")
		$("#lyr5").attr("id","lyr4")
		$("#lyr6").attr("id","lyr5")
		$("#lyr7").attr("id","lyr6")
		$("#lyr8").attr("id","lyr7")
		$("#lyr9").attr("id","lyr8")
		$("#lyr10").attr("id","lyr9")
		$("#lyr1").fadeTo(4000,0.01)
		$("#lyr9").fadeTo(0,1)
	}
</script>