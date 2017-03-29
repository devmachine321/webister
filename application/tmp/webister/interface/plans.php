<?php include 'include/head.php'; ?>
	<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Plans</h2>
						<?php 
                        if (isset($_GET['yes'])) {
                            $file = '<'.'?php ';
                            $file = $file.'$'."name='".$_POST['title']."'".'; ';
                            $file = $file.'$'."disk='".$_POST['disk']."'".'; ';
                            $file = $file.'$'."pstart='".$_POST['pstart']."'".'; ';
                            $file = $file.'$'."pend='".$_POST['pend']."'".'; ';
                            $file = $file.'$'."cost='".$_POST['cost']."'".'; ';
                            file_put_contents('data/plans/'.$_POST['title'].'.php', $file);
                        }
                        ?>
												<form method="POST" action="?yes">
  <fieldset class="form-group">
    <label for="formGroupExampleInput">Name</label>
    <input type="text" class="form-control" name="title" id="formGroupExampleInput" placeholder="">
  </fieldset>
    <fieldset class="form-group">
    <label for="formGroupExampleInput">Disk Space in MB</label>
    <input type="text" class="form-control" name="disk" id="formGroupExampleInput" placeholder="">
  </fieldset>
    <fieldset class="form-group">
    <label for="formGroupExampleInput">Port Range Start</label>
    <input type="text" class="form-control" name="pstart" id="formGroupExampleInput" placeholder="">
  </fieldset>
    <fieldset class="form-group">
    <label for="formGroupExampleInput">Port Range End</label>
    <input type="text" class="form-control" name="pend" id="formGroupExampleInput" placeholder="">
  </fieldset>
    <fieldset class="form-group">
    <label for="formGroupExampleInput">Cost</label>
    <input type="text" class="form-control" name="cost" id="formGroupExampleInput" placeholder="">
  </fieldset>
<button type="submit" class="btn btn-primary">Add Plan</button>
</form>
									<table class="table">
    <thead>
      <tr>
        <th>Plan Name</th>
        <th>Plan Disk Space</th>
		<th>Plan Port Range Start</th>
		<th>Plan Port Range End</th>
		<th>Cost</th>
		<th>APICODE</th>
      </tr>
    </thead>
    <tbody>
	<?php
    $dir = scandir('data/plans');
    foreach ($dir as $file) {
        if ($file == '.' || $file == '..') {
        } else {
            include 'data/plans/'.$file;
            if (!file_exists('data/'.sha1(md5($name)).'.php')) {
                file_put_contents('data/'.sha1(md5($name)).'.php', '<'.'?'.'php'.' '.'$'.'suppose'.'='."'".$name."';".'?'.'>');
            } ?>
			  <tr>
        <td><?php echo $name; ?></td>
        <td><?php echo $disk; ?></td>
		<td><?php echo $pstart; ?></td>
		<td><?php echo $pend; ?></td>
		<td><?php echo $cost; ?></td>
		<td><?php echo sha1(md5($name)); ?></td>
      </tr>
			<?php

        }
    }
    ?>
<?php include 'include/footer.php'; ?>