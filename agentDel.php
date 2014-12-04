<?php
session_start();
require_once("Connections/DBConnect.php");
if($_SESSION['MSLevel']>=9){
		$Codename = $_GET['Codename'];
		if($Codename) {
			$rs = $db->prepare("DELETE FROM `enttwms`.`agentdata` WHERE `agentdata`.`Codename` = ?;");
			$rs->execute(array($Codename));
			echo "<script> alert('刪除[".$Codename ."]資料');  location.href='index.php?page=agentList'; </script>";
		}else echo "<script> alert('輸入參數錯誤');  location.href='index.php?page=agentList'; </script>";
}
else{
		echo "<script> alert('輸入參數錯誤');  location.href='index.php?page=agentList'; </script>";
}
?>