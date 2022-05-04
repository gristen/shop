<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['admin']);
unset($_SESSION['login']);

header("location:../index.php");
		
