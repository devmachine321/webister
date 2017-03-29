<?php include 'include/head.php';
?>

											<?php if ($_SESSION['user'] == 'admin') {
    ?>
										<a type="button" href="action.php?act=pwr" class="btn btn-default"><i class="fa  fa-5x fa-power-off"></i></a>
										<a type="button" href="action.php?act=restart" class="btn btn-default"><i class="fa fa-5x fa-refresh"></i></a>
										<a type="button" href="action.php?act=server" class="btn btn-default"><i class="fa fa-5x fa-server"></i></a>
										<a type="button" href="action.php?act=mysql" class="btn btn-default"><i class="fa fa-5x fa-database"></i></a>
										<a type="button" href="newserv.php" class="btn btn-default"><i class="fa fa-5x fa-plus"></i></a>
										<a type="button" href="index.php?page=list#" class="btn btn-default"><i class="fa fa-5x fa-user"></i></a>
										<a type="button" href="plans.php" class="btn btn-default"><i class="fa fa-5x fa-columns" aria-hidden="true"></i></a>
										<a type="button" href="settings.php" class="btn btn-default"><i class="fa fa-5x fa-sliders"></i></a>
										<?php 
} ?>
<br>
										<a type="button" href="FileManager.php" class="btn btn-default"><i class="fa fa-5x fa-file"></i></a>
										<a type="button" href="adminer-4.2.4.php?server=localhost" class="btn btn-default"><i class="fa fa-5x fa-database"></i></a>
										<a type="button" href="wp.php" class="btn btn-default"><i class="fa fa-5x fa-wordpress"></i></a>
                                        <a type="button" href="phpinfo.php" class="btn btn-default"><i class="fa fa-5x fa-code"></i></a>
                                        <a type="button" href="mobiapp.php" class="btn btn-default"><i class="fa fa-5x fa-mobile"></i></a>
										<table class="table table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>IP</th>
													<th>Time</th>
												</tr>
											</thead>
											<tbody>
											
<?php  $mysqli = new mysqli();
    $con = mysqli_connect("$host", "$user", "$pass", "$data"); $sql = "SELECT * \n"
    ."FROM `FailedLogin` \n"
    .'LIMIT 0 , 5';

if ($result = mysqli_query($con, $sql)) {
    // Fetch one and one row
  while ($row = mysqli_fetch_row($result)) {
      echo '
    <tr><th scope="row">'.$row[0].'</th>
													<td>'.$row[1].'</td>
													<td>'.$row[2].'</td></tr>';
  }
}
    ?>
  
											</tbody>
										</table>


	
<?php include 'include/footer.php'; ?>
