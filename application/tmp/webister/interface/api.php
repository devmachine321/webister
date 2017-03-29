<?php
session_start();
error_reporting(0);
if (!isset($_SESSION['planid']) && !isset($_GET['planid'])) {
    die('Error Forbidden');
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
	
	<title>Webister</title>

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
		<a href="index.html" class="logo"><h7>Webister on <b><?php
include 'config.php';
    $mysqli = new mysqli();
    $con = mysqli_connect("$host", "$user", "$pass", "$data");
// Check connection

    $sql = "SELECT value FROM Settings WHERE code =  'title' LIMIT 0 , 30";

if ($result = mysqli_query($con, $sql)) {
    // Fetch one and one row
  while ($row = mysqli_fetch_row($result)) {
      printf($row[0]);
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
                  if (!empty($_SERVER['https'])) {
                      return true;
                  }

                  if (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
                      return true;
                  }

                  return false;
              }
            if (isSSL()) {
                ?>
			<li style="background-color:red;"><a href=""><i class="fa fa-unlock"></i> UnSecure</a></li>
			<?php 
            } else {
                ?>
			<li style="background-color:green;"><a href=""><i class="fa fa-lock"></i> Secure</a></li>
			<?php 
            } ?>
		
		</ul>
	</div>

	<div class="ts-main-content">
		<form method="POST" action="?yes"><br>	<br>	<br>	<br>	<br>	<br>	<br>	<br>
		<?php
if (isset($_GET['yes'])) {
                function newserv($port, $disk, $username, $password)
                {
                    include 'config.php';
                    mkdir('/var/webister/'.$port);
                    include 'config.php';
                    $conn = mysqli_connect("$host", "$user", "$pass", 'webister');

                    $sql = "INSERT INTO Users (id, username, password, bandwidth, diskspace, port)
VALUES ('".rand(10000, 99999)."', '".$username."', '".sha1($password)."','0','".$disk."','".$port."')";

                    if ($conn->query($sql) === true) {
                    } else {
                        die('error');
                    }

                    $conn->close();
                    shell_exec('sudo service webister restart> /dev/null 2>/dev/null');
                    mysql_connect('localhost', 'root', "$pass");
                    mysql_query("CREATE USER '$username'@'localhost' IDENTIFIED BY '$username';");
                    mysql_query("CREATE DATABASE $username");
                    mysql_query("GRANT ALL ON $username.* TO '$username'@'localhost'");
                    mysql_close();
                }
                include 'data/plans/'.$_POST['plan'];
                if (isset($_GET['planid'])) {
                    newserv(rand('1000', '9999'), $_GET['planid'], $_GET['username'], $_GET['password']);
                    die();
                } else {
                    newserv(rand($pstart, $pend), $disk, $_POST['username'], $_POST['password']);
                }
                echo 'Your Server was created login to control panel now.<br>';
                session_destroy();
            }
?>
	
	I would like my username to be <input type="text" name="username"> and my password to be <input type="password" name="password">.
	<br>Please give me the<select name="plan">
	<?php
    $dir = scandir('data/plans/');
    foreach ($dir as $file) {
        if ($file == '.' || $file == '..') {
        } else {
            include 'data/'.$_SESSION['planid'].'.php';

            include 'data/plans/'.$file;
            if ($suppose != $name) {
            } else {
                echo '<option value="'.$name.'.php">'.$name.'</option>';
            }
        }
    }
    ?>

</select>plan.
<button type="submit" class="btn btn-primary">Register</button>
</form>	