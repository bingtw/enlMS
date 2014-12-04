<?php

if($_SESSION['MSLevel']>=9 ){
	require_once("Connections/DBConnect.php");
	if(@$_POST['gmailID'] && @$_POST['password']){
		$gmailID= $_POST['gmailID'];
		$password= $_POST['password'];
		$Name= $_POST['Name'];
		$rs = $db->prepare("UPDATE `enttwms`.`mailserver` SET `gmailID` = ?, `password` = ?,`name` = ? WHERE `mailserver`.`index` = 1;");
		$rs->execute(array($gmailID,$password,$Name));
		echo "<script> alert('修改MailServer成功！'); location.href='index.php?page=mailServer';</script>";
	}else{
		$rs = $db->query("SELECT * FROM `mailserver` WHERE `index` = 1");
		$rs->setFetchMode(PDO::FETCH_ASSOC);
		$result_arr = $rs->fetchAll();
		echo "<form enctype='multipart/form-data' method='post'  action='index.php?page=mailServer'>";
		echo "<ul><li>*請注意！修改錯誤會導致各區負責人收不到信</li><br><li>*發信帳號請至Gmail，允許應用程式(低)使用！</li><br><li> Gmail帳號：<input type='text' value='".$result_arr[0]['gmailID']."' name='gmailID'><b>@gmail.com</B><br>";
		echo "<br><li> Gmail密碼：<input type='password' name='password'>";
		echo "<br><br><li> 寄件者名稱：<input type='text' name='Name' value='".$result_arr[0]['Name']."' >";
		echo "<br><br><input type='submit' value='修改' class='btn btn-primary'></ul></form>";
	}
}
?>