<?php
if (isset($_GET['yes'])) {
    function newserv($port, $disk, $username, $password)
    {
        $returnval = '';
        $returnval = $returnval.'<br>Creating Port'.$port;
        mkdir('/var/webister/'.$port);
        $returnval = $returnval.'<br>Creating User'.$username;
        include 'config.php';
        $conn = mysqli_connect("$host", "$user", "$pass", 'webister');

        $sql = "INSERT INTO Users (id, username, password, bandwidth, diskspace, port)
VALUES ('".rand(10000, 99999)."', '".$username."', '".sha1($password)."','0','".$disk."','".$port."')";

        if ($conn->query($sql) === true) {
        } else {
            die('error');
        }

        $conn->close();

        $returnval = $returnval.'<br>Creating Database';
        mysql_connect('localhost', 'root', "$pass");
        mysql_query("CREATE USER '$username'@'localhost' IDENTIFIED BY '$username';");
        mysql_query("CREATE DATABASE $username");
        mysql_query("GRANT ALL ON $username.* TO '$username'@'localhost'");
        mysql_close();
        $returnval = $returnval.'<br>Trying to Restart Webister';
        shell_exec('sudo service webister restart> /dev/null 2>/dev/null');
        $returnval = $returnval.'<br>Done! Please restart webister';
        header('Location: ?pa='.urlencode($returnval));
    }
    newserv($_POST['pstart'], $_POST['disk'], $_POST['username'], $_POST['pend']);
}
include 'include/head.php';

?>
	<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">New Server</h2>
						<p><?php if (isset($_GET['pa'])) {
    echo ''.$_GET['pa'].'';
} ?></p>
						<p>This could take a very long time. Once you create a user, please do not exit away from this page.</p>
				<form method="POST" action="?yes">
  <fieldset class="form-group">
    <label for="formGroupExampleInput">Username</label>
    <input type="text" class="form-control" name="username" id="formGroupExampleInput" placeholder="">
  </fieldset>
    <fieldset class="form-group">
    <label for="formGroupExampleInput">Disk Space in MB</label>
    <input type="text" class="form-control" name="disk" id="formGroupExampleInput" placeholder="">
  </fieldset>
    <fieldset class="form-group">
    <label for="formGroupExampleInput">Port</label>
    <input type="text" class="form-control" name="pstart" id="formGroupExampleInput" placeholder="">
  </fieldset>
    <fieldset class="form-group">
    <label for="formGroupExampleInput">Password</label>
    <input type="text" class="form-control" name="pend" id="formGroupExampleInput" placeholder="">
  </fieldset>
<button type="submit" class="btn btn-primary">Add User</button>
</form>			
<?php
include 'include/footer.php';
?>