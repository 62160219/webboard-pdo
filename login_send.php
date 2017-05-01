<?php
	include("connect_db.php");

	$sql = "SELECT * FROM member WHERE username = '".$_POST["username"]."' AND password = '".$_POST["password"]."' "; 
	$login = $db_con->prepare($sql);
	$login->execute();
	$row = $login->fetch(PDO::FETCH_ASSOC);

	if(empty($row))
	{
		header("Location:login.php");
	}
	else
	{
		$_SESSION["member_id"] = $row["m_id"];
		$_SESSION["member_name"] = $row["m_name"];

		header("Location:index.php");
	}


?>