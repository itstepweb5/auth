<?php 
	getHeader();

	$userObject = user();
?>

	<div class="container">
		
		<div class="jumbotron">
			<h1>Hello, <?= $userObject['name'] ?>!</h1>
			<p>
				You are in account section
			</p>
		</div>

	</div>

<?php 

	getFooter();