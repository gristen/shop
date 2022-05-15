<?php
include("app/database/db.php");


$errMsg = '';

function userAuth($param){
				$_SESSION['id'] = $param['id'];
				$_SESSION['login'] = $param['username'];
				$_SESSION['admin'] = $param['admin'];
			if ($_SESSION['admin']) {
				header('location:../admin/admin.php' );
			}else{
				header('location:../index.php' );
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


?>