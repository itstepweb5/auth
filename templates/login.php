<?php 

	require('partials/header.php');

	global $errors;
?>

	<div class="container mw-400">
		
		<?php if(is_array($errors) && count($errors) > 0): ?>
			
			<div class="alert alert-danger">
				
				<?php foreach ($errors as $error): ?>

					<div><?php echo $error; ?></div>

				<?php endforeach; ?>

			</div>

		<?php endif; ?>
		
		<div class="panel panel-default">

			<form class="panel-body" action="/login" method="POST">

				<div class="form-group">
					<label>Email:</label>
					<input class="form-control" type="email" name="email" placeholder="Enter your email" value="<?php echo $_POST['email']; ?>" required>
				</div>

				<div class="form-group">
					<label>Password:</label>
					<input class="form-control" type="password" name="password" placeholder="Enter your password" required>
				</div>
				
				<br>
				<button class="btn btn-primary" type="submit">Login</button>

			</form>

		</div>

	</div>

<?php 

	require('partials/footer.php');