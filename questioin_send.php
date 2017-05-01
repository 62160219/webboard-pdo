<?php 

	include("connect_db.php");
		
	$title = $_POST["qt_title"];
	$detail = $_POST["qt_detail"];
	$id = $_SESSION["member_id"];
	$created = date("Y-m-d H:i:s");

	$sql = "INSERT INTO question (qt_title,qt_detail,qt_created,m_id) VALUES (?,?,?,?)";
	$stm = $db_con->prepare($sql);//mysql_query
	// กำหนดค่าสำหรับเพิ่มเข้าในฐานข้อมูล
	$stm->bindParam("1",$title);
	$stm->bindParam("2",$detail);
	$stm->bindParam("3",$created);
	$stm->bindParam("4",$id);
	$result =  $stm->execute();//mysql_query

	if($result){
		echo "บันทึกข้อมูลได้สำเร็จ";
		echo"<meta http-equiv='refresh' content='1;url=questioin_me.php'>";//คำสั่งเปลี่ยนหน้าโดยสามารถกำหนดเวลา
	}
	else{
		echo "บันทึกข้อมูลไม่สำเร็จ";
		echo"<meta http-equiv='refresh' content='1;url=questioin_me.php'>";//คำสั่งเปลี่ยนหน้าโดยสามารถกำหนดเวลา
	}
	
?>