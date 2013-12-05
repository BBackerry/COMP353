 <div class="container">
 <div class="row">
	<div class="panel panel-default">
		<div class="panel-heading">List of Users</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Username</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($users as $user): ?>
					<tr>
						<td><?= $user->idUser; ?></td>
						<td><?= $user->firstName;?></td>
						<td><?= $user->lastName; ?></td>
						<td><?= $user->email; ?></td>
						<td><a href="<?= site_url('Admin/editUser?id='.$user->idUser); ?>">Edit User</a></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>

<div class="container">
    <footer>
        <p>&copy; Best Concordia Team</p>
    </footer>
</div> <!-- /container -->
		<script src="../assets/js/vendor/jquery-1.10.1.min.js"></script>
		<script src="../assets/js/vendor/bootstrap.min.js"></script>
		<script src="../assets/js/plugins.js"></script>
		<script src="../assets/js/main.js"></script>
    </body>
</html>
