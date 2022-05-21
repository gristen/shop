<?php
session_start();
// include '../../path.php';
require('connect.php');




function tt($value){
	echo "<pre>";
	print_r($value);
	echo "</pre>";
	exit();
}

//проверка выполнения запроса в БД
function dbCheckError($query){
	$errInfo = $query->errorInfo();
	if ($errInfo[0] !== PDO::ERR_NONE ) {
		echo $errInfo[2];
			exit();
		}

}




function selectOne($table, $params = []){
	global $dbh;
	$sql = "SELECT * FROM $table";
	if (!empty($params)) {
		$i = 0;
		foreach ($params as $key => $value) {
			if (!is_numeric($value)) {
				$value = "'".$value."'";
			}
			if ($i === 0) {
					$sql = $sql . " WHERE $key = $value";
				}else{
					$sql = $sql . " AND $key = $value";
				}
				$i++;
		}
	}






	
	$query = $dbh->prepare($sql);
	$query->execute();
	$date = $query->fetch(PDO::FETCH_ASSOC);

	return $date;
	
	dbCheckError($date);
}


function selectAll($table, $params = []){
	global $dbh;
	$sql = "SELECT * FROM $table";
	
	if (!empty($params)) {
		$i = 0;
		foreach ($params as $key => $value) {
			if (!is_numeric($value)) {
				$value = "'".$value."'";
			}
			if ($i === 0) {
					$sql = $sql . " WHERE $key = $value";
				}else{
					$sql = $sql . " AND $key = $value";
				}
				$i++;
		}
	} 



	
	$query = $dbh->prepare($sql);
	$query->execute();
	$date = $query->fetchAll(PDO::FETCH_ASSOC);

	return $date;

	dbCheckError($date);
}


function insert($table, $params){
	global $dbh;
	$i=0; 
	$coll = '';
	$mask = '';
	foreach ($params  as $key => $value) {
		if ($i === 0) {
			$coll = $coll . "$key";
			$mask = $mask . "'". "$value" . "'";
		}else{
			$coll = $coll . ", $key";
			$mask = $mask . ", '"."$value" . "'";
		}
		
		$i++;
	}
	
	$store_user = $dbh->prepare("INSERT INTO $table ($coll) VALUES ($mask)");
	$store_user->execute($params);
	

	return $dbh->lastInsertId();
}

function update($table, $id,  $params){
	global $dbh;
	$i=0; //
	$str = '';
	foreach ($params  as $key => $value) {
		if ($i === 0) {
			$str = $str .$key. " = '". $value . "'";
		}else{
		$str = $str.", ".$key. "= '" . $value . "'";
		}
		
		$i++;
	}
	

	$store_user = $dbh->prepare("UPDATE $table SET $str WHERE id = $id ");
	$store_user->execute($params);
}


function delete($table, $id){
	global $dbh;
	$store_user = $dbh->prepare("DELETE FROM $table WHERE id = $id");
	$store_user->execute();

}

// Выборка записей с автором в админку

	function selectAllFromPostsWithUsers($table1 ,$table2){
		global $dbh;
		

		$query = $dbh->prepare("SELECT $table1.id , $table1.titile,$table1.img,$table1.content,$table1.status,$table1.id_topic,$table2.username FROM $table1 JOIN $table2 ON $table1.id_user = $table2.id"); //Возьми мне с БД table 1 и table 2 ид , ид тайл имг контет статус ид топика и с бд 2 возьми юзернейм который равен id & username
		$query->execute();
		return $date = $query->fetchAll(PDO::FETCH_ASSOC);
	}

?>