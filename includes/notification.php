<?php 

	if (isset($_SESSION['success']) && $_SESSION['success']!='') {
		?>
		<div class="alert alert-success left-icon-alert" role="alert">
	    <strong>Well done!</strong><?php echo $_SESSION['success']; ?>
		</div>
		<?php
		unset($_SESSION['success']);
	}	

	if (isset($_SESSION['error']) && $_SESSION['error']!='') {
		?>
		<div class="alert alert-danger left-icon-alert" role="alert">
	    <strong>Oh snap!</strong><?php echo $_SESSION['error']; ?>
		</div>
		<?php
		unset($_SESSION['error']);
	}

 ?>