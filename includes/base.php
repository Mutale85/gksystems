<base href="http://localhost/bulwarkdebtcollectors.com/adminpanel/">
<?php
	if (!isset($_COOKIE['bulwarkAccount']) && !isset($_SESSION['username'])) {?>
    	<script>
      		window.location = 'signout';
    	</script>
<?php }?>