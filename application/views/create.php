<?php if ($show_form): ?>
<form action="" method="post">
	<label for="name">Post Name</label><br>
	<input type="text" id="name" name="name">
		
	<br>
		
	<label for="post">Post Body</label><br>
	<textarea id="post" name="post"></textarea>	
	
	<br>
	
	<input type="submit">
</form>
<?php endif; ?>

<?php echo $html->create_a('index', 'index', 'Directory'); ?>