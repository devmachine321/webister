<?php include("include/head.php"); 
?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Dashboard</h2>
	<?php if ($_SESSION["user"] == "admin") { ?>
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 "><?php
    $count = 0;
$con = mysqli_connect($host, $user, $pass, $data);
$sql = 'SELECT * FROM Users';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     $count = $count + 1;
 }
   mysqli_free_result($result);
    mysqli_close($con);
    echo $count;
    ?></div>
													<div class="stat-panel-title text-uppercase">Users</div>
												</div>
											</div>
										
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 "><?php
    $count = 0;
$con = mysqli_connect($host, $user, $pass, $data);
$sql = 'SELECT * FROM FailedLogin';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     $count = $count + 1;
 }
   mysqli_free_result($result);
    mysqli_close($con);
    echo $count;
    ?></div>
													<div class="stat-panel-title text-uppercase">Failed Logins</div>
												</div>
											</div>
											
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 "><?php
    $count = 0;
$con = mysqli_connect($host, $user, $pass, $data);
$sql = 'SELECT * FROM Users';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     $count = $count + 1;
 }
   mysqli_free_result($result);
    mysqli_close($con);
    echo $count;
    ?></div>
													<div class="stat-panel-title text-uppercase">Total Servers</div>
												</div>
											</div>
										
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 "><?php
$con = mysqli_connect($host, $user, $pass, $data);
$sql = 'SELECT * FROM Users WHERE username = "' . $_SESSION["user"] . '"';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     echo $row[5];
     $myp = $row[5];
 }
   mysqli_free_result($result);
    mysqli_close($con);
    ?></div>
													<div class="stat-panel-title text-uppercase">Port</div>
												</div>
											</div>
										
										</div>
									</div>
								</div>
							</div>
						</div>
<?php } ?>
						<div class="row">
							<div class="col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">QuickPower</div>
									<div class="panel-body">
										<div class="chart">
											<?php if ($_SESSION["user"] == "admin") { ?>
										<a type="button" href="action.php?act=pwr" class="btn btn-default"><i class="fa  fa-5x fa-power-off"></i></a>
										<a type="button" href="action.php?act=restart" class="btn btn-default"><i class="fa fa-5x fa-refresh"></i></a>
										<a type="button" href="action.php?act=server" class="btn btn-default"><i class="fa fa-5x fa-server"></i></a>
										<a type="button" href="action.php?act=mysql" class="btn btn-default"><i class="fa fa-5x fa-database"></i></a>
										<?php } ?>
										</div>
										
										<div id="legendDiv"></div>
									</div>
									
								</div>
								
							</div>
						    <div class="col-md-6">
						    			<div class="panel panel-default">
									<div class="panel-heading">Server</div>
									<div class="panel-body">
										
										<a type="button" href="FileManager.php" class="btn btn-default"><i class="fa fa-5x fa-file"></i></a>
										<a type="button" href="adminer-4.2.4.php?server=localhost" class="btn btn-default"><i class="fa fa-5x fa-database"></i></a>
										<a type="button" href="wp.php" class="btn btn-default"><i class="fa fa-5x fa-wordpress"></i></a>

										
										</div>
										
										</div>
										</div>
									</div>
						    </div>
						    <div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Recent Failed Login Attempts</div>
									<div class="panel-body">
									
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
    . "FROM `FailedLogin` \n"
    . "LIMIT 0 , 5";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
    echo '
    <tr><th scope="row">' . $row[0] .'</th>
													<td>' . $row[1] .'</td>
													<td>' . $row[2] .'</td></tr>';
    }
  }
    ?>
  
											</tbody>
										</table>
									</div>
							
								</div>
								
							</div>
							</div>
									
						</div>
						
		
						
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>
<?php include("include/footer.php"); ?>
