<?php
// include("../../path.php");
include SITE_ROOT .'/app/database/db.php';


// include '../database/db.php';
$users = selectAll('users');

$errMsg = '';

function userAuth($param){
				$_SESSION['id'] = $param['id'];
				$_SESSION['login'] = $param['username'];
				$_SESSION['admin'] = $param['admin'];
			if ($_SESSION['admin']) {
				header('location: ../../admin/posts/index.php' );
			}else{
				// header('location:../index.php' );
			}
}


if ($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['reg'])) {
    $userName = trim(htmlspecialchars($_POST["UserName"]));
    $email = trim(htmlspecialchars($_POST["email"]));
	$password = trim(htmlspecialchars ($_POST["password"]));
	$password_confirmation = trim(htmlspecialchars($_POST["password_confirmation"]));
	$admin = 0;



	if ($email == "" || $password == "" || $password_confirmation == "") {
 	$errMsg = "Поля пустые";
 }elseif($password !== $password_confirmation){
	$errMsg = "Пароль не совпадает";
 }elseif(mb_strlen($userName, 'UTF8') < 2 ){
 	$errMsg = "Короткий логин";
 }else{
 	$exustence = selectone('users', ['email'=>$email]); // соответсвует ли $email который ввел пользователь с emial который есть в бд .
 	
 if ($exustence['email'] === $email ) {
 	$errMsg = "такой пользователь уже есть";
 }else{
 		$post = [
		'admin' =>$admin,
		'username' =>$userName,
		'email' =>$email,
		'password' =>password_hash($password, PASSWORD_DEFAULT)
	];
		$id = insert('users', $post); // приходит lastInsertId пользователя
		$user = selectOne('users', ['id' => $id]); //'id' - поле Id в БД. Мы получаем данные последнего зарегестрированного пользователя 
		
		userAuth($user);
	
 }
 	

	
	
}
	
}else{

	$userName = '';
	$email = '';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-log'])){

	$email = trim(htmlspecialchars($_POST["email"]));
	$password = trim(htmlspecialchars ($_POST["password"]));

	if ($email == "" || $password == "") {
		$errMsg = "Необхадимо заполнить все поля ";
	}else{
		$exustence = selectone('users', ['email'=>$email]); // соответсвует ли $email который ввел пользователь с emial который есть в бд .
		
		if($exustence  && password_verify($password,  $exustence['password'])){
				userAuth($exustence);
		}else{
			$errMsg = "Почта либо пароль введены не верно";
		}
	}
	
}else{
	$email = ''; // разобратсья почему тут подставляется введеный эмайл.
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['create_user'])) {
    $userName = trim(htmlspecialchars($_POST["UserName"]));
    $email = trim(htmlspecialchars($_POST["email"]));
	$password = trim(htmlspecialchars ($_POST["password"]));
	$password_confirmation = trim(htmlspecialchars($_POST["password_confirmation"]));
	$admin = 0;

	

	if ($email == "" || $password == "" || $password_confirmation == "") {
 	$errMsg = "Поля пустые";
 }elseif($password !== $password_confirmation){
	$errMsg = "Пароль не совпадает";
 }elseif(mb_strlen($userName, 'UTF8') < 2 ){
 	$errMsg = "Короткий логин";
 }else{
 	$exustence = selectone('users', ['email'=>$email]); // соответсвует ли $email который ввел пользователь с emial который есть в бд .
 	
 if ($exustence['email'] === $email ) {
 	$errMsg = "такой пользователь уже есть";
 }else{
	 if(isset($_POST['publish'])) $admin = 1;
	
 		$user = [
		'admin' =>$admin,
		'username' =>$userName,
		'email' =>$email,
		'password' =>password_hash($password, PASSWORD_DEFAULT)
	];
		$id = insert('users', $user); // приходит lastInsertId пользователя
		$user = selectOne('users', ['id' => $id]); //'id' - поле Id в БД. Мы получаем данные последнего зарегестрированного пользователя 
		
		
	
 }
 	

	
	
}
	
}

//

if ($_SERVER['REQUEST_METHOD'] === 'GET'&& isset($_GET['edit_user'])) {
    $id = $_GET['edit_user'];
    $user = selectOne('users',['id' => $id] );
	
    
    $id = $user['id']; 
    $admin = $user['admin'];
    $username = $user['username'];
    $email = $user['email'];
   

    


}

if ($_SERVER['REQUEST_METHOD'] === 'POST'&& isset($_POST['update_user'])) {
	
    $id = $_POST['id'];
	
    $username = $_POST['UserName'];
    $email = $_POST['email'];
    $topic = $_POST['topic'];
    $admin = isset($_POST['publish']) ? 1 : 0; // если паблиш не пустой , то присваиваем 1 , если пустой , то 0.
	$password = $_POST['password'];
	$password_confirmation = $_POST['password_confirmation'];

    // 

	
    
    if ($username === "" || $email ==="" ) {
        $errMsg = "Поля пустые";
        
    }elseif(mb_strlen($username, 'UTF8') < 2 ){
        $errMsg = "короткий логин";
       
    }elseif($password !==$password_confirmation){
		$errMsg = "Пароли не совпадают";
	}else{
        // if(isset($_POST['publish'])) $admin = 1;
        $user = [
            'admin'=> $admin,
            'username' =>$username,
            'password' => password_hash($password, PASSWORD_DEFAULT)
            
        ];
        
        
        
        
           $user = update('users', $id, $user);
		   header('location: ../../admin/users/index.php');
        
        
         
    }
        
 	
 	
 
  
        
    }


if ($_SERVER['REQUEST_METHOD'] === 'GET'&& isset($_GET['del_us_id'])) {
	$id = $_GET['del_us_id'];
	delete('users', $id);
	 header('location: ../../admin/users/index.php');


}

?>