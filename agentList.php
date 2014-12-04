<?php
require_once("Connections/DBConnect.php");
?>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<script language="javascript">
function Location_Change(){
	var value = $('#Location_choose').val();;
	if(value!=null && value!="N"){
		location.href='index.php?page=agentList&Location='+value;
	}
}
function Codename_Search(){
	var value = $('#Codename_Search').val();;
	if(value!=null){
		location.href='index.php?page=agentList&Codename='+value;
	}
}
</script>
<div class="row" style=" padding-left:10px; ;padding-bottom:20px;">
  <div class="col-xs-2 col-sm-2">
	<div class="form-group has-success has-feedback">
		<label class="control-label" for="inputSuccess4"><li class="glyphicon glyphicon-flag"> </li> 區域篩選：</label>	
		<select class="form-control" style="width:200px;" id="Location_choose" OnChange="Location_Change();">
		<option value="N">---</option>
		<?php
			if($_GET['Codename']!=""){ $Codename = $_GET['Codename']; } else{$Codename ="";}
			if($_GET['Location']!=""){ $Location = $_GET['Location']; } else {$Location=$_SESSION["Location"];}
			$rs = $db->query("SELECT distinct Location FROM `agentdata` ");
			$rs->setFetchMode(PDO::FETCH_ASSOC);
			$result_arr = $rs->fetchAll();
			for($i=0;$i<count($result_arr);$i++){
				$txt = "<option value='".$result_arr[$i]['Location']."' ";
				if($Location==$result_arr[$i]['Location']){$txt.="selected='selected' ";}
				$txt.=" >".$result_arr[$i]['Location']."</option>";
				echo $txt;
			}
		?>
		<option value="all">*全選</option>
		</select>
	</div>
  </div>
 
</div>
<script>
$(document).ready(function(){
    $('#myTable').DataTable();
});
</script>
<table  id="myTable">
<thead>
	<tr>
		<td>  </td>
		<td> Codename </td>
		<td> Level </td>
		<td> 隸屬縣市 </td>
		<td> 活動區域 </td>
		<td> Email </td>
		<td> Line </td>
		<td> 交通 </td>
		<td> 設備 </td>
		<td> 註冊日期 </td>
		<td> 狀態 </td>
		<td> 操作 </td>
	</tr>
</thead>
<tbody>
<?php
//loading variableList
if($Location!="" || $Codename!=""){
	if($Codename=="") 
	{
		if($Location=="all")
		{$rs = $db->prepare("SELECT * FROM `agentdata` ORDER BY `agentdata`.`PostDate` DESC"); $rs->execute();}
		else
		{
		$rs = $db->prepare("SELECT * FROM `agentdata` Where `Location` = ? Order by PostDate DESC "); $rs->execute(array($Location));
		}
	}
	else
	{
		$rs = $db->prepare("SELECT * FROM `agentdata` Where `Codename` Like ? ;"); $rs->execute(array($Codename."%"));
		
	}
	$rs->setFetchMode(PDO::FETCH_ASSOC);
	$result_arr = $rs->fetchAll();
	for($i=0;$i<count($result_arr);$i++){
	?>
	
		<tr>
			<td> <?php echo ($i+1); ?></td>
			<td> <?php echo $result_arr[$i]['Codename']; ?> </td>
			<td> <?php echo $result_arr[$i]['IngressLevel']; ?> </td>
			<td> <?php echo $result_arr[$i]['Location']; ?>  </td>
			<td> <?php echo $result_arr[$i]['Area']; ?>  </td>
			<td> <?php echo $result_arr[$i]['Email']; ?>  </td>
			<td> <?php echo $result_arr[$i]['Line']; ?>  </td>
			<td> <?php echo $result_arr[$i]['Transportation']; ?>  </td>
			<td> <?php echo $result_arr[$i]['SmartDevice']; ?>  </td>
			<td> <?php echo $result_arr[$i]['PostDate']; ?>  </td>
			 
			<?php
				$subrs = $db->query("SELECT * FROM `statuslist` WHERE Codename Like '".$result_arr[$i]['Codename']."'");
				$subrs->setFetchMode(PDO::FETCH_ASSOC);
				$subresult_arr = $subrs->fetchAll();
				echo "<td>".@$subresult_arr[0]['Remarks']."</B> </td> ";
				echo "<td>";
				if(count($subresult_arr)>0){
					echo "<a href='index.php?page=agentStatus&action=update&Codename=".$result_arr[$i]['Codename']."'><span class='label label-warning'>更新狀態</sapn></a>";
				}
				else{
					echo "<a href='index.php?page=agentStatus&action=insert&status=&Codename=".$result_arr[$i]['Codename']."'><span class='label label-danger'>新增狀態</span></a>";
				}
				if($_SESSION['MSLevel']>=9){
					echo "<a href='#' OnClick=\"if(confirm('您是否確定要刪除？')){ location.href='agentDel.php?Codename=".$result_arr[$i]['Codename']."'; }\"><span class='label label-primary'>刪除新人資料</span></a>";
				}
				echo "</td>";
			?>
			
			
		</tr>
	
<?php
	}
	echo "</tbody></table>";
	if(count($result_arr)<1) echo "<div class='alert alert-warning' role='alert'> Note : Search no data ! </div>";
}
$db=null;
?>

