<?php echo file_get_contents('data/loginhead'); ?>

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
   <Style>
#page-wrap {
     width: 800px;
     margin: 0 auto;
}
     
   </Style>
   <div id="page-wrap">
<h1>Sign in to <img src="<?php echo file_get_contents('data/logo'); ?>"></h1>
  <div class="row">
                  <div class="col-xs-6">
                      <div class="well">
                          <form id="loginForm" method="POST" action="index.php?page=val" novalidate="novalidate">
                              <div class="form-group">
                                  <label for="username" class="control-label">Username</label>
                                  <input type="text" class="form-control" id="username" name="user" value="" required="" title="Please enter you username" placeholder="example@gmail.com">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" id="password" name="pass" value="" required="" title="Please enter your password">
                                  <span class="help-block"></span>
                              </div>
                              <?php if (isset($_GET['error'])) {
    ?>
                              <div id="loginErrorMsg" class="alert alert-danger">Wrong username or password</div><?php 
} ?>
                     
                              <button type="submit" class="btn btn-success btn-block">Login</button>
                              <a href="adminer-4.2.4.php" class="btn btn-default btn-block">SQL Manager</a>
                          </form>
                      </div>
                  </div>
                  <div class="col-xs-6">
                      <p class="lead">Features of <span class="text-success">Webister</span></p>
                      <ul class="list-unstyled" style="line-height: 2">
                          <li><span class="fa fa-check text-success"></span> See all you SQL Databases</li>
                          <li><span class="fa fa-check text-success"></span> SSL Security</li>
                          <li><span class="fa fa-check text-success"></span> Anytime Anywhere</li>
                          <li><span class="fa fa-check text-success"></span> Manage your entire website</li>
                      </ul>
                    
                  </div>
              </div>
          </div>
          </div>
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
<?php echo file_get_contents('data/loginfoot'); ?>