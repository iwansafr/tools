<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="<?php echo 'http://localhost/esg/templates/AdminLTE/assets/bootstrap/'; ?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo 'http://localhost/esg/templates/AdminLTE/assets/'; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- <link href="style.css" rel="stylesheet"> -->
	<!-- <script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script> -->
	<!-- <script src="<?php echo 'http://localhost/esg/templates/AdminLTE/assets/bootstrap/'; ?>js/plugins/ckeditor/ckeditor.js"></script> -->
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<!-- <h1>edrive</h1>
	<form action="" method="post" enctype="multipart/form-data">
		label
	</form> -->
	<link rel="stylesheet" href="codemirror.css">
</head>
<body>
	<div class="container">
		<?php
		include 'config.php';

		?>
		<center style="background: blue;color: white;padding: 0.5%;">
			<h1>esoftgreat tools</h1>
		</center>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-2">
					<div class="list-group">
	          <a href="<?php echo site_url() ?>" class="list-group-item main">PHP</a>
	          <a href="<?php echo site_url().'?mode=mysql' ?>" class="list-group-item">MYSQL</a>
	          <a href="<?php echo site_url().'?mode=format_text' ?>" class="list-group-item">Format Text</a>
	          <a href="<?php echo site_url().'?mode=generate_password' ?>" class="list-group-item">Generate Password</a>
	          <a href="<?php echo site_url().'?mode=generate_user' ?>" class="list-group-item">Generate User</a>
	          <a href="<?php echo site_url().'?mode=filter' ?>" class="list-group-item">Filter</a>
	          <a href="<?php echo site_url().'?mode=copy' ?>" class="list-group-item">copy</a>
	          <a href="<?php echo site_url().'?mode=compressor' ?>" class="list-group-item">compressor</a>
	          <a href="<?php echo site_url().'?mode=csv2json' ?>" class="list-group-item">csv to json</a>
	          <a href="<?php echo site_url().'?mode=invoice' ?>" class="list-group-item">invoice</a>
	          <a href="<?php echo site_url().'?mode=phpinfo' ?>" class="list-group-item">php info</a>
	          <?php 
	          $app_path = glob('/var/www/html/tools/app/*.php');
	          if(!empty($app_path))
	          {
	          	foreach ($app_path as $key => $value) 
	          	{
	          		$title = explode('/', $value);
								$title = end($title);
								$title = str_replace('.php', '', $title);
	          		echo '<a href="http://localhost/tools/?mode='.$title.'" class="list-group-item">'.$title.'</a>';
	          	}
	          }
	          ?>

	        </div>
				</div>
				<div class="col-md-10">
						<?php
						$code = @$_POST['code'];
						$action = (@$_GET['mode'] == 'invoice') ? 'invoice.html.php' : '';
						?>
						<form method="post" action="<?php echo $action ?>">
							<div class="scroller">
								<?php
								$textarea = TRUE;
								if(@$_GET['mode'] == 'generate_password')
								{
									$textarea = FALSE;
									?>
									<label>masukkan password yang akan di generate</label>
									<input type="text" name="code" class="form-control" placeholder="password" value="<?php echo $code; ?>">
									<?php
								}else if(@$_GET['mode'] == 'filter'){
									$textarea = FALSE;
									?>
									<div class="col-md-12">
										<div class="col-md-6">
											<label>Referensi</label>
											<textarea required="" class="form-control" name="code[]" rows="7" style="color: green;"><?php echo @$code[0] ?></textarea>
										</div>
										<div class="col-md-6">
											<label>Tujuan</label>
											<textarea required="" class="form-control" name="code[]" rows="7" style="color: green;"><?php echo @$code[1] ?></textarea>
										</div>
										<div class="col-md-6">
											<label>index</label>
											<input required="" type="text" name="index[]" class="form-control" placeholder="1,2,3" value="<?php echo @$_POST['index'][0] ?>">
										</div>
										<div class="col-md-6">
											<label>index</label>
											<input required="" type="text" name="index[]" class="form-control" placeholder="1,2,3" value="<?php echo @$_POST['index'][1] ?>">
										</div>
									</div>
									<div class="clearfix"></div>
									<?php
								}else if(@$_GET['mode'] == 'copy'){
									$textarea = FALSE;
									?>
									<div class="col-md-12">
										<div class="col-md-6">
											<label>Referensi</label>
											<textarea required="" class="form-control" name="code[]" rows="7" style="color: green;"><?php echo @$code[0] ?></textarea>
										</div>
										<div class="col-md-6">
											<label>Tujuan</label>
											<textarea required="" class="form-control" name="code[]" rows="7" style="color: green;"><?php echo @$code[1] ?></textarea>
										</div>
									</div>
									<div class="clearfix"></div>
									<?php
								}else if(@$_GET['mode'] == 'compressor'){
									?>
									<div class="col-md-12">
										<label>Referensi</label>
										<textarea required="" class="form-control" name="code" rows="7" style="color: green;"><?php echo @$code ?></textarea>
									</div>
									<?php

								}else if(@$_GET['mode'] == 'csv2json'){
									?>
									<div class="col-md-12">
										<div class="form-group">
											<label>CSV</label>
											<textarea required="" class="form-control" name="code" rows="7" style="color: green;"><?php echo @$code ?></textarea>
										</div>
									</div>
									<?php

								}
								else if(@$_GET['mode'] == 'invoice')
								{
									?>
									<div class="col-md-12">
										<label class="danger">Invoice Code</label>
										<input type="text" name="id" placeholder="kode invoice" class="form-control">
										<label>invoice To</label>
										<textarea required="" class="form-control" name="invoice_to" rows="4" ></textarea>
										<label>payment method</label>
										<select class="form-control" name="payment_method">
											<option value="Transfer Bank BCA">Transfer Bank BCA</option>
											<option value="cash">Cash</option>
										</select>
										<label>notes</label>
										<textarea required="" class="form-control" name="notes" rows="4" ></textarea>
										<label>Item</label>
										<textarea required="" class="form-control" name="items" rows="4"  placeholder="kode unik = 120, domain = 120000"></textarea>
										<label>Status</label>
										<select class="form-control" name="status">
											<option value="PAID">PAID</option>
											<option value="UNPAID">UNPAID</option>
										</select>
										<label>give ppn ?</label>
										<select class="form-control" name="ppn">
											<option value="1">Yes</option>
											<option value="0">No</option>
										</select>
										<br>
									</div>
									<?php
								}else if(@$_GET['mode'] == 'phpinfo'){
									phpinfo();
								}else{
									if(@$_GET['mode'] == 'generate_user')
									{
										?>
										<div class="col-md-12">
											<div class="col-md-4">
												<input type="text" name="front_add" placeholder="front additional text" class="form-control" value="<?php echo @$_POST['front_add'] ?>">
											</div>
											<div class="col-md-4">
												<input type="text" name="separator" placeholder="separator" class="form-control" value="<?php echo @$_POST['separator'] ?>">
											</div>
											<div class="col-md-4">
												<input type="text" name="end_add" placeholder="end additional text" class="form-control" value="<?php echo @$_POST['end_add'] ?>">
											</div>
										</div>
										<div class="clearfix"></div>
										<br>
										<?php
									}
									if(!empty($app_path))
				          {
				          	if(!empty($_GET['mode']))
				          	{
					          	foreach ($app_path as $key => $value) 
					          	{
					          		$title = explode('/', $value);
												$title = end($title);
												$title = str_replace('.php', '', $title);
				          			if($_GET['mode'] == $title)
				          			{
				          				include 'app/'.$title.'.php';
				          			}
					          	}
				          	}
				          }
				          ?>
									<div class="clearfix"></div>
									<?php
								}
								?>
							</div>
							<br>
							<input type="submit" name="" class="btn btn-success" value="submit">
							<div class="clearfix"></div>
							<br>
							<hr>
						</form>
							<?php
							if(!empty($_POST))
							{
								$mode = 'php';
								switch (@$_GET['mode'])
								{
									case 'mysql':
										$mode = 'mysql';
										break;

									case 'format_text':
										$mode = 'format_text';
										break;
									case 'generate_password':
										$mode = 'generate_password';
										break;
									case 'filter':
										$mode = 'filter';
										break;
									case 'copy':
										$mode = 'copy';
										break;
									case 'generate_user':
										$mode = 'generate_user';
										break;
									case 'invoice':
										$mode = 'invoice';
										break;
									case 'compressor':
										$mode = 'compressor';
										break;
									case 'csv2json':
										$mode = 'csv2json';
										break;
									case 'phpinfo':
										$mode ='phpinfo';
										break;	
									default:
										$mode = 'php';
										break;
								}
								if($mode != 'invoice')
								{
									include 'mode/'.$mode.'.php';
								}
							}
							?>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo 'http://localhost/esg/templates/AdminLTE/assets/jquery/'; ?>jquery.min.js"></script>
	<script src="<?php echo 'http://localhost/esg/templates/AdminLTE/assets/bootstrap/'; ?>js/bootstrap.min.js"></script>
	<script src="codemirror/lib/codemirror.js"></script>
	<!-- <script src="codemirror/mode/htmlmixed/htmlmixed.js"></script> -->
	<script src="codemirror.js"></script>
	<?php
	if(!empty($textarea))
	{
		?>
		<script>
			var te = document.getElementById("my_code");
		  var editor = CodeMirror.fromTextArea(te, {
		    lineNumbers: true,
		    mode: 'htmlmixed'
		  });
		</script>
		<?php
	}
	?>
	<script type="text/javascript">
	  $('a[href="'+location.href+'"]').addClass('active');
	</script>
	<script src="script.js"></script>
</body>
</html>