<?php 

	include("connect_db.php");

	$title = $_POST["qt_title"];
	$detail = $_POST["qt_detail"];
	$id = $_POST["qt_id"];

	$sql = "UPDATE question SET qt_title = ?,qt_detail = ? WHERE qt_id = ? ";
	$stm = $db_con->prepare($sql);//mysql_query
	// กำหนดค่าสำหรับเพิ่มเข้าในฐานข้อมูล
	$stm->bindParam("1",$title);
	$stm->bindParam("2",$detail);
	$stm->bindParam("3",$id);
	$result =  $stm->execute();//mysql_query
														
	if($result){
		echo "แก้ไขข้อมูลได้สำเร็จ";
		echo"<meta http-equiv='refresh' content='1;url=questioin_me.php'>";//คำสั่งเปลี่ยนหน้าโดยสามารถกำหนดเวลา
	}
	else{
		echo "แก้ไขข้อมูลไม่สำเร็จ";
		echo"<meta http-equiv='refresh' content='1;url=questioin_edit.php?edit=".$_POST["qt_id"]."'>";//คำสั่งเปลี่ยนหน้าโดยสามารถกำหนดเวลา
	}
	
?>