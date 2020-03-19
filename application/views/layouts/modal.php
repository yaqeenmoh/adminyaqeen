<?php
	if (!empty($_SESSION['success'])){ ?>
		<div class="alert alert-icon-left alert-success alert-dismissible fade in mb-2" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<strong><?php echo  $_SESSION['success'];?></strong>
		</div>
		<?php
	}
?>

<?php
	if (!empty($_SESSION['error'])){ ?>
		<div class="alert alert-icon-left alert-danger alert-dismissible fade in mb-2" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<strong><?php echo  $_SESSION['error'];?></strong>
		</div>
		<?php
	}
?>
