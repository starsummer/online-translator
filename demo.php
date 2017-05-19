<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js">
	</script>
	<title>Document</title>
</head>
<body>
	<button id="ajax">ajax</button>
</body>
<script type="text/javascript">
	$(document).ready(function () {
		$(".contenttext").mouseup(function (e) {
			var txt;
			var parentOffset = $(this).offset();
			var x = e.pageX - parentOffset.left;
			var y = e.pageY - parentOffset.top;
			txt = window.getSelection();
			if (txt.toString().length > 1) {
				alert(txt);
			}
		});
	});
</script>
</html>