<?php 
    require_once('./php-interaction.php');
	$result = $db->query('SELECT * FROM users order by name ASC');
	if($result) {
		$users = $result->num_rows;
	} else {
		$users = false;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD using PHP and Bootstrap Modal</title>
	<!-- fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
	<!-- bs4 css -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
	<style>
		body {
			padding: 80px;
			background-color: aliceblue;
			font-family: 'Roboto', sans-serif;
		}
		h1 {
			font-weight: 100;	
		}
		th {
			font-weight: 400;
			letter-spacing: 2px;
		}
	</style>
</head>
<body>
	
	<div class="w-50 m-auto text-center">
		<h1>Crud using PHP, Bootstrap Modal</h1>
		<div class="mt-4">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#user-info">Open Modal</button>
		</div>
		<div class="alert alert-info my-5 text-left">
			Before you run this demo on your local, create a database and a table as mentioned in the article.
		</div>
	</div>

	<div class="w-75 m-auto">
		<!-- successfull message -->
		<div id="userAlert" class="alert alert-success" style="display: none;">User info saved successfully.</div>
		<?php
			// display the users from the database if any
			if($users > 0):
				$i = 1;
		?>
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Email</th>
					<th>Country</th>
					<th>Phone</th>
					<th>Bio</th>
				</tr>
			</thead>
			<?php while ($user = mysqli_fetch_object($result)) {?>
			<tr>
				<td><?php echo $i ?></td>
				<td><?php echo $user->name ?></td>
				<td><?php echo $user->email ?></td>
				<td><?php echo $user->country ?></td>
				<td><?php echo $user->phone ?></td>
				<td><?php echo $user->bio ?></td>
			</tr>
			<?php $i++; }?>
		</table>
		<?php else: ?>
			<div class="alert text-center">There are no users to display</div>
		<?php endif; ?>
	</div>
	
	<!-- bootstrap modal -->
	<div class="modal" tabindex="-1" role="dialog" id="user-info">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">User Details</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<form action="" id="users_form" name="userInfo">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" placeholder="Enter your name" name="name" id="name" aria-describedby="name">
						</div>
						<div class="form-group">
							<label for="email">Email address</label>
							<input type="email" class="form-control" placeholder="Enter your email address" name="email" id="email" aria-describedby="email">
						</div>
						<div class="form-group">
							<label for="country">Country</label>
							<input type="text" class="form-control" placeholder="Enter your country" name="country" id="country" aria-describedby="country">
						</div>
						<div class="form-group">
							<label for="phone">Telephone</label>
							<input type="text" class="form-control" placeholder="Enter phone number" name="phone" id="phone" aria-describedby="phone">
						</div>
						<div class="form-group">
							<label for="email">About you</label>
							<textarea class="form-control" name="bio" id="bio" placeholder="Tell us something about you" aria-describedby="phone"></textarea>
						</div>
						<div class="text-right">
							<button type="submit" name="form_data" class="btn btn-primary" id="submit-button">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<!-- bs4js -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

	<!-- script for ajax -->
	<script src="./ajax.js"></script>
</body>
</html>