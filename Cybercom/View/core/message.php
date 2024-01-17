<?php if(session_status() == 1){ ?>
<div class="alert-success">
	<?php 
	echo $this->getMessage()->getSuccess();
	$this->getMessage()->clearSuccess();
?>
</div>
<div class="alert-danger">
	<?php 
	echo $this->getMessage()->getFailure();
	$this->getMessage()->clearFailure();
?>
</div>
<?php } ?>