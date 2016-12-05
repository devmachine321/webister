<?php
session_start();
if (!isset($_SESSION["user"])) {
	header("Location: index.php?page=main");
	die();
}
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="blue">
	
	<title>Webister Admin Control Panel</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
    
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<div class="brand clearfix">
		<a href="index.php?page=cp" class="logo"><img src="img/webister.png"><h7>Webister on <b><?php
include("config.php");
    $mysqli = new mysqli();
    $con = mysqli_connect("$host", "$user", "$pass", "$data");
// Check connection

    $sql = "SELECT value FROM Settings WHERE code =  'title' LIMIT 0 , 30";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
    printf ($row[0]);
    }
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($con);

?></b></h7></a> 

		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			<?php
			  function isSSL()
    {
        if( !empty( $_SERVER['https'] ) )
            return true;

        if( !empty( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' )
            return true;

        return false;
    }
			if (!isSSL()) {
				?>
			<li style="background-color:red;"><a href=""><i class="fa fa-unlock"></i> UnSecure</a></li>
			<?php } else { ?>
			<li style="background-color:green;"><a href=""><i class="fa fa-lock"></i> Secure</a></li>
			<?php } ?>
			<li class="ts-account">
				<a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> <?php echo $_SESSION["user"]; ?> <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					<li><a  href="" data-toggle="modal" data-target="#myModal">My Account</a></li>
		
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>

	<div class="ts-main-content">
		<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			<?php if ($_SESSION["user"] == "admin") { ?>
				<li class="ts-label">Administration</li>
			
				<li><a href="#"><i class="fa fa-server"></i> Servers</a>
					<ul>
						<li><a href="newserv.php">New</a></li>
						<li><a href="index.php?page=list#">List</a></li>
				
					</ul>
				</li>
				
				<li><a href="settings.php"><i class="fa fa-tasks"></i> Settings</a></li>
			<li class="ts-label">API</li>
			
				<li><a href="plans.php"> Plans</a></li>
				</li>
				
				
<?php } ?>
	<li class="ts-label"><?php echo $_SESSION["user"]; ?>'s settings</li>
		<li class="open"><a href="index.php?page=cp"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="#"><i class="fa fa-server"></i> My Server</a>
					<ul>
						<li><a href="FileManager.php">File Manager</a></li>
						<li><a href="wp.php">Wordpress</a></li>
						<li><a href="adminer-4.2.4.php?server=localhost&username=<?php echo $_SESSION["user"]; ?>&db=<?php echo $_SESSION["user"]; ?>">MySQL</a></li>
						
					</ul>
				</li>
			<li>	<li><a  href="" data-toggle="modal" data-target="#myModal"><i class="fa fa-user"></i> My Account</a></li>
				<!-- Account from above -->
				<ul class="ts-profile-nav">
					<li><a href="#">Help</a></li>
					<li><a href="#">Settings</a></li>
					<li class="ts-account">
						<a href="#"><img src="img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> <?php echo $_SESSION["user"]; ?> <i class="fa fa-angle-down hidden-side"></i></a>
						<ul>
								<li><a  href="" data-toggle="modal" data-target="#myModal">My Account</a></li>
						
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>

			</ul>
		</nav>
							<div class="container">
  <h2>Change My Password</h2>
  <!-- Trigger the modal with a button -->
 

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change My Password</h4>
        </div>
        <form method="POST" action="pass.php">
        <div class="modal-body">
             <form class="form-horizontal" role="form">
                  <div class="form-group">
                  	<input type="hidden" name="username" value="<?php echo $_SESSION["user"] ?>">
                    <label  class="col-sm-2 control-label"
                              for="inputEmail3">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" 
                        id="inputEmail3" placeholder="password"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Change IT</button>
                    </div>
                  </div>
        </div></form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
	<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

					<?php echo file_get_contents("data/head"); ?>
						</div>
							</div>
								</div>
									</div>