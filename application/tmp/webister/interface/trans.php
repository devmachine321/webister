<?php include 'include/head.php'; ?>
	<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Transactions</h2>
												<table class="table">
    <thead>
      <tr>
        <th>Username</th>
        <th>Date</th>
		<th>Plan</th>
		<th>Cost</th>
		<th>Email</th>
      </tr>
    </thead>
    <tbody>
	<?php
    $dir = scandir('data/transactions');
    foreach ($dir as $file) {
        if ($file == '.' || $file == '..') {
        } else {
            include 'data/transactions/'.$file; ?>
			  <tr>
        <td><?php echo $username; ?></td>
        <td><?php echo $date; ?></td>
		<td><?php echo $plan; ?></td>
		<td><?php echo $cost; ?></td>
		<td><?php echo $mail; ?></td>
      </tr>
			<?php

        }
    }
    ?>
<?php include 'include/footer.php'; ?>