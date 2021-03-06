<?php
session_start();
include '../../path.php';
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
    <h2>Создание пользователя</h2>
</div>

<form action="create.php" method="post" >
  
   <div class="">
            <label for="formGroupExampleInput" class="form-label">Ваш логин</label>
            <input type="text" class="form-control" value="<?=$userName?>" name="UserName" id="formGroupExampleInput" placeholder="введите ваш логин...">
        </div>
    
        <div class="">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" value="<?=$email?>" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="введите ваш email...">
        
        </div>
        
        <div class="">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="введите ваш пароль...">
        </div>
     
        <div class="">
            <label for="exampleInputPassword2" class="form-label">Повторите пароль</label>
            <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword2" placeholder="повторите ваш пароль...">
        </div>
        
        <div class="form-check">
   
  <input name="admin" value="1" class="form-check-input" type="checkbox"  id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    admin
  </label>

    <input name="publish" class="form-check-input" type="checkbox"   id="flexCheckDefault" checked>


</div>

<button name="create_user" class="btn btn-primary mt-3" type="submit">Submit form</button>
</form>
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