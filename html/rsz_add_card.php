<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/style_rsz_add_card.css">
	<title></title>
</head>
<body>
<div class="back">
  <img src="image/back.png" width ="60px" class="img-back" id="img-back">   
</div>
<script>
  $('#img-back').hover(
  function() { $(this).attr('src', 'image/back_hover.png'); },
  function() { $(this).attr('src', 'image/back.png'); }
);

  $('#img-back').click(function(){
    window.close();
  });

</script>

<div class="content">
	<h2>
		Развернутая строевая записка ССЦ новая*
	</h2>

  <div class="menu">
    <div>Выбрать дату <input type="date" name="date"></div><br>
    <div style="float: right; width: 30%;">Выбрать подразделение<br> <?php  
              $conn = new PDO('mysql:host=localhost;dbname=ssc', 'root', 'p@$$word');
              $sql = "SELECT DISTINCT pr2 FROM inn ORDER BY `inn`.`pr2` ASC";
              $result = $conn->query($sql);
              while($row = $result->fetch()){
                echo "<label><input type='radio' onclick='select_dep();' name='departament' value='$row[0]'>$row[0]</label><br>";
              }
              ?></div><br>
  <input type="submit" style="right: 16px; bottom: 16px; position: fixed;" onclick="add_rsz();" name="">
  </div>
  <script>
  function select_dep(){
    var value = $('input[name="departament"]:checked').val();
        $.ajax({
          type:"POST",
          url:"php_scripts/select_pers_rsz.php",
          data: {"departament":value},
          cache: false,
          success: function(responce){ 
            $('table#output').html(responce);
          }
        })
  }
</script>
<script>

  function add_rsz(){
    var dep = $('input[name="departament"]:checked').val();
    var j = $('.selector').length;
    var date = $('input[name="date"]').val();
    var select = new Array;
    var id = new Array;
    var col = 0;
    for (var i = 1; i <= j; i++) {
      if ($('select#'+i).val() != "на лицо") {
        select.push($('select#'+i).val());
        id.push($('select#'+i).attr('name'));
        col++;
      };
    };
    alert(j);
    $.ajax({
      type:"POST",
      url:"php_scripts/miss_pers_insert.php",
      data: {"select[]":select,"id[]":id,"date":date,"dep":dep,"col":col,"length":j},
      cache: false,
      success: function(responce){ 
        $('table#output').html(responce);
      }
    })
}
</script>
  <table class="table" id="output" style="position: fixed;">

  </table>
</div>

</body>
</html>