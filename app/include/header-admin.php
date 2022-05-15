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
                    <li> 
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <?php echo $_SESSION['login']; ?>
                        </a>
                        </li>
                            <li><a href="../../app/controllers/logout.php">Выход</a> </li>
                        </ul>
               
                    </li>
            </nav>
        </div>
    </div>
</header>
