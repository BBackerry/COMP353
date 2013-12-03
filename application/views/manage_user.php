    <script language="JavaScript" src="../assets/js/ts_picker.js">
    //Script by Denis Gritcyuk: tspicker@yahoo.com
    //Submitted to JavaScript Kit (http://javascriptkit.com)
    //Visit http://javascriptkit.com for this script
    </script>    
     <div class="container">
          <h3>List of Users:</h3>  
     <div class="panel-body">
    
    <table border="1px">
        <tr>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>email</th>
            <th></th>
        </tr>
    <?php foreach ($users as $user) { ?>
        <tr>
            <td><?php echo $user->idUser; ?></td>
            <td><?php echo $user->firstName;?></td>
            <td><?php echo $user->lastName; ?></td>
            <td><?php echo $user->email; ?></td>
            <td><a href="<?php echo site_url('Admin/editUser?id='.$user->idUser); ?>">Edit User</a></td>
        </tr>
    <?php } ?>
    </table>
    
    </div>
    <!-- Example row of columns -->

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
