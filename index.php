	<?php
		session_start();
		if(@$_SESSION['Email']=="" || @$_SESSION['Codename']==""){
			echo "<script> alert('訊息：您目前沒有權限！'); location.href='login.php?logout';</script>";
		}
	?>
	<html>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> EntTWMS</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<body>
	<div class="navbar navbar-inverse " role="navigation">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <div class="navbar-brand" > <img src="img/logo.png"> ENL Taiwan ManagSystem <br></div>
			</div>
			<div class="navbar-collapse collapse">
			  <ul class="nav navbar-nav navbar-right">
				<li><a href="index.php?page=agentList">新人列表</a></li>
				<?php 
				if($_SESSION['MSLevel']>=9){
				?>
				<li><a href="index.php?page=adminMs">帳號管理</a></li>
				<li><a href="index.php?page=mailServer">MailServer設定</a></li>
				<?php
				}
				?>
				<li><a href="login.php?logout=1">Logout</a></li>
			  </ul>
			  <form class="navbar-form navbar-right">
				<input type="text" class="form-control" placeholder="<?php echo $_SESSION['Codename']." ( ";
				if($_SESSION['MSLevel']>=9)
					echo "Admin";
				else
					echo "Common";
				echo " )";
				?>">
			  </form>
			</div>
		  </div>
		</div>
		
	  <?php 
		require_once("Connections/DBConnect.php");
		if(@$_GET['page']){
			switch($_GET['page']){
				case "agentList":{ require_once("agentList.php"); break;}
				case "agentStatus":{ require_once("agentStatus.php"); break;}
				case "adminMs":{ require_once("adminMs.php"); break;}
				case "mailServer":{ require_once("mailServer.php"); break;}
				case "adminMsUpdate2":{ require_once("adminMsUpdate2.php"); break;}
			}
		}
	  ?>
	  
	</body>
	</html>