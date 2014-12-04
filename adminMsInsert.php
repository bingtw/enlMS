<?php
session_start();
require_once("Connections/DBConnect.php");
if($_SESSION['MSLevel']>=9){
		$Codename = $_POST['Codename'];
		$Email =$_POST['Email'];
		@$Location = $_POST['Location'];
		@$Area = $_POST['Area'];
		if($Codename && $Email && $Location ) {
		$rs = $db->prepare("INSERT INTO `enttwms`.`msadmin` (`Codename`, `MSLevel`, `Email`, `Location`,`Area`) VALUES (?, '5',?,?,?);");
		$rs->execute(array($Codename,$Email,$Location,$Area));
		echo "<script> alert('建立[".$Codename ."]權限成功');  location.href='index.php?page=adminMs'; </script>";
		}else echo "<script> alert('輸入參數錯誤');  location.href='index.php?page=adminMs'; </script>";
}
else{
		echo "<script> alert('輸入參數錯誤');  location.href='index.php?page=adminMs'; </script>";
}
?>