<?php

session_destroy();

echo '<script>

	localStorage.removeItem("anterior");	
	localStorage.removeItem("actual");
	localStorage.clear();

	window.location = "ingreso";

</script>';	