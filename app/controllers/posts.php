<?php 


include SITE_ROOT .'/app/database/db.php';


$errMsg = '';

$topics = selectAll('categories');

$id ='';
$title = '';
$content = '';
$topic = '';
$img = '';

//СОздание записи
if ($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['add_post'])) {

  
    $title = trim(htmlspecialchars($_POST["title"]));
    $content = $_POST['content'];
    // $content = trim(htmlspecialchars($_POST["content"]));
    $topic = trim(htmlspecialchars($_POST["topic"]));
    $img = trim(htmlspecialchars($_POST["image"]));
 
    
	
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
    'status' => 1,
    'id_topic' => $topic
];


   $post = insert('posts', $post);
   $post = selectOne('posts', ['id' => $id]); 

 
  
    header('location: ../../admin/posts/index.php');
        }
    }   
}




// //редактирование категории

// if ($_SERVER['REQUEST_METHOD'] === 'GET'&& isset($_GET['id'])) {
//     $id = $_GET['id'];
//     // $id = 3;
//     $topic = selectOne('categories',['id' => $id] );
//     $id = $topic['id']; // Сделали так , потому что ID выше мы не может отправить по POST ибо он сам является GET

//     $name = $topic['name'];
//     $desc = $topic['description'];
    


// }

// if ($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['topic-edit'])) {
  
//     $name = trim(htmlspecialchars($_POST["name"]));
//     $desc = trim(htmlspecialchars($_POST["desc"]));
	
	
//     if ($name == "" || $desc == "" ) {
//  	$errMsg = "Поля пустые";
//  }elseif(mb_strlen($name, 'UTF8') < 2 ){
//  	$errMsg = "Короткое название категории";
//  }else{
 	
 
//     $topic = [
//    'name' =>$name,
//    'description' =>$desc,
// ];

//     $id = $_POST['id'] ;
//    $topic_id = update('categories', $id, $topic ); 
  
//     header('location: ../../admin/topics/index.php');
//         }
//     }
    
// //удаление категории
// if ($_SERVER['REQUEST_METHOD'] === 'GET'&& isset($_GET['del_id'])) {
//     $id = $_GET['del_id'];
//     delete('categories', $id);
//      header('location: ../../admin/topics/index.php');


// }
// ?>