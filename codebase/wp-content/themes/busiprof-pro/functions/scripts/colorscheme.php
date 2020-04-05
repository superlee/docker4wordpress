<script>
//change css onclick
	function changeCSS(cssFile) {
        var oldlink = document.getElementById("default-css"); 
        var newlink = document.createElement("link");
        newlink.setAttribute("id", "default-css");
		newlink.setAttribute("rel", "stylesheet");
        newlink.setAttribute("type", "text/css");
        newlink.setAttribute("href", "<?php echo get_template_directory_uri(); ?>/css/"+cssFile);		
        document.getElementsByTagName("head").item(0).replaceChild(newlink, oldlink);
     }
</script>