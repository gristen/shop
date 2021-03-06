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
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>dinamics</title>
</head>
<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>
                    <a href="../index.php">My blog</a>
                </h1>
            </div>
            <nav class="col-8">
                <ul>
                    <li><a href="../index.php">Главная</a> </li>
                    <li><a href="#">О нас</a> </li>
                    <li><a href="#">Услуги</a> </li>

                    <li>
                        <?php if (isset($_SESSION['id'])):?>
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <?php echo $_SESSION['login']; ?>
                        </a>
                        <ul>
                             <?php if ($_SESSION['admin']):?>
                            <li><a href="../../admin/posts/index.php">Админ панель</a> </li>
                        <?php endif;?>
                            <li><a href="../../app/controllers/logout.php">Выход</a> </li>
                        </ul>

                         <?php else: ?>
                         <a href="../../log.php">
                            <i class="fa fa-user"></i>
                            Войти
                        </a>
                         <ul>
                            <li><a href="reg.php">Регистрация</a> </li>
                        </ul>
                        <?php endif; ?>
                       
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
