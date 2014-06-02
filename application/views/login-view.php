<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Poke-A-Pal Login</title>
	<!-- Semantic UI -->
	<link rel="stylesheet" type="text/css" href="/assets/css/semantic.css">
	<script type="text/javascript" src="/assets/js/semantic.js"></script>
	<!-- Google Font -->
	<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>
<body>
<div id="container">
	<h2 class="ui header">
	  	Welcome to Poke-A-Pal
	  	<div class="sub header">It's fun to poke fun at someone else.</div>
	</h2>
	<!-- ERROR MESSAGE GOES HERE-->
	<?php 
		if($this->session->flashdata('errors'))
		{
	?>		
			<div class="ui error message"><?= $this->session->flashdata('errors') ?></div>
	<?php
		};
		if($this->session->flashdata('login_error'))
		{
	?>		
			<div class="ui error message"><?= $this->session->flashdata('login_error') ?></div>
	<?php
		};
		if(isset($registered))
		{
	?>		
			<div class="ui success message"><?= $registered ?></div>
	<?php		
		};
	?>
	<div class="ui two column stackable grid">
		<div class="column">
		    <!-- ADD CONTROLLER METHODS TO ACTION -->
		    <form action="/users/login" method="post" class="ui fluid form segment">
		      	<h3 class="ui header">Log-in</h3>
		      	<div class="field">
		        	<label>Email</label>
		        	<input placeholder="Email" name="email" type="text">
		      	</div>
		      	<div class="field">
		        	<label>Password</label>
		        	<input placeholder="Password" name="password" type="password">
		      	</div>
		      	<input type="submit" class="ui orange submit button" value="Login">
		    </form>
		</div>
	
		<div class="column">
		    <!-- ADD CONTROLLER METHODS TO ACTION -->
		    <form action="/users/register" method="post" class="ui fluid form segment">
		      	<h3 class="ui header">Register</h3>
		        <div class="field">
		          	<label>Full Name</label>
		          	<input placeholder="Name" name="name" type="text">
		        </div>
		        <div class="field">
		          	<label>Username</label>
		          	<input placeholder="Username" name="alias" type="text">
		        </div>
		      	<div class="field">
		        	<label>Email</label>
		        	<input placeholder="Email" name="email" type="text">
		      	</div>
		      	<div class="field">
		        	<label>Password - Must be at least 8 characters</label>
		        	<input placeholder="Enter Password" name="password" type="password">
		      	</div>	
		      	<div class="field">
		        	<label>Confirm Password</label>
		        	<input placeholder="Confirm Password" name="confirm_pw" type="password">
		      	</div>	      	
		      	<input type="submit" class="ui orange submit button" value="Register">
		    </form>
		</div>
	</div>
</div>
</body>
</html>