<?php 

	include("connect_db.php");
		
	$username = $_POST["username"];
	$password = $_POST["password"];
	$name = $_POST["m_name"];
	$surname = $_POST["m_surname"];
	$tel = $_POST["m_tel"];
	$nickname = $_POST["m_nickname"];
	$created = date("Y-m-d H:i:s");

	$sql = "INSERT INTO member (username,password,m_name,m_surname,m_tel,m_nickname,m_created) VALUES (?,?,?,?,?,?,?)";
	$stm = $db_con->prepare($sql);//mysql_query
	// กำหนดค่าสำหรับเพิ่มเข้าในฐานข้อมูล
	$stm->bindParam("1",$username);
	$stm->bindParam("2",$password);
	$stm->bindParam("3",$name);
	$stm->bindParam("4",$surname);
	$stm->bindParam("5",$tel);
	$stm->bindParam("6",$nickname);
	$stm->bindParam("7",$created);
	$result =  $stm->execute();//mysql_query

	if($result){
		echo "บันทึกข้อมูลได้สำเร็จ";
		echo"<meta http-equiv='refresh' content='1;url=member.php'>";//คำสั่งเปลี่ยนหน้าโดยสามารถกำหนดเวลา
	}
	else{
		echo "บันทึกข้อมูลไม่สำเร็จ";
		echo"<meta http-equiv='refresh' content='1;url=register.php'>";//คำสั่งเปลี่ยนหน้าโดยสามารถกำหนดเวลา
	}
	
?>