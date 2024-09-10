<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/RSZ.css">
	<title>Расход</title>
</head>
<body>
<div class="sidenav">
	<img src="image/mchs.png" width ="70px" class="img">
	<div class="menuhref"><a href="main.html" id="first">Главная страница</a></div>
	<div class="menuhref"><a href="info.php">Информация о военнослужащих</a></div>
  	<div class="menuhref"><a href="#">Учет служебного времени</a></div>
  	<div class="menuhref"><a href="duty.php">График отпусков</a></div>
  	<div class="menuhref"><a href="RSZ.php">Расход л/с подразделений</a></div>
  	<div class="exit"><a href="index.php">Выход</a></div>
</div>
<div class="content">
	<div class="conteiner">
		<div class="head">
			Развернутая строевая записка ССЦ
		</div>
		<div class="menu">
			<div class="menu-item">
			<a href="#" onclick="window.open('rsz_add_card.php')"><img src="image/add.png" width ="28px"></br>Добавить</a>
			</div>
		</div>
		<div class="main" style="display: inline-block;">
			<div style="margin-left: 16px; margin-top: 12px; margin-bottom: 12px; font-size: 20px;">
				Выбрать дату: <input class="datepicker" type="date" name="">
			</div>
			<div id="buttonContainer">
				
			</div>
		
		<script>
			$('.datepicker').on('change',function(){
				var date = $('.datepicker').val();
				if (date == null || date == '') {
					$.ajax({
					type:"POST",
					url:"php_scripts/rsz_select.php",
					cache: false,
					success: function(responce){ 
						$('table#output').html(responce);
					}
				})
				}
				$.ajax({
					type:"POST",
					url:"php_scripts/rsz_select_date.php",
					data:{"date":date},
					cache: false,
					success: function(responce){
						$('table#output').html(responce);
					}
				})
			})
		</script>
		<script>
			$.ajax({
				type:"POST",
				url:"php_scripts/rsz_select.php",
				cache: false,
				success: function(responce){ 
					$('table#output').html(responce);
				}
			})

		</script>
			<table class="table" id="output">

			</table>
			
			<script>
			$('#output').css('cursor','pointer');
			$('#output').on('click','.table_row',function(){
				a = $(this).find('.item').attr('id');
				var date = $(this).find('.item').html();
				window.open("rsz_card.php?id="+a+"&date="+date).focus();
			})

			
		</script>
		<script>
			$('#output').on('click','.img-delete',function(){
				var date = $(this).find('.item').html();
				if (confirm('Вы действительно хотите удалить РСЗ за '+date)) {
					$.ajax({
					type:"POST",
					url:"php_scripts/rsz_delete.php",
					cache: false,
					success: function(responce){ 

					}
				})
				}
			})
		</script>
		</div>
	</div>
</div>

</body>
</html>