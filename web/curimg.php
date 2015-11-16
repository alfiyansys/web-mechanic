
<div id="current" class="">
	<img id="current-image" class="ui fluid image">
	<script type="text/javascript">
		//remove loading when image loaded 
		$("#current-image").attr("src", "img/current.jpg?timestamp=" + new Date().getTime());
		$(new Image()).on("load", function(){
			$("#current-container").removeClass("loading");
		}).prop("src",$("#current").prop("src")).each(function(){ if(this.complete) $(this).trigger("load");});

	</script>
</div>
