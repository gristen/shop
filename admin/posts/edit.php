<?php
include '../../path.php';
include '../../app/controllers/posts.php';

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
    <div class="row">
    <?php    include('../../app/include/sidebar.php'); ?>
        <div class="posts col-8 offset-1">
            <div class="button row">
                <!-- <a href="create.php" class="col-2 btn btn-success ">add post</a>
                <a href="index.php" class="col-2 offset-1 btn btn-warning ">manage posts</a> -->
            </div>
<div class="row title-table">
    <h2>редактирование записи</h2>
   
   
</div>
<div class="row add-post ">
   <form action="edit.php" method="post" enctype="multipart/form-data" >
   <input name="id"  type="hidden" value="<?=$id;?>">  
   <div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Название статьи </label>
  <input name="title" value="<?=$title?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="title">
</div>
<div class="mb-3">
<label for="editor" class="form-label">Содержимое записи</label>
  <textarea id="editor"  name="content" class="form-control"  rows="6"><?=$content?></textarea>
</div>
<div class="input-group mb-3">
  <input name="image" type="file" class="form-control" id="inputGroupFile02">
  <label class="input-group-text" for="inputGroupFile02">Upload</label>
</div>
<select name="topic" class="form-select" aria-label="Default select example">
 
  <?php foreach($topics as $key => $topic): ?>
    <option value="<?=$topic['id']?>" ><?=$topic['name']?></option>
    <?php endforeach; ?>
</select>


<div class="form-check">
    <?php if(empty($status) && $status == 0) : ?>
  <input name="publish" class="form-check-input" type="checkbox"  id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    Опобликовать сразу?
  </label>
  <?php else:  ?>
    <input name="publish" class="form-check-input" type="checkbox" value="1"  id="flexCheckDefault" checked>
  <label class="form-check-label" for="flexCheckDefault">
    Опобликовать сразу
  </label>
  <?php endif; ?>
</div>
<button class="btn btn-primary mt-3" name="edit_post" type="submit">Сохранить запись</button>
   </form>
</div>
        </div>
    </div>
</div>


<?php include("../../app/include/footer.php"); ?>
<!-- // footer -->


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
-->
<script src="../../assets/js/scripts.js" ></script>
</body>
</html>