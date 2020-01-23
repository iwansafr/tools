<div class="col-md-12">
	<div class="col-md-6">
		<h5>db 1</h5>
		<div class="form-group">
			<input type="text" placeholder="hostname" name="host1" value="<?php echo @$_POST['host1']?>" class="form-control">
		</div>
		<div class="form-group">
			<input type="text" placeholder="username" name="username1" value="<?php echo @$_POST['username1']?>" class="form-control">
		</div>
		<div class="form-group">
			<input type="password" placeholder="password" name="password1" value="<?php echo @$_POST['pasword1']?>" class="form-control">
		</div>
		<div class="form-group">
			<input type="text" placeholder="db name" name="db1" value="<?php echo @$_POST['db1']?>" class="form-control">
		</div>
		<div class="form-group">
			<input type="text" placeholder="db table name" name="tb1" value="<?php echo @$_POST['tb1']?>" class="form-control">
		</div>
	</div>
	<div class="col-md-6">
		<h5>db 2</h5>
		<div class="form-group">
			<input type="text" placeholder="hostname" name="host2" value="<?php echo @$_POST['host2']?>" class="form-control">
		</div>
		<div class="form-group">
			<input type="text" placeholder="username" name="username2" value="<?php echo @$_POST['username2']?>" class="form-control">
		</div>
		<div class="form-group">
			<input type="password" placeholder="password" name="password2" value="<?php echo @$_POST['password2']?>" class="form-control">
		</div>
		<div class="form-group">
			<input type="text" placeholder="db name" name="db2" value="<?php echo @$_POST['db2']?>" class="form-control">
		</div>
		<div class="form-group">
			<input type="text" placeholder="db table name" name="tb2" value="<?php echo @$_POST['tb2']?>" class="form-control">
		</div>
	</div>
</div>

<?php
if(!empty($_POST))
{
	$db1 = new mysqli($_POST['host1'],$_POST['username1'],$_POST['password1'],$_POST['db1']);
	if(empty($db1->error))
	{
		$page = @intval($_GET['page'])
		$result = $db1->query('SELECT * FROM '.$_POST['tb1'].' LIMIT ');
		$data = [];
		$data['fields'] = $result->fetch_fields();
		$data['total'] = $result->num_rows;
		// while($row = $result->fetch_assoc())
		// {
		// 	$data['data'][] = $row;
		// }
		pr($data['data']);die();
		if(!empty($data['data']))
		{
			$db2 = new mysqli($_POST['host2'],$_POST['username2'],$_POST['password2'],$_POST['db2']);
			if(empty($db2->error))
			{
				$fields = [];
				foreach ($data['fields'] as $key => $value) 
				{
					$fields[] = $value->name;
				}
				if(!empty($fields))
				{
					$fields = implode(',',$fields);
					$fields = '('.$fields.')';
				}
				$sql = 'INSERT INTO '.$_POST['tb2'].$fields .' VALUES';
				$tmp_sql = [];
				foreach ($data['data'] as $key => $value) 
				{
					$values = [];
					foreach ($data['fields'] as $fkey => $fvalue) 
					{
						if(is_numeric($value[$fvalue->name]))
						{
							$values[] = $value[$fvalue->name];
							// pr($value[$fvalue->name]);
							// pr('angka');
						}else{
							// pr($value[$fvalue->name]);
							// pr('bukan angka');
							if(empty($value[$fvalue->name]))
							{
								$values[] = 'NULL';
							}else{
								$values[] = "'".$value[$fvalue->name]."'";
							}
						}
					}
					$values = implode(",",$values);
					$values = "(".$values.")";
					$tmp_sql[] = $values;
				}
				$tmp_sql = implode(",",$tmp_sql);
				$sql .= $tmp_sql;
				pr($sql);
				$result = $db2->query($sql);
				pr($result);
			}			
		}
	}
}
?>