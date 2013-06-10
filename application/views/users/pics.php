<script src='../public/js/jquery.picasagallery.js'></script>
<link rel='stylesheet' href="../public/css/jquery.picasagallery.css" type="text/css" />
<script>
$(document).ready( function() {
    $('.picasagallery').picasagallery( {
			username: 'timo.mcchicken', // Your Picasa public username
			hide_albums: ['Profile Photos', 'Scrapbook Photos', 'Instant Upload', 'Photos from posts'], // hidden album names
			link_to_picasa: false, // true to display link to original album on Google Picasa
			thumbnail_width: '160', // width of album and photo thumbnails
			title: '<h3>Pics</h3>', // title shown above album list
			inline: true, // true to display photos inline instead of using the fancybox plugin
										} );
} );
</script>
<div class='picasagallery'></div>