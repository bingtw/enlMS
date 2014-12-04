<script language="javascript">
function status_insert(){
	var codename=$('#Codename').val();
	var status=$('#status').val();
	if(codename!=null && status!=null){
		location.href="index.php?page=agentStatus&action=insert&Codename="+codename+"&status="+status;
	}
}
function status_update(){
	var codename=$('#Codename').val();
	var status=$('#status').val();
	var SNO=$('#SNO').val();
	if(codename!=null && status!=null && SNO!=null){
		location.href="index.php?page=agentStatus&action=update&SNO="+SNO+"&Codename="+codename+"&status="+status;
	}
}
</script>
<?php
require_once("Connections/DBConnect.php");
if(@$_GET['Codename'] && @$_GET['action']=='insert' && @$_GET['status']){
	$c=$_GET['Codename'];
	$ca="AuntieJiao";
	$r=$_GET['status'];
	$t=date("Y-m-d");
	$sql="INSERT INTO `enttwms`.`statuslist` (`SNO`, `Codename`, `ContactAdmin`, `Remarks`, `PostTime`) VALUES (NULL, '$c', '$ca', '$r', '$t');";
	$count = $db->exec($sql);
	if($count=="1")
	{ echo "<script> alert('新增完成'); location.href='index.php?page=agentList';</script>";}
	else
	{ echo "<script> alert('新增失敗'); location.href='index.php?page=agentList';</script>";}

}
elseif(@$_GET['Codename'] && @$_GET['action']=='update' && @$_GET['SNO']){
	$c=$_GET['Codename'];
	$ca="AuntieJiao";
	$r=$_GET['status'];
	$t=date("Y-m-d");
	$SNO=$_GET['SNO'];
	$sql="UPDATE `enttwms`.`statuslist` SET `ContactAdmin` = '$ca', `Remarks` = '$r', `PostTime` = '$t' WHERE `statuslist`.`SNO` = $SNO;";
	$count = $db->exec($sql);
	if($count=="1")
	{ echo "<script> alert('更新完成'); location.href='index.php?page=agentList';</script>";}
	else{
	  echo "<script> alert('更新失敗'); location.href='index.php?page=agentList';</script>";
	}
}
else{
	if(@$_GET['Codename']!=""){
		$subrs = $db->prepare("SELECT * FROM `agentdata` WHERE Codename  = ? ");
		$subrs->execute(array($_GET['Codename']));
		$subrs->setFetchMode(PDO::FETCH_ASSOC);
		$subresult_arr = $subrs->fetchAll();
		echo "<ul>";
		echo "<li><h4> Codename：".$subresult_arr[0]['Codename']."</li>";
		echo "<li><h4> 遊戲等級：".$subresult_arr[0]['IngressLevel']."</li>";
		echo "<li><h4> Email：".$subresult_arr[0]['Email']."</li>";
		echo "<li><h4> Line：".$subresult_arr[0]['Line']."</li>";
		echo "<li><h4> 隸屬區域：".$subresult_arr[0]['Location']."</li>";
		echo "<li><h4> 活動區域：".$subresult_arr[0]['Area']."</li>";
		echo "<li><h4> 交通工具：".$subresult_arr[0]['Transportation']."</li>";
		echo "<li><h4> 設備：".$subresult_arr[0]['SmartDevice']."</li>";
		echo "<li><h4> 填寫表單日期：".$subresult_arr[0]['PostDate']."</li>";
		if($_GET['action']=='insert') { 
		echo "<li><h4> 處理狀態：</li><textarea class='form-control' rows='4' style='width:500;' id='status'></textarea> "; 
		echo "罐頭訊息：";
		?>
			<button type="button" class="btn btn-default" OnClick="$('#status').html('已收');">已收</button>
			<button type="button" class="btn btn-default" OnClick="$('#status').html('已丟hangout，但未回應');">已丟hangout，但未回應</button>
		<?php
		}
		if($_GET['action']=='update'){
			$qrs = $db->query("SELECT * FROM `statuslist` WHERE Codename Like '".$subresult_arr[0]['Codename']."'");
			$qrs->setFetchMode(PDO::FETCH_ASSOC);
			$qresult_arr = $qrs->fetchAll();
			echo "<li><h4> 處理狀態：</li><textarea class='form-control' rows='4' style='width:500;' id='status'>".$qresult_arr[0]['Remarks']."</textarea> ";
			echo "<input type='hidden' id='SNO' value='".$qresult_arr[0]['SNO']."'>";
			echo "罐頭訊息：";
			?>
			<button type="button" class="btn btn-default" OnClick="$('#status').html('已收');">已收</button>
			<button type="button" class="btn btn-default" OnClick="$('#status').html('已丟hangout，但未回應');">已丟hangout，但未回應</button>
		<?php
		}
		echo "<input type='hidden' id='Codename' value='".$subresult_arr[0]['Codename']."'>";
		if($_GET['action']=='insert'){echo "<br><button type='button' class='btn btn-danger' OnClick='status_insert();'>新增</button>";}
		if($_GET['action']=='update'){echo "<br><button type='button' class='btn btn-warning' OnClick='status_update();'>更新</button>";}

	}
}

?>
