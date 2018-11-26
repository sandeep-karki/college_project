
<?php 
	session_start();
	if (!isset($_SESSION['alogin'])) {
		?>
		<script>
		alert('Please Login First');
		window.open('index.php','_self ');
		</script>
		<?php
	}
 ?>

