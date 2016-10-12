<?php 

	require('partials/header.php');

	$userObject = user();
	if(!$userObject)
	{
		$userName = 'unregistered user';
	}
	else
	{
		$userName = $userObject['name'];
	}

?>

	<div class="container">
		
		<div class="jumbotron">
			<h1>Hello, <?= $userName ?>!</h1>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione obcaecati, corporis nihil debitis laboriosam voluptatum quibusdam delectus ea architecto, explicabo natus, magnam incidunt fuga accusamus velit optio deserunt voluptates voluptas.
			</p>

			<?php if(!user()): ?>
				<p>
					<a class="btn btn-primary btn-lg" href="/register">Create an account</a>
				</p>
			<?php endif; ?>
			
		</div>

	</div>

<?php 

	require('partials/footer.php');