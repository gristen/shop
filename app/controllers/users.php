<?php
include("app/database/db.php");


$errMsg = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userName = trim(htmlspecialchars($_POST["UserName"]));
    $email = trim(htmlspecialchars($_POST["email"]));
	$password = trim(htmlspecialchars ($_POST["password"]));
	$password_confirmation = trim(htmlspecialchars($_POST["password_confirmation"]));
	$admin = 0;



	if ($email == "" || $password == "" || $password_confirmation == "") {
 	$errMsg = "";
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
		 // $id = '1';
		$user = selectOne('users', ['id' => $id]); //'id' - поле Id в БД. Мы получаем данные последнего зарегестрированного пользователя 
		tt($user);
		$_SESSION['id'] = $user['id'];
		$_SESSION['login'] = $user['username'];
		$_SESSION['admin'] = $user['admin'];
		header('location: ../index.php ')
	
 }
 	

	
	
}
	
}else{
	echo 'get';
	$userName = '';
	$emial = '';
}

?>

