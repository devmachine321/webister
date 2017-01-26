<?php
session_start();
include("config.php");
if (!isset($_SESSION["user"])) {
	header("Location: index.php?page=main");
	die();
}
     function Connect($port) {
        $serverConn = @stream_socket_client("tcp://127.0.0.1:$port", $errno, $errstr);
        if ($errstr != '') {
            return false;
        }
       fclose($serverConn);
       return true;
      } 
 function GetDirectorySize($path){
    $bytestotal = 0;
    $path = realpath($path);
    if($path!==false){
        foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)) as $object){
            $bytestotal += $object->getSize();
        }
    }
    
    return $bytestotal;
}

$con = mysqli_connect($host, $user, $pass, $data);
$sql = 'SELECT * FROM Users WHERE username = "' . $_SESSION["user"] . '"';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
  
     $quote = $row[4];
     if ($quote == "") {
     	$quote="99999999999999999999999999999999";
 }
 }
   mysqli_free_result($result);
    mysqli_close($con);
?>
<?php
$con = mysqli_connect($host, $user, $pass, $data);
$sql = 'SELECT * FROM Users WHERE username = "' . $_SESSION["user"] . '"';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     echo $row[5];
     $myp = $row[5];
 }
   mysqli_free_result($result);
    mysqli_close($con);
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
		<a href="index.php?page=cp" class="logo"><img src="<?php echo file_get_contents("data/logo");?>"><h7>Webister on <b><?php
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
			<?php if ($_SESSION["user"] == "admin") { ?>
				<li class="ts-label">Administration</li>
			<li><a href="newserv.php"><i class="fa fa-plus"></i> New</a></li>
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

						<li class="ts-label">Status of Server</li>
			 <li><a>Hostname: <span class="badge"><?php echo gethostname(); ?>:<?php
$con = mysqli_connect($host, $user, $pass, $data);
$sql = 'SELECT * FROM Users WHERE username = "' . $_SESSION["user"] . '"';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     echo $row[5];
 }
   mysqli_free_result($result);
    mysqli_close($con);
    ?></span></a></li>
			 <li><a>IP Address: <span class="badge"><?php echo gethostbyname(gethostname()); ?>:<?php
$con = mysqli_connect($host, $user, $pass, $data);
$sql = 'SELECT * FROM Users WHERE username = "' . $_SESSION["user"] . '"';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     echo $row[5];
     $mm = $row[5];
 }
   mysqli_free_result($result);
    mysqli_close($con);
    ?></a></li>
			<li><a>MySQL Hostname: <span class="badge">localhost</span></a></li>
   <li><a>MySQL Username: <span class="badge"><?php echo $_SESSION["user"]; ?></span></a></li>
   <li><a>MySQL Password: <span class="badge">Same as CP</span></a></li>
   <li><a>Database: <span class="badge"><?php echo $_SESSION["user"]; ?></span></a></li>
   <li><a>Status: <span class="badge">
       <?php
 


     if (Connect($mm)){
         echo "Server is running!";
       }else{
         echo "Server is down";
       
    }
    ?> </span></a></li>
    <li><a>	Disk Space (<?php echo bcdiv(GetDirectorySize("/var/webister/" . $myp), 1048576, 2); ?>/<?php echo $quote; ?>):<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo bcdiv(GetDirectorySize("/var/webister/" . $myp), 1048576, 2); ?>"
  aria-valuemin="0" aria-valuemax="<?php echo $quote; ?>" style="width:<?php echo bcdiv(GetDirectorySize("/var/webister/" . $myp), 1048576, 2); ?>%">
    <span class="sr-only"><?php echo bcdiv(GetDirectorySize("/var/webister/" . $myp), 1048576, 2); ?>% Complete</span>
  </div>
</div></a></li>
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