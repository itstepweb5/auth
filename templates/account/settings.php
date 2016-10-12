<?php 

	getHeader();

	$userObject = array_merge(user(), $_POST);
?>

	<div class="container">

		<?php if($message && count($errors) == 0): ?>
			
			<div class="alert alert-success">
				
				<div><?php echo $message; ?></div>

			</div>

		<?php endif; ?>

		<?php if(is_array($errors) && count($errors) > 0): ?>
			
			<div class="alert alert-danger">
				
				<?php foreach ($errors as $error): ?>

					<div><?php echo $error; ?></div>

				<?php endforeach; ?>

			</div>

		<?php endif; ?>

		<div class="panel panel-default">

			<form class="panel-body" action="/account/settings" method="POST">
				
				<div class="form-group">
					<label>Name:</label>
					<input class="form-control" type="text" name="name" placeholder="Enter your name" value="<?php echo $userObject['name']; ?>" required>
				</div>
				<div class="form-group">
					<label>Surname:</label>
					<input class="form-control" type="text" name="surname" placeholder="Enter your surname" value="<?php echo $userObject['surname']; ?>" required>
				</div>
				<div class="form-group">
					<label>Email:</label>
					<input class="form-control" type="email" name="email" placeholder="Enter your email" value="<?php echo $userObject['login']; ?>" required>
				</div>
				
				<button class="btn btn-primary" type="submit">Save</button>

			</form>

		</div>

		<?php if(is_array($passwordResetErrors) && count($passwordResetErrors) > 0): ?>
			
			<div class="alert alert-danger">
				
				<?php foreach ($passwordResetErrors as $error): ?>

					<div><?php echo $error; ?></div>

				<?php endforeach; ?>

			</div>

		<?php endif; ?>

		<div class="panel panel-default">

			<form class="panel-body" action="/account/password/reset" method="POST">
				
				<div class="form-group">
					<label>New password:</label>
					<input class="form-control" type="password" name="password" placeholder="Enter new password" required>
				</div>

				<div class="form-group">
					<label>Repeat new password:</label>
					<input class="form-control" type="password" name="password_confirmation" placeholder="Repeat new password" required>
				</div>
				
				<button class="btn btn-primary" type="submit">Reset password</button>

			</form>

		</div>

	</div>

<?php 

	getFooter();