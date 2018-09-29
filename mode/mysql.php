<?php

$result = mysqli_query($db, $_POST['code']);
$output = array();
if(is_object($result))
{
	while($data = mysqli_fetch_array($result))
	{
		// pr($data);
		$output[] = $data;
	}
	$result = array();
	foreach ($output as $key => $value)
	{
		foreach ($value as $skey => $svalue)
		{
			if(!is_numeric($skey))
			{
				$result[$key][$skey] = $svalue;
			}
		}
	}
	?>
	<br>
	<div class="table-responsive">
		<table class="table table-bordered table-hover table-striped">
			<thead>
				<tr>
					<?php
					foreach ($result as $key => $value)
					{
						foreach ($value as $skey => $svalue)
						{
							echo '<th>'.$skey.'</th>';
						}
						break;
					}
					?>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($result as $key => $value)
				{
					echo '<tr>';
					foreach ($value as $skey => $svalue)
					{
						echo '<td>'.$svalue.'</td>';
					}
					echo '</tr>';
				}
				?>
			</tbody>
		</table>
	</div>
	<?php
}else{
	echo mysqli_error($db)."\n";
	echo mysqli_info($db)."\n";
	echo mysqli_stat($db)."\n";

}
