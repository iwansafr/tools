<style type="text/css">
	/*#text{
		background: yellow;
	}*/
</style>
<?php
$code = encrypt($_POST['code']);
echo '<br>';
echo '<input id="text" value="'.$code.'" readonly style="width: 100%;">';
echo "\n";
?>
<button onclick="copy()">copy to clipboard</button>
<script type="text/javascript">
	function copy()
	{
		var a = document.getElementById('text');
		// console.log(a);
		a.select();
		document.getSelection();
		document.execCommand('copy');
		// document.getSelection();
		// document.execCommand('copy');
	}
	// document.getElementById('copy').addEventListener('click', function(e){
	// 	var a = document.getElementById('text').innerHTML;
	// 	// e.clipboardData.setData('text/plain', a);
	// 	data = ClipboardEvent.clipboardData;
	// 	alert(a);
	// 	alert(data);
	// });
	// document.addEventListener('copy',function(e){
	// 	e.clipboardData.setData('text/plain', 'Hello World');
	// });
</script>