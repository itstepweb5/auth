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

			<form class="panel-body" action="/register" method="POST">
				
				<div class="form-group row">
					<div class="col-xs-6 pr-half">
						<label>Name:</label>
						<input class="form-control" type="text" name="name" placeholder="Enter your name" value="<?php echo $_POST['name']; ?>" required>
					</div>
					<div class="col-xs-6 pl-half">
						<label>Surname:</label>
						<input class="form-control" type="text" name="surname" placeholder="Enter your surname" value="<?php echo $_POST['surname']; ?>" required>
					</div>
				</div>

				<div class="form-group">
					<label>Email:</label>
					<input class="form-control" type="email" name="email" placeholder="Enter your email" value="<?php echo $_POST['email']; ?>" required>
				</div>

				<div class="form-group">
					<label>Password:</label>
					<input class="form-control" type="password" name="password" placeholder="Enter your password" required>
				</div>

				<div class="form-group">
					<label>Repeat password:</label>
					<input class="form-control" type="password" name="password_confirmation" placeholder="Repeat your password" required>
				</div>
				
				<br>
				<button class="btn btn-primary" type="submit">Create account</button>

			</form>

		</div>

	</div>

<?php 

	require('partials/footer.php');