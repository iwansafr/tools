<?php
if(!empty($_POST))
{
	$before = $_POST['code'];
	# $after = preg_replace("/(\/[^>]*>)([^<]*)(<)/","\\1\\3",$before);
	$after = trim(str_replace(array("\n","\r","\t"," ","\0","\x0B"),'', $before));
	// $after = preg_replace("/\r|\n/", "", $before);
	// $after = $before;
	?>
	<textarea id="my_code" class="form-control" name="code" rows="7" style="color: green;"><?php echo $after ?></textarea>
	<?php
}