<form accept-charset='UTF-8' enctype='multipart/form-data' method='post'  action='adminMsInsert.php'>

<div class="col-xs-2 col-sm-2" style="display:none" id="Insert_Form">
	<div class="form-group has-success has-feedback">
		<label class="control-label" for="inputSuccess4"><li class="glyphicon glyphicon-plus"> </li> 建立登入權限</label>
		<li> Codename:<input type="text" class="form-control" name="Codename"  placeholder="Codename"></li><br>
		<li> Gmail:<input type="text" class="form-control" name="Email"  placeholder="Gmail"><br>
		<li> 主要區域:(請用半型逗號隔開)<input type="text" class="form-control" name="Location"  placeholder="ex:基隆,台北"><br>
		<li> 次要區域:(請用半型逗號隔開)<input type="text" class="form-control" name="Area"  placeholder="ex:內湖,汐止"><br>
		<button type="submit" class="btn btn-primary">建立</button>
		<button type="button" class="btn btn-default" OnClick="$('#showList').css('display', 'block');$('#Insert_Form').css('display', 'none');$('#showBtn').css('display', 'block');">取消</button>
	</div>
</div>
<button type="button" id="showBtn"class="btn btn-primary" OnClick="$('#showList').css('display', 'none');$('#Insert_Form').css('display', 'block');$('#showBtn').css('display', 'none');">新增登入權限</button>
<br>
</form>
<?php
if($_SESSION['MSLevel']>=9){
require_once("Connections/DBConnect.php");
$rs = $db->query("SELECT * FROM `msadmin`  ORDER BY `msadmin`.`MSLevel` DESC");
$rs->setFetchMode(PDO::FETCH_ASSOC);
$result_arr = $rs->fetchAll();
echo "<div id='showList'> <table class=\"table table-striped\"> <tr> <td></td><td>Codename</td><td>Email</td><td>主要區域</td><td>次要區域</td><td>MSLevel</td><td></td></tr>";
for($i=0;$i<count($result_arr);$i++){
	echo "<tr>";
	echo "<td>".($i+1)."</td>";
	echo "<td>".$result_arr[$i]['Codename']."</td>";
	echo "<td>".$result_arr[$i]['Email']."</td>";
	echo "<td>".$result_arr[$i]['Location']."</td>";
	echo "<td>".$result_arr[$i]['Area']."</td>";
	echo "<td>";
	
	if($result_arr[$i]['MSLevel']>=9) 
	{
		echo "Admin";echo"</td>";
		if($_SESSION['MSLevel'] > $result_arr[$i]['MSLevel']) {
			echo "<td> <a href='adminMsUpdate.php?action=down&Codename=".$result_arr[$i]['Codename']."' class='btn btn-danger'>降低權限</a>";
			echo "<a href='index.php?page=adminMsUpdate2&Codename=".$result_arr[$i]['Codename']."' class='btn btn-warning'>修改資料</a>";
		}else echo"<td></td>";
		
	
	}
	else
	{
		echo "Common";
		echo "</td>";
		echo "<td> <a href='adminMsUpdate.php?action=up&Codename=".$result_arr[$i]['Codename']."' class='btn btn-Primary'>提升權限</a>";
		echo "<a href='adminMsDel.php?Codename=".$result_arr[$i]['Codename']."' class='btn btn-danger'>刪除登入許可</a>";
		echo "<a href='index.php?page=adminMsUpdate2&Codename=".$result_arr[$i]['Codename']."' class='btn btn-warning'>修改資料</a></td>";
	}
	
	echo "</tr>";
}
echo "</table></div>";
}else{
		echo "<script> alert('訊息：您目前沒有權限！'); location.href='index.php';</script>";
}
?>