<?php

include 'path.php';
Include 'app/controllers/topics.php';


$da = selectAllFromPostsWithUsersOnindex('posts','users');
// $da = selectAll('posts', ['status' => 1]);
$top_topic = selectTopTopicsFromPostsOnindex('posts');


?>

<!doctype html>
<html lang="en">

<body>

<?php include("app/include/header.php"); ?>

<!-- блок карусели START-->
<div class="container">
    <div class="row">
        <h2 class="slider-title">Топ публикации</h2>
    </div>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  
        <div class="carousel-inner">
        <?php foreach($top_topic as $key => $topic): ?>
            <?php if($key == 0): ?>
            <div class="carousel-item active">
                <?php else: ?>
                    <div class="carousel-item">
                        <?php endif ;?>
                <img src="<?='assets/images/posts/' .$topic['img']?>" class="d-block w-100" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                    <h5>   <a href="<?= 'single.php?post='. $topic['id'] ?>"><?= substr($topic['titile'],0,50).'...'; ?></a></h5>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
     
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- блок карусели END-->

<!-- блок main-->
<div class="container">
    <div class="content row">
        <!-- Main Content -->
        <div class="main-content col-md-9 col-12">
            <h2>Последние публикации</h2>
            <?php foreach($da as $post ): ?>
              
            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src="<?='assets/images/posts/' .$post['img']?>" alt="" class="img-thumbnail">
                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="<?= 'single.php?post='. $post['id'] ?>"><?= substr($post['titile'],0,120).'...'; ?></a>
                    </h3>
                    <i class="far fa-user"> <?=$post['username']; ?></i>
                    <i class="far fa-calendar"> <?=$post['created_date']; ?></i>
                    <p class="preview-text">
                   
                    <?= mb_substr($post['content'],0,150, 'UTF-8').'...'; ?>
                    </p>
                </div>
            </div>
            <?php endforeach;?>
           
           
       
          

        </div>
        <!-- sidebar Content -->
        <div class="sidebar col-md-3 col-12">

            <div class="section search">
                <h3>Поиск</h3>
                <form action="/" method="post">
                    <input type="text" name="search-term" class="text-input" placeholder="Введите искомое слово...">
                </form>
            </div>


            <div class="section topics">
                <h3>Категории</h3>
                <ul>
                <?php foreach($topics as $key => $topic): ?>
                    <li><a href="#"><?=$topic['name']?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>

        </div>
    </div>
</div>

<!-- блок main END-->
<!-- footer -->
<?php include("app/include/footer.php"); ?>
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