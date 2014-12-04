<?php
session_start();
require_once("Connections/DBConnect.php");
if($_SESSION['MSLevel']>=9){
	if($_GET['action']=="up"){
		$Codename =$_GET['Codename'];
		$rs = $db->prepare("UPDATE `enttwms`.`msadmin` SET `MSLevel` = '9' WHERE `msadmin`.`Codename` = ?;");
		$rs->execute(array($Codename));
		$rs->setFetchMode(PDO::FETCH_ASSOC);
		echo "<script> alert('提升[".$Codename ."]權限成功');  location.href='index.php?page=adminMs'; </script>";
	}elseif($_GET['action']=="down"){
		$Codename = $_GET['Codename'];
		$rs = $db->prepare("UPDATE `enttwms`.`msadmin` SET `MSLevel` = '1' WHERE `msadmin`.`Codename` = ?;");
		$rs->execute(array($Codename));
		$rs->setFetchMode(PDO::FETCH_ASSOC);
		echo "<script> alert('降低[".$Codename ."]權限成功');  location.href='index.php?page=adminMs'; </script>";
	}elseif($_GET['action']=="updateArea"){
		$Codename = $_POST['Codename'];
		$rs = $db->prepare("UPDATE `enttwms`.`msadmin` SET `Email` = ? , `Location` = ? , `Area` =? WHERE `msadmin`.`Codename` = ?;");
		$rs->execute(array($_POST['Email'],$_POST['Location'],$_POST['Area'],$Codename));
		$rs->setFetchMode(PDO::FETCH_ASSOC);
		echo "<script> alert('修改[".$Codename ."]資料成功');  location.href='index.php?page=adminMs'; </script>";
	
	}else{
		echo "<script> alert('輸入參數錯誤');  location.href='index.php?page=adminMs'; </script>";
	}
}
?>