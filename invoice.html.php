<html lang="en"><head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>esftgreat - Invoice #<?php echo time(); ?></title>
	<link href="all.min.css" rel="stylesheet">
	<link href="invoice.css" rel="stylesheet">
</head>
<body>
	<div class="container-fluid invoice-container">
			<div class="row invoice-header">
				<div class="invoice-col">
					<p><img src="logo.png" title="esoftgreat"></p>
					<h3>Invoice #<?php echo time(); ?></h3>
				</div>
				<?php

				$style = ($_POST['status'] == 'PAID') ? 'color : green;' : 'color: red';
				$color = ($_POST['status'] == 'PAID') ? 'green' : 'red';
				?>
				<div class="invoice-col ">
					<div class="invoice-status" style="border : <?php echo $color ?> solid 1px; text-align: center;">
						<span style="<?php echo $style ?>"><?php echo $_POST['status'] ?></span>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="invoice-col right">
					<strong>Pay To</strong>
					<address class="small-text">
						esoftgreat<br>
						Alamat : <br>
						Jl. Tulakan Km 01,
						Donorojo Jepara <br>
						Telp : 08540510460 / 085290335332
					</address>
				</div>
				<div class="invoice-col">
					<strong>Invoiced To</strong>
					<address class="small-text">
						<?php echo $_POST['invoice_to'] ?>
					</address>
				</div>
			</div>
			<div class="row">
				<div class="invoice-col right">
					<strong>Payment Method</strong><br>
					<span class="small-text">
						Transfer ke Bank BCA
					</span>
					<br><br>
				</div>
				<div class="invoice-col">
					<strong>Invoice Date</strong><br>
					<span class="small-text">
						<?php echo date('d/m/Y') ?><br><br>
					</span>
				</div>
			</div>
			<br>
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Notes</strong></h3>
			</div>
			<div class="panel-body">
				<?php echo $_POST['notes'] ?>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong>Invoice Items</strong></h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-condensed">
						<thead>
							<tr>
								<td><strong>Description</strong></td>
								<td width="25%" class=""><strong>Amount</strong></td>
							</tr>
						</thead>
						<tbody>
							<?php
							$items = $_POST['items'];
							$items = explode(',',$items);
							$each_item = array();
							$sub_total = 0;
							foreach ($items as $key => $value)
							{
								$value = explode('=', $value);
								$each_item[$value[0]] = (int) $value[1];
							}
							foreach ($each_item as $key => $value)
							{
								?>
								<tr>
									<td>
										<?php echo $key ?>
									</td>
									<td class="">
										<?php echo 'Rp. '.number_format($value, 2, ',', '.'); ?>
									</td>
								</tr>
								<?php
								$sub_total += $value;
							}
							$ppn = ($sub_total*10)/100;
							$total = $sub_total+$ppn;
							?>

							<tr>
								<td class="total-row text-right"><strong>Sub Total</strong></td>
								<td class="total-row "><?php echo 'Rp. '.number_format($sub_total, 2, ',', '.'); ?></td>
							</tr>
							<tr>
								<td class="total-row text-right"><strong>10.00% PPN</strong></td>
								<td class="total-row "><?php echo 'Rp. '.number_format($ppn, 2, ',', '.'); ?></td>
							</tr>
							<tr>
								<td class="total-row text-right"><strong>Credit</strong></td>
								<td class="total-row ">Rp. 0,00 </td>
							</tr>
							<tr>
								<td class="total-row text-right"><strong>Total</strong></td>
								<td class="total-row "><?php echo 'Rp. '.number_format($total, 2, ',', '.'); ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<p>* Indicates a taxed item.</p>
		<div class="transactions-container small-text">
			<div class="table-responsive">
				<table class="table table-condensed">
					<thead>
						<tr>
							<td class=""><strong>Transaction Date</strong></td>
							<td class=""><strong>Gateway</strong></td>
							<td class=""><strong>Transaction ID</strong></td>
							<td class=""><strong>Amount</strong></td>
						</tr>
					</thead>
					<tbody>
														<tr>
								<td class=""><?php echo date('d/m/Y') ?></td>
								<td class="">Transfer ke Bank BCA</td>
								<td class="">BCA-<?php echo substr(time(), 0,4).'-'.substr(time(), 5,8) ?></td>
								<td class=""><?php echo 'Rp. '.number_format($total, 2, ',', '.'); ?></td>
							</tr>
													<tr>
							<td class="text-right" colspan="3"><strong>Balance</strong></td>
							<td class="">Rp. 0,00 </td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="pull-right btn-group btn-group-sm hidden-print">
			<a href="javascript:window.print()" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
			<!-- <a href="dl.php?type=i&amp;id=871068" class="btn btn-default"><i class="fa fa-download"></i> Download</a> -->
		</div>
	</div>
	<!-- <p class=" hidden-print"><a href="clientarea.php">« Back to Client Area</a></p> -->
</body>
</html>