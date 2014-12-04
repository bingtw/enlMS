<?php
require_once('Connections/DBConnect.php');
require_once('SentMail.php');
$match=0;
if(!isset($_SESSION)){ session_start(); }  //判斷session是否已啟動
if((!empty($_SESSION['ans_ckword'])) && (!empty($_POST['anscheck']))){  //判斷這2者是否為空
     
    if($_SESSION['ans_ckword'] == $_POST['anscheck']){
			$_SESSION['ans_ckword'] = ''; //通過後，清空ans_ckword值
	
	if(@$_POST['Codename'] && @$_POST['IngressLevel'] && @$_POST['Email'] && @$_POST['Location'] && @$_POST['Area']){
			$Codename=$_POST['Codename'];
			$Lv=$_POST['IngressLevel'];
			$Email=$_POST['Email'];
			$Line=$_POST['Line'];
			$Location=$_POST['Location'];
			$Area=$_POST['Area'];
			$Transportation=@$_POST['T1'].' '.@$_POST['T2'].' '.@$_POST['T3'].' '.@$_POST['T4'];
			$SmartDevice=@$_POST['S1'].' '.@$_POST['S2'];
			$t=date('Y-m-d H:i:s');
			$sql="INSERT INTO `enttwms`.`agentdata` (`Codename`, `IngressLevel`, `Email`, `Line`, `Location`, `Area`, `Transportation`, `SmartDevice`, `PostDate`) VALUES (?, ?, ?, ?,?, ?,?,?,?);";
			$count = $db->prepare($sql);
			if($count->execute(array($Codename,$Lv,$Email,$Line,$Location,$Area,$Transportation,$SmartDevice,$t))==TRUE)
			{ 
				$A_List = $db->query("SELECT * FROM `msadmin_copy` WHERE `Area` <> ''");//先用測試的管理者資料庫
				$A_List->setFetchMode(PDO::FETCH_ASSOC);
				$A_result_arr = $A_List->fetchAll();
					for($i=0;$i<count($A_result_arr);$i++){
						//優先先從Location下找Area匹配
						$area=array();
						$area=$A_result_arr[$i]['Area'];
						//$Cname=array(); //debug
						//$Cname = $A_result_arr[$i]['Codename']; //debug
						//echo "$Cname ==> $area"; //debug
						if (preg_match("[$area]",$Area)) {
  							//echo "****條件符合\n";
							$match=1;
							array_push($sendtoEmail,$A_result_arr[$i]['Email']);
                            array_push($sendtoName,$A_result_arr[$i]['Codename']);
						} 
							else {
								//echo "\n";
							}
						}
						if ($match==0){ 
							//echo "*****沒有符合Area******\n";
	                        $L_List = $db->prepare("SELECT * FROM `msadmin_copy` WHERE `Location` like ?");
							$L_List->execute(array($Location));
                            $L_result_arr = $L_List->fetchAll();
							for($i=0;$i<count($L_result_arr);$i++){
                                array_push($sendtoEmail,$L_result_arr[$i]['Email']);
                                array_push($sendtoName,$L_result_arr[$i]['Codename']);
                            }
						}			
			/*
				//sendMail
					$sendtoEmail = array();
					$sendtoName = array();
					$L_List = $db->query("SELECT * FROM `msadmin` WHERE `Location` LIKE '%".$Location."%'");
					$L_List->setFetchMode(PDO::FETCH_ASSOC);
					$L_result_arr = $L_List->fetchAll();
					
						for($i=0;$i<count($L_result_arr);$i++){
							//優先先從Location下找Area匹配
							$area=array();
							$area=explode(",",$L_result_arr[$i]['Area']);
							if(count($area)>1){
								$sub_query="SELECT * FROM `agentdata` WHERE `Codename` LIKE '".$Codename."' AND (";;
								for($j=0;$j<=count($area);$j++){
									if(@$area[$j]!="")
									{ 
										if($j>0) $sub_query.=" OR ";
										$sub_query.=" `Area` LIKE '%".$area[$j]."%'"; 
									}
									//if($j<count($area)) {$sub_query.=" OR ";}
								}
								$sub_query .=")";
								$Ar_List = $db->query($sub_query);
								$Ar_List->setFetchMode(PDO::FETCH_ASSOC);
								$Ar_result_arr = $Ar_List->fetchAll();
								if(count($Ar_result_arr)>=1){
									array_push($sendtoEmail,$L_result_arr[$i]['Email']);
									array_push($sendtoName,$L_result_arr[$i]['Email']);
								}
								//array_push($sendtoEmail,$Mresult_arr[$i]['Email']);
								//array_push($sendtoName,$Mresult_arr[$i]['Email']);
							}
						}
						//Area沒有匹配成功
						if(count($sendtoEmail)==0){
							for($i=0;$i<count($L_result_arr);$i++){
								array_push($sendtoEmail,$L_result_arr[$i]['Email']);
								array_push($sendtoName,$L_result_arr[$i]['Email']);
							}
						}
				*/
					$contents = fopen("contents.html", "w") or die("Unable to open file! Please contact Web-Admin.");
					$txt="";
					$txt .= "Dear. <B>".$Location."</B>區負責人，以下是新朋友[ ".$Codename." ]的聯絡資料，請您幫忙協助！<hr>";
					$txt .= "<ul>";
					$txt .= "<li> Codename：".$Codename."</li>";
					$txt .= "<li> 等級：".$Lv."</li>";
					$txt .= "<li> Email：".$Email."</li>";
					$txt .= "<li> Line：".$Line."</li>";
					$txt .= "<li> 主要地區：".$Location."</li>";
					$txt .= "<li> 次要地區：".$Area."</li>";
					$txt .= "<li> 交通：".$Transportation."</li>";
					$txt .= "<li> 設備：".$SmartDevice."</li>";
					$txt .= "</ul>";
					$txt .="<hr><B>完成處理後，麻煩撥空到<a href='http://enl.tw/enlMS/index.php'>招生系統</a>回報</B>";
					fwrite($contents, $txt);
					fclose($contents);
					$SList = $db->query("SELECT * FROM `mailserver` WHERE `index` = 1");
					$SList->setFetchMode(PDO::FETCH_ASSOC);
					$Sresult_arr = $SList->fetchAll();
					$smtpuser=$Sresult_arr[0]['gmailID'];
					$smtppwd=$Sresult_arr[0]['password'];
					$smtpName=$Sresult_arr[0]['Name'];
					$subject="[Enlightened Taiwan] ".$Codename." 加入活動區域(".$Location."-".$Area.")";
					echo "<div style='display:none'>";
					if(SendMail($smtpuser,$smtppwd,$smtpName,$sendtoEmail,$sendtoName,$subject)==FALSE)
						{
						echo "<script> alert('訊息：Mail Server故障');  location.href='serverError.html'; </script>";
						}
					else
						{ 
							$subject2="[Enlightened Taiwan] ".$Codename." 填表成功 !";
							//SendMail_touser($smtpuser,$smtppwd,$smtpName,$Email,$Codename,$subject2);
							echo "<script> location.href='agentProfile_insertS.html'; </script>";
						}
					echo "</div>";
				
			}
			else
			{ 
				echo "<script> alert('新增失敗，可能您已經申請過了！'); location.href='agentProfile.php';</script>"; 
			}
		}else{
			echo "<script> alert('尚有資料未填妥！'); location.href='agentProfile.php'; </script>";
		}
	}else{
		echo "<script> alert('驗證碼錯誤！'); location.href='agentProfile.php'; </script>";
	}
}else{
		echo "<script> alert('驗證碼尚未輸入！'); location.href='agentProfile.php'; </script>";
}
?>