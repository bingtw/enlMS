<?php

//error_reporting(E_ALL); //除錯用

if(!isset($_SESSION)){ session_start(); }  //判斷session是否已啟動

if((!empty($_SESSION['ans_ckword'])) && (!empty($_POST['anscheck']))){  //判斷這2者是否為空
     
     if($_SESSION['ans_ckword'] == $_POST['anscheck']){
	     
		 $_SESSION['ans_ckword'] = ''; //通過後，清空ans_ckword值
		 
		 header('content-Type: text/html; charset=utf-8');  //強符集utf-8
		 
		 echo '<p>&nbsp;</p><p>&nbsp;</p><a href="./index.php">OK輸入正確，按此返回index.php</a>';
	     
		 exit();
	 
	 }

}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>php 圖形驗證碼</title>
</head>
<body>
<form name="form1" method="post" action="rand1.php">
<p>請輸入下圖英字：</p><p><img src="showpic.php" border="0"></p>
  <input type="text" name="anscheck" size="10" maxlength="10">
  <input type="submit" name="Submit" value="送出">
</form>
</body>
</html>