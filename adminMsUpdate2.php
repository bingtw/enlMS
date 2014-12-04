<?php
	require_once("Connections/DBConnect.php");
	$rs = $db->query("SELECT * FROM `msadmin` WHERE `Codename` LIKE '".$_GET['Codename']."'");
	$rs->setFetchMode(PDO::FETCH_ASSOC);
	$result_arr = $rs->fetchAll();
?>
<form action="adminMsUpdate.php?action=updateArea" method="post">
	<div class="col-xs-2 col-sm-2" id="Insert_Form">
		<div class="form-group has-success has-feedback">
			<label class="control-label" for="inputSuccess4"><li class="glyphicon glyphicon-flag"> </li> 修改登入權限</label>
			<li> Codename:<input type="text" class="form-control" name="Codename"  value="<?php echo $result_arr[0]['Codename']?>"></li><br>
			<li> Gmail:<input type="text" class="form-control" name="Email"  value="<?php echo $result_arr[0]['Email']?>"><br>
			<li> 主要區域:(請用半型逗號隔開)<input type="text" class="form-control" name="Location"  value="<?php echo $result_arr[0]['Location']?>"><br>
			<li> 次要區域:(請用半型逗號隔開)<input type="text" class="form-control" name="Area" value="<?php echo $result_arr[0]['Area']?>"><br>
			<button type="submit" class="btn btn-primary">修改</button>
			<button type="button" class="btn btn-default" >取消</button>
		</div>
	</div>
</form>