<?php
session_start();
include '../../path.php';
// include('../../app/database/db.php'); 
include '../../app/controllers/users.php';


?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Custom Styling -->
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>admin</title>
</head>
<body>
<?php include("../../app/include/header-admin.php"); ?>
<div class="container">
<?php    include('../../app/include/sidebar.php'); ?>
        <div class="posts col-8 offset-1">
            <div class="button row">
                <a href="create.php" class="col-2 btn btn-success ">Создать пользователя</a>
                <a href="index.php" class="col-2 offset-1 btn btn-warning ">Управление пользователями</a>
            </div>
      
<div class="row title-table">
    <h2> пользователями</h2>
    <div class="id col-1 ">ID</div>
    <div class="titile col-2 ">логин</div>
    <div class="titile col-3 ">mail</div>
    <div class="avtor col-2 ">роль</div>
    <div class="red col-2 ">Редактировать</div>
    <div class="del col-2 ">Удалить</div>
</div>
<?php foreach($users as $key => $user): ?>
<div class="row post ">
    <div class="id col-1 "><?=$key+1?></div>
    <div class="titile col-2 "><?=$user['username']?></div>
    <div class="titile col-3 "><?=$user['email']?></div>
    <?php if($user['admin']==1): ?>
    <div class="avtor col-2 ">Администратор</div>
    <?php else: ?>
        <div class="avtor col-2 ">Пользователь</div>
        <?php endif;?>
    <div class="red col-2 "><a href="edit.php?edit_user=<?=$user['id']?>">edit</a>   </div>
   
    <div class="del col-2 "><a href="index.php?del_us_id=<?=$user['id']?>">delete</a></div>
</div>
<?php endforeach;?>


        </div>
    </div>
</div>



<!-- // footer -->


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
-->
</body>
</html>