<?php 


include SITE_ROOT .'/app/database/db.php';

if(!$_SESSION){
    header ('location ' . BASE_URL . 'log.php');
}



$errMsg = '';

$topics = selectAll('categories');
// $posts = selectAll('posts');
$postsAdm = selectAllFromPostsWithUsers('posts','users');



$id ='';
$title = '';
$content = '';
$topic = '';
$img = '';

//СОздание записи
if ($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['add_post'])) {
    
    if(!empty($_FILES['image']['name'])){
        $imgName = time(). '_'. $_FILES['image']['name'];
        $imgTmpName = $_FILES['image']['tmp_name']; // куда сначало приходит
        $destination = ROOT_PATH . "\assets\images\posts\\" .  $imgName; //куда мы перемещаем для хранения
        

        $result = move_uploaded_file($imgTmpName,  $destination ); // от куда куда

        if($result){
            $_POST['image'] = $imgName ;
        }else{
            $errMsg = "Ошибка загрузки изображения на сервер";
        }
    }else{
        $errMsg = "Ошибка получения картинки";
    }

    $title = trim(htmlspecialchars($_POST["title"]));
    $content = $_POST['content'];
    // $content = trim(htmlspecialchars($_POST["content"]));
    $topic = trim(htmlspecialchars($_POST["topic"]));
    $img = trim(htmlspecialchars($_POST["image"]));
    

    $publish = isset($_POST["publish"]) ? 1 : 0 ;  

  
    
	
    if ($title == "" || $content == "" || $topic ==""  ) {
 	$errMsg = "Поля пустые";
 }elseif(mb_strlen($title, 'UTF8') < 2 ){
 	$errMsg = "Короткое название поста";
 }else{
 	$exustence = selectone('posts', ['title'=>$title]);
 	
 if ($exustence['title'] === $title ) {
 	$errMsg = "Такая категория уже есть";
 }else{
    $post = [
    'id_user'=> $_SESSION['id'],
    'titile' =>$title,
    'content' =>$content,
    'img' => $img,
    'status' => $publish,
    'id_topic' => $topic
];


   $post = insert('posts', $post);
   $post = selectOne('posts', ['id' => $id]); 

 
  
    header('location: ../../admin/posts/index.php');
        }
    }   
}




//редактирование статьи

if ($_SERVER['REQUEST_METHOD'] === 'GET'&& isset($_GET['id'])) {
    $id = $_GET['id'];
    $post = selectOne('posts',['id' => $id] );
    
    $id = $post['id']; // Сделали так , потому что ID выше мы не может отправить по POST ибо он сам является GET
    
    $title = $post['titile'];
    $content = $post['content'];
    $topic = $post['id_topic'];
    $status = $post['status'];

    


}

if ($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['edit_post'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $topic = $_POST['topic'];
    // $img = $_POST['image'];
    $status = isset($_POST['publish']) ? 1 : 0; // если паблиш не пустой , то присваиваем 1 , если пустой , то 0.
    // if(isset($status)){
    //     $status = 1;
    // }else{
    //     $status = 0;
    // }
 
    // 
    if(!empty($_FILES['image']['name'])){
        $imgName = time(). '_'. $_FILES['image']['name'];
        $imgTmpName = $_FILES['image']['tmp_name']; // куда сначало приходит
        $destination = ROOT_PATH . "\assets\images\posts\\" .  $imgName; //куда мы перемещаем для хранения
        

        $result = move_uploaded_file($imgTmpName,  $destination ); // от куда куда

        if($result){
            // $_POST['image'] = $imgName ;
            $img = $imgName;
        }else{
            $errMsg = "Ошибка загрузки изображения на сервер";
        }
    }else{
        $errMsg = "Ошибка получения картинки";
    }

    
    if ($title === "" || $content ==="" || $topic ===""  ) {
        $errMsg = "Поля пустые";
        
    }elseif(mb_strlen($title, 'UTF8') < 2 ){
        $errMsg = "Короткое название поста";
       
    }else{
        
        $post = [
            'id_user'=> $_SESSION['id'],
            'titile' =>$title,
            'content' =>$content,
            'img' => $img,
            'status' => $status,
            'id_topic' => $topic
        ];
        
        
        
        
           $post = update('posts', $id, $post);
        
        
         
    }
        
 	
 	
 
  
        
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET'&& isset($_GET['pub_id'])) {
        $id = $_GET['pub_id'];
        $status = $_GET['publish'];
        $postId = update('posts', $id ,['status'=> $status ] ); //обращаемся к строке в бд статус и присваеваем ей значение статуса.
         header('location: ../../admin/posts/index.php');
    
    
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET'&& isset($_GET['dele_id'])) {
        $id = $_GET['dele_id'];
        delete('posts', $id);
         header('location: ../../admin/posts/index.php');
    
    
    }
  
    

?>