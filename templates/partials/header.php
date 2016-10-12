<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IT Step website</title>

    <!-- Bootstrap -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/style.css" rel="stylesheet">
  </head>
  <body>

  	<header>
  		
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">IT STEP</a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active"><a href="/">Home</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						
						<?php if(!user()): ?>
							<li><a href="/register">Create account</a></li>
							<li><a href="/login">Login</a></li>
						<?php else: ?>
							<li class="dropdown">
          						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          							<?= user()['name'] ?> <span class="caret"></span>
          						</a>
								<ul class="dropdown-menu">
									<li><a href="/account">Account</a></li>
									<li><a href="/account/settings">Settings</a></li>
									<li role="separator" class="divider"></li>
									<li><a href="/logout">Logout</a></li>
								</ul>
							</li>
						<?php endif; ?>
       					
      				</ul>
				</div>
			</div>
		</nav>

  	</header>

