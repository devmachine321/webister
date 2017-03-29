<?php include 'include/head.php'; ?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Settings</h2>
						
						<form method="POST" action="title.php">
  <fieldset class="form-group">
    <label for="formGroupExampleInput">Title</label>
    <input type="text" class="form-control" name="title" id="formGroupExampleInput" value="<?php
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

?>">
  </fieldset>
  <fieldset class="form-group">
    <label for="formGroupExampleInput">Logo</label>
    <input type="text" class="form-control" name="logos" id="formGroupExampleInput" value="<?php echo file_get_contents('data/logo'); ?>">
  </fieldset>
   <label for="formGroupExampleInput">Advertising</label><Br>
   <textarea style="width:500px;height:500px;" name="head"><?php echo file_get_contents('data/head'); ?></textarea><Br>
  </fieldset>
   </fieldset>
   <label for="formGroupExampleInput">Header for Login</label><Br>
   <textarea style="width:500px;height:500px;" name="loginh"><?php echo file_get_contents('data/loginhead'); ?></textarea><Br>
  </fieldset>
    </fieldset>
   <label for="formGroupExampleInput">Footer for Login</label><Br>
   <textarea style="width:500px;height:500px;" name="loginf"><?php echo file_get_contents('data/loginfoot'); ?></textarea><Br>
  </fieldset>
<button type="submit" class="btn btn-primary">Change Settings</button>

</form>
						</div></div>
						</div>
						</div>


<?php include 'include/footer.php'; ?>
