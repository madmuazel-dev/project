<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <title>Карточка персонала</title>
  <link rel="stylesheet" href="css/style_personal_card.css">
</head>
<body>
<?php

$id = $_GET['id'];

require 'php_scripts/select_more.php';
  
?>
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
  })
</script>

<div class="card">
  
    <div class="image">
      <div>
        <img src="image/mchs.png" id="preview">
      </div>  
      <div>
        <form action="upload.php" method="post" enctype="multipart/form-data">
          <input type="file" id="imageInput" accept="image/*" onchange="displayImage(this)"/>
        </form>
      </div>
    </div>
<form>
    <div class="head">
      <p style="padding-left: 16px;">ФИО: <input id="<?php echo $row["id_personal"];?>" class="FIO" type="text" value="<?php echo $row["surname"].' '.$row["name"].' '.$row["secname"];?>"></p>

    </div>

    <div class="content">

      <div class="info">
        <table>
          <tr>
            <td>Дата рождения:</td>
            <td><input style="" type="date" name="" value="<?php echo $row["birthday"];?>"></td>
          </tr>
          <tr>
            <td>Пол:</td>
            <td><select id="sex" name="<?php echo $row["sex"];?>"><option id="fem">муж</option><option id="mal">жен</option></select></td>
          </tr>
        </table>
      </div>
      <div class="info">
        <table>
          <tr>
            <td>Полных лет:</td>
            <td><input style="" type="text" name="" value="<?php echo $age;?>"></td>
          </tr>
          <tr>
            <td>Снилс:</td>
            <td><input style="" type="text" name="" value=""></td>
          </tr>
        </table>
      </div>
      <div class="info">
        <table>
          <tr>
            <td>Телефон 1:</td>
            <td><input style="" type="phone" name="" value="<?php echo $row["phone1"];?>"></td>
          </tr>
          <tr>
            <td>Телефон 2:</td>
            <td><input style="" type="phone" name="" value="<?php echo $row["phone2"];?>"></td>
          </tr>
        </table>
      </div>
    </div>
  </form>
    <div class="menu">
        <input type="submit" id="main" value="Основные данные" onclick="get_main_info()">
        <input type="submit" id="docs" value="Документы" onclick="get_docs()">
        <input type="submit" id="education" value="Образование" onclick="get_education()">
        <input type="submit" id="" value="Личная информация" onclick="get_ls()">
        <input type="submit" id="history" value="История" onclick="get_history()">
        <input type="submit" class="btn" id="dolj" value="Перенос" onclick="get_filt()">
    </div>

    
    <div class="line"></div>
    <div class="bottom">
      <table class="table" id="output">

      </table>
      <div class="perenos_t" id="output2">
        
      </div>  


      <div class="save-button">
        <input type="submit" id="save-button-1" name="" value="Сохранить изменения">
        <input type="submit" id="delete-button-1" value="Удалить сотрудника" onclick="del()">
      </div>
    </div>
</div>

<script>
  
function get_ls(){
  var a = $(document).find('.FIO').attr('id');
  $.ajax({
    type:"POST",
    url:"php_scripts/get_ls.php",
    data: {"id": a},
    cache: false,
    success: function(responce){ 
      $('div#output2').html(responce);
    }
  }) 
}

</script>

<script>
  function del(){
    var a = $(document).find('.FIO').attr('id');
    $.ajax({
      type:"POST",
      url:"php_scripts/delete.php",
      data:{"id":a},
      cache: false,
      success: function(){
        alert('Сотрудник удален');
      }
    })
  }
</script>

<script>
  function get_history(){
    var a = $(document).find('.FIO').attr('id');
    $.ajax({
      type:"POST",
      url:"php_scripts/personal_card_history_select.php",
      data: {"id":a},
      cache: false,
      success: function(responce){ 
        $('div#output2').html(responce);
      }
    })
  }

</script>

<script>
      function get_main_info(){
        $("#main").css({"backgroundColor": "white"});
        $("#docs").css({"backgroundColor": "#bac0cf"});
        $("#education").css({"backgroundColor": "#bac0cf"});
        var a = $(document).find('.FIO').attr('id');
            $.ajax({
              type:"POST",
              url:"php_scripts/personal_card_main_info_select.php",
              data: {"id":a},
              cache: false,
              success: function(responce){ 

                $('div#output2').html(responce);
                dep = $('#select-departament').attr('name');
                $('#select-departament option[value='+dep+']').prop('selected', true);
                rank = $('#select-rank').attr('name');
                $('#select-rank option[value='+rank+']').prop('selected', true);
                
              }
            })
          }
</script>

<script>
      function get_docs(){
        $("#docs").css({"backgroundColor": "white"});
        $("#education").css({"backgroundColor": "#bac0cf"});
        $("#main").css({"backgroundColor": "#bac0cf"});
        var a = $(document).find('.FIO').attr('id');
            $.ajax({
              type:"POST",
              url:"php_scripts/personal_card_docs_select.php",
              data: {"id":a},
              cache: false,
              success: function(responce){ 

                $('div#output2').html(responce);
              }
            })
          }
</script>

<script>
      function get_education(){
        $("#education").css({"backgroundColor": "white"});
        $("#main").css({"backgroundColor": "#bac0cf "});
        $("#docs").css({"backgroundColor": "#bac0cf "});
        a = $(document).find('.FIO').attr('id');
            $.ajax({
              type:"POST",
              url:"php_scripts/personal_card_education_select.php",
              data: {"id":a},
              cache: false,
              success: function(responce){ 

                $('div#output2').html(responce);
              }
            })
          }
</script>

<script>
  if ($('#sex').attr('name') == 'муж') {
    $("#sex option[id='fem']").attr("selected", "selected");
  }
  else{
    $("#sex option[id='mal']").attr("selected", "selected");
  }

</script>
<script>
  
function perenos(id){
  var id_main = $(document).find('.FIO').attr('id');
  $.ajax({
    type:"POST",
    url:"php_scripts/personal_card_work_update.php",
    data: {"id":id,"id_main":id_main},
    cache: false,
    success: function(a){ 
      var spl = a.split('/');
      var id_main = $(document).find('.FIO').attr('id');
      var work_old = $(document).find('#work_old').html();
      date = prompt('Введите дату приказа', '2024-01-01');
      num = prompt('Введите номер приказа', '');
       $.ajax({
        type:"POST",
        url:"php_scripts/personal_card_work_update2.php",
        data: {"mass[]":spl, "id1":id_main,"id2":id,"work_old":work_old,"date":date,"num":num},
        cache: false,
        success: function(responce){ 
          get_dolj();
        }
      })
    }
  })
}

</script>

<script>
  function delet(id){
    $.ajax({
      type:"POST",
      url:"php_scripts/delete_work_history.php",
      data: {"id":id},
      cache: false,
      success: function(responce){ 
        get_history();
      }
    })
  }
</script>

<script>

  function get_filt(){

    var a = $(document).find('.FIO').attr('id');
    depsArray = new Array();
    $('input[name="deps"]:checked').each(function() {depsArray.push(this.value);});

    $.ajax({
      type:"POST",
      url:"php_scripts/personal_card_perenos_select.php",
      data: {"id":a,"filts[]":depsArray},
      cache: false,
      success: function(responce){ 
        $('div#output2').html(responce);
      }
    })  
  }
</script>
<script type="text/javascript">

function displayImage(inputElement) {
    const file = inputElement.files[0];
    const imageURL = URL.createObjectURL(file);
    document.getElementById('preview').src = imageURL;
    inputElement.value = null;
    document.getElementById('preview').onload = () => URL.revokeObjectURL(imageURL);
}

</script>

</body>
</html>