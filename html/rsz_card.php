<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/RSZ.css">	
	<title></title>
</head>
<body>
	<div class="conteiner">
		<div class="head">
			Развернутая строевая записка CСЦ от <?php echo $_GET['date']; ?>
		</div>
		<div class="content" style="margin-left: 0px;">
		<script>
			var a = "<?php echo $_GET['date']; ?>";
			$.ajax({
				type:"POST",
				url:"php_scripts/rsz_card_select.php",
				data:{"date": a},
				cache: false,
				success: function(responce){ 
					$('table#output').html(responce);
				}
			})
		</script>
			<table class="table" id="output">
			</table>
		</div>
	</div>
</body>
</html>