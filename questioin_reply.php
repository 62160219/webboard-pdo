	<?php 
		include("head.php"); 

		//นับจำนวนผู้เข้ามาอ่าน
		$id = $_GET["qt_id"];

		$update = $db_con->prepare("UPDATE question SET qt_view = (qt_view+1) WHERE qt_id = ? ");
		// กำหนดค่าสำหรับเพิ่มเข้าในฐานข้อมูล
		$update->bindParam("1",$id);
		$result =  $update->execute();//mysql_query

		//ดึงข้อมูลกระทู้เพื่อมาแสดง
		$question = $db_con->prepare("SELECT * FROM question WHERE qt_id = '".$_GET["qt_id"]."'"); 
		$question->execute();
		$row=$question->fetch(PDO::FETCH_ASSOC);
	?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php include("top_menu.php"); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h3><?php echo $row["qt_title"];?></h3>
				<?php echo $row["qt_detail"];?>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<?php 
					$l = 1;
					$reply = $db_con->prepare("SELECT * FROM reply WHERE qt_id = '".$_GET["qt_id"]."' ORDER BY rp_id DESC");
					$reply->execute();

					while ($row=$reply->fetch(PDO::FETCH_ASSOC)) {// mysql_fetch_assoc()
				?>
				<div class="panel panel-default">
				  <div class="panel-heading"><strong>แสดงความคิดเห็น <?php echo $l++; ?> (ชือผู้ตอบ <?php echo ucwords($row["rp_name"]); ?>)</strong></div>
				  <div class="panel-body">
				    <?php echo $row["rp_detail"]; ?>
				    <p>&nbsp;</p>
				    <small>สร้างเมื่อ <?php echo $row["rp_created"]; ?></small>
				  </div>
				</div>
				<?php 
					}
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
				  <div class="panel-heading">แสดงความคิดเห็น</div>
				  <div class="panel-body">
				    <form method="post" action="questioin_reply_send.php">
						  <div class="form-group">
						    <label>ชื่อ</label>
						    <input type="text" name="rp_name" class="form-control" placeholder="ระบุชื่อ">
						  </div>
						  <div class="form-group">
						    <label>ความคิดเห็น</label>
						    <textarea class="form-control" name="rp_detail" rows="3" placeholder="ระบุรายละเอียด"></textarea>
						  </div>
						  <input type="hidden" name="qt_id" value="<?php echo $_GET["qt_id"];?>">
						  <button type="submit" class="btn btn-primary">บันทึก</button>
						  <button type="reset" class="btn btn-default">ยกเลิก</button>
						</form>
				  </div>
				</div>
			</div>
		</div>
		<hr>
	</div>
</body>
</html>