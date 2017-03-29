<?php include 'include/head.php'; ?>
	<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">List</h2>
						<table class="table">
    <thead>
      <tr>
        <th>Username</th>
        <th>Port</th>
      </tr>
    </thead>
    <tbody>
        	<?php

$con = mysqli_connect($host, $user, $pass, $data);
$sql = 'SELECT * FROM Users';
$result = mysqli_query($con, $sql);
 while ($row = mysqli_fetch_row($result)) {
     echo ' <tr>
        <td>'.$row[1].'</td>
        <td>'.$row[5].'</td>
      </tr>';
 }
   mysqli_free_result($result);
    mysqli_close($con);

    ?>
     
   
    </tbody>
  </table>
  </div>
  </div>
  </div>
  </div>
<?php include 'include/footer.php'; ?>