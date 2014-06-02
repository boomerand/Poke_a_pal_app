<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Poke-A-Pal Profile</title>
	<!-- Semantic UI -->
	<link rel="stylesheet" type="text/css" href="/assets/css/semantic.css">
	<script type="text/javascript" src="/assets/js/semantic.js"></script>
	<!-- Google Font -->
	<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>
<body>
<div id="container">
	<div id="poke-top">
		<div id="poke-top-left" class="poke-head">
			<h2 class="ui header">Welcome, <?= $this->session->userdata('alias') ?></h2>
		</div>
		<div id="poke-top-right" class="poke-head">
			<p><a href="/users/logout">Logout</a></p>
		</div>
	</div>
	<div class="ui success message" id="poked-history">
	<!-- INDIVIDUAL POKE COUNTS GO HERE -->
	<?php
		if(!empty($pokers_num_pokes)){
			//var_dump($pokers_num_pokes);
			foreach($pokers_num_pokes as $poker_num_pokes) {
				// var_dump($poker_num_pokes);
				// die();
				$poker = $poker_num_pokes['poker_name']['alias'];
				$num_pokes = $poker_num_pokes['num_pokes'];
				// echo $num_pokes;
	?>
				<p class="poked"><?= $poker ?> has poked you <?= $num_pokes ?> times!</p>
	<?php
			}
		}
		else {
	?>
			<p class="poked">No one has poked you yet. Start poking and someone will poke back!</p>
	<?php	
		}
	?>
	</div>
	<div id="poke-body">
		<table class="ui table segment">
			<thead>
				<tr>
					<th>Name</th>
					<th>Alias</th>
					<th>Email Address</th>
					<th>Poke History</th>
					<th>Action</th>
				</tr>	
			</thead>
			<tbody>
			<!-- RUN FOR LOOP HERE FOR ALL USERS -->
			<?php
				if(isset($all_users)){
					foreach($all_users as $user){
						//var_dump($user);
						if($user['id'] != $this->session->userdata('id')){
						?>
							<tr>
								<td><?= $user['name'] ?></td>
								<td><?= $user['alias'] ?></td>
								<td><?= $user['email'] ?></td>
								<!-- Poke history goes here -->
								<td><?= $user['poke_history'] ?></td>
								<td><a href="/pokes/add_poke/<?=$user['id'] ?>"><div class="mini ui green button">Poke!</div></a></td>
							</tr>
						<?php				
						}
					}
				}
			?>
			</tbody>
		</table>
	</div>
</div>
</body>
</html>