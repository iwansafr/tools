<style type="text/css">
	#text{
		background: yellow;
	}
</style>
<?php
echo '<br>';
echo '<mark id="text">';
echo encrypt($_POST['code']);
echo '</mark>';
echo "\n";
// echo '<button id="copy">copy</button>';
?>
<script type="text/javascript">
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