<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/style_info.css">
	<title>МЧC</title>
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


	<div class="main">
		<div class="conteiner-top">
			<h2 style="margin-left: 16px;">Информация о военнослужащих</h2>

		</div>
		<div class="mode">
			<div class="mode-item" id="add"><a href="personal_card_add.php"><img src="image/add.png" width ="32px"></br>Добавить</a></div>
		</div>
		<div class="container">
			<div class="type">

				<div class="dropdown" style="margin-left: 16px">
					<button>Подразделение &#9660</button>
					<div class="dropdown-content">
						<label><input type="checkbox" id="checkbox_dep">Выбрать все</label>
						<div id="controls_dep">
							<?php  
							$conn = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');
							$sql = "SELECT DISTINCT pr2 FROM inn ORDER BY `inn`.`pr2` ASC";
							$result = $conn->query($sql);
							while($row = $result->fetch()){
								echo "<label><input type='checkbox' name='departament' value='$row[0]'>$row[0]</label>";
							}
							?>
						</div>
					</div>
				</div>
				<script>
					$('#controls_dep input:checkbox').click(function(){
						if($(this).is(':checked')){
							$('#checkbox_dep').prop('checked',false);
						} else{
							$('#checkbox_dep').prop('checked',false);
						}
					});

					$('#checkbox_dep').click(function(){
						if ($(this).is(':checked')){
							$('#controls_dep input:checkbox').prop('checked', true);
						} else {
							$('#controls_dep input:checkbox').prop('checked', false);
						}
					});
				</script>
				<div class="dropdown">
					<button>Звание &#9660</button>
					<div class="dropdown-content">
						<label><input type="checkbox" id="checkbox_rank">Выбрать все</label>
						<div id="controls_rank">
							<?php  
							$conn = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');
							$sql = "SELECT DISTINCT rank FROM rank ORDER BY `rank`.`rank` ASC";
							$result = $conn->query($sql);
							while($row = $result->fetch()){
								echo "<label><input type='checkbox' name='rank' value='$row[0]'>$row[0]</label>";
							}
							?>
						</div>

					</div>
					<script>
						$('#controls_rank input:checkbox').click(function(){
							if($(this).is(':checked')){
								$('#checkbox_rank').prop('checked',false);
							} else{
								$('#checkbox_rank').prop('checked',false);
							}
						});

						$('#checkbox_rank').click(function(){
							if ($(this).is(':checked')){
								$('#controls_rank input:checkbox').prop('checked', true);
							} else {
								$('#controls_rank input:checkbox').prop('checked', false);
							}
						});

						$('#checkbox_serj').click(function(){
							if ($(this).is(':checked')){
								$('#controls_rank_serj input:checkbox').prop('checked', true);
							} else {
								$('#controls_rank_serj input:checkbox').prop('checked', false);
							}
						});
						$('#controls_rank_serj input:checkbox').click(function(){
							if($(this).is(':checked')){
								$('#checkbox_serj').prop('checked',false);
							} else{
								$('#checkbox_serj').prop('checked',false);
							}
						});

						$('#checkbox_oficer').click(function(){
							if ($(this).is(':checked')){
								$('#controls_rank_oficer input:checkbox').prop('checked', true);
							} else {
								$('#controls_rank_oficer input:checkbox').prop('checked', false);
							}
						});
						$('#controls_rank_oficer input:checkbox').click(function(){
							if($(this).is(':checked')){
								$('#checkbox_oficer').prop('checked',false);
							} else{
								$('#checkbox_oficer').prop('checked',false);
							}
						});

						$('#checkbox_prap').click(function(){
							if ($(this).is(':checked')){
								$('#controls_rank_prap input:checkbox').prop('checked', true);
							} else {
								$('#controls_rank_prap input:checkbox').prop('checked', false);
							}
						});
						$('#controls_rank_prap input:checkbox').click(function(){
							if($(this).is(':checked')){
								$('#checkbox_prap').prop('checked',false);
							} else{
								$('#checkbox_prap').prop('checked',false);
							}
						});			
					</script>
					
				</div>
				<div class="more">
					<div id="more" onclick="addFilters();">Раcширенный поиск &#9660</div>
				</div>
				<div class="more-content">
					<div class="filter1"></div>

				</div>

				<script type="text/javascript">
					function addFilters(){
						alert('a');
					}
				</script>

				<button id="sub" onclick="get_pers()">Сформировать</button>

				<button id="exp_xls" onclick="exportTableToExcel('output')" style="float: right; margin-right: 300px;">Экспорт таблицы в Exel</button>

				<button id="exp_docx" onclick="exportTableToWord('output')" style="float: right; margin-right: 16px;">Экспорт таблицы в Word</button>

				</script>
				<script>
					function get_pers(){
						depsArray = new Array();
						ranksArray = new Array();
						$('input[name="departament"]:checked').each(function() {depsArray.push(this.value);});
						$('input[name="rank"]:checked').each(function() {ranksArray.push(this.value);});
						$.ajax({
							type:"POST",
							url:"php_scripts/select.php",
							data: {"departament[]":depsArray,"rank[]":ranksArray},
							cache: false,
							success: function(responce){ 

								$('table#output').html(responce);
							}
						})
					}
				</script>
			</div>
			<div class="content">

				<div class="spisok">

					<table class="table" id="output">
					</table>
				</div>
			</div>
		</div>
		<script>
				$('.dropdown').css('cursor','pointer');
				$('#output').css('cursor','pointer');
				$('#output').on('click','.table_row',function(){
					a = $(this).find('.item').attr('id');
					window.open("personal_card.php?id="+a, '_blank').focus();
					get_pers_more(a);
			})

		</script>

		<script>



		</script>
		<script>
			function get_pers_more(a){
				$.ajax({
					type:"POST",
					url:"php_scripts/select_more.php",
					data: {"id":a},
					cache: false,
					success: function(responce){ 
						$('.popup').html(responce);
					}
				})
			}
		</script>
		<script>
			$(function(){
				$('#output').on('click','.item',function(){
					a = $(this).attr('id');
					d = $(this).text();
					if ($(this).attr('value') != 'DESC') {
						b = 'DESC';
						c = '&#9650;';

					}
					else{
						b = 'ASC';
						c = '&#9660;';
					}
						depsArray = new Array();
						ranksArray = new Array();
						$('input[name="departament"]:checked').each(function() {depsArray.push(this.value);});
						$('input[name="rank"]:checked').each(function() {ranksArray.push(this.value);});

						$.ajax({
							type:"POST",
							url:"php_scripts/order.php",
							data: {"departament[]":depsArray,"rank[]":ranksArray, "id":a, "type":b, "arrow":c},
							cache: false,
							success: function(responce){ 

								$('table#output').html(responce);

								$('td#'+a).append(c);
								$('td#'+a).attr('value',''+b)
							}
						})

					})

			})
		</script>
		<script>
		function exportTableToExcel(tableId, filename = 'Штат.xls') {//docx->xls
    let dataType = 'application/vnd.ms-exel';//word->exel
    let tableSelect = document.getElementById(tableId);
    let tableHTML = encodeURIComponent(tableSelect.outerHTML.replace(/ or .*?>/g, '>'));
    let link = document.createElement("a");
    link.href = `data:${dataType}, ${tableHTML}`;
    link.download = filename;
    link.click();
}

		function exportTableToWord(tableId, filename = 'Штат.docx') {//docx->xls
    let dataType = 'application/vnd.ms-word';//word->exel
    let tableSelect = document.getElementById(tableId);
    let tableHTML = encodeURIComponent(tableSelect.outerHTML.replace(/ or .*?>/g, '>'));
    let link = document.createElement("a");
    link.href = `data:${dataType}, ${tableHTML}`;
    link.download = filename;
    link.click();
}
</script>
	</div>
</body>
</html>