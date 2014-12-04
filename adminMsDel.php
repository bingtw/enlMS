<?php
session_start();
require_once("Connections/DBConnect.php");
if($_SESSION['MSLevel']>=9){
		$Codename = $_GET['Codename'];
		if($Codename) {
			$rs = $db->prepare("DELETE FROM `enttwms`.`msadmin` WHERE `msadmin`.`Codename` = ?;");
			$rs->execute(array($Codename));
			$rs->setFetchMode(PDO::FETCH_ASSOC);
			echo "<script> alert('刪除[".$Codename ."]登入許可成功');  location.href='index.php?page=adminMs'; </script>";
		}else echo "<script> alert('輸入參數錯誤');  location.href='index.php?page=adminMs'; </script>";
}
else{
		echo "<script> alert('輸入參數錯誤');  location.href='index.php?page=adminMs'; </script>";
}
?>