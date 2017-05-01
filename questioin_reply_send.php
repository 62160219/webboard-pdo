<?php 

	include("connect_db.php");
	
	$name = $_POST["rp_name"];
	$detail = $_POST["rp_detail"];
	$id = $_POST["qt_id"];
	$created = date("Y-m-d H:i:s");

	$sql = "INSERT INTO reply (rp_name,rp_detail,rp_created,qt_id) VALUES (?,?,?,?)";
	$stm = $db_con->prepare($sql);//mysql_query
	// กำหนดค่าสำหรับเพิ่มเข้าในฐานข้อมูล
	$stm->bindParam("1",$name);
	$stm->bindParam("2",$detail);
	$stm->bindParam("3",$created);
	$stm->bindParam("4",$id);
	$result = $stm->execute();//mysql_query
		
	if($result){
		echo "บันทึกข้อมูลได้สำเร็จ";
		echo"<meta http-equiv='refresh' content='1;url=questioin_reply.php?qt_id=".$_POST["qt_id"]."'>";//คำสั่งเปลี่ยนหน้าโดยสามารถกำหนดเวลา
	}
	else{
		echo "บันทึกข้อมูลไม่สำเร็จ";
		echo"<meta http-equiv='refresh' content='1;url=questioin_reply.php?qt_id=".$_POST["qt_id"]."'>";//คำสั่งเปลี่ยนหน้าโดยสามารถกำหนดเวลา
	}
	
?>