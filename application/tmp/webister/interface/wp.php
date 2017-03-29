<?php include 'include/head.php'; ?>
<?php
if (isset($_GET['yes'])) {
    echo 'Downloading...';
    $wordpress_url = 'https://wordpress.org/latest.zip';

    $con = mysqli_connect($host, $user, $pass, $data);
    $sql = 'SELECT * FROM Users WHERE username = "'.$_SESSION['user'].'"';
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_row($result)) {
        echo $row[5];
        $myp = $row[5];
    }
    mysqli_free_result($result);
    mysqli_close($con);

    file_put_contents('wp.zip', file_get_contents($wordpress_url));
    echo 'Installing...';
    $zip = new ZipArchive();
    $res = $zip->open('wp.zip');
    if ($res === true) {
        $zip->extractTo('/var/webister/'.$myp);
        $zip->close();
        echo 'Done!';
    } else {
        echo 'Error Happened!';
    }
}
?>
<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Install Wordpress to Your Site running on <?php
$con = mysqli_connect($host, $user, $pass, $data);
$sql = 'SELECT * FROM Users WHERE username = "'.$_SESSION['user'].'"';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     echo $row[5];
     $myp = $row[5];
 }
   mysqli_free_result($result);
    mysqli_close($con);
    ?></h2>
	<br>WordPress is web software you can use to create a beautiful website, blog, or app. We like to say that WordPress is both free and priceless at the same time.</br>
	<a href="?yes" class="btn btn-primary">Install it now</a>
<?php include 'include/footer.php'; ?>