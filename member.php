	<?php 
		include("head.php"); 
	?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php include("top_menu.php"); ?>
			</div>
		</div>
		<h3>รายการสมาชิกทั้งหมด</h3>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>ชื่อ</th>
								<th>นามสกุล</th>
								<th>เบอร์โทร</th>
								<th>ชื่อเล่น</th>
								<th>วันที่สร้าง</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$sql = "SELECT * FROM member ORDER BY m_id DESC"; 
								$stmt = $db_con->prepare($sql);
								$stmt->execute();

								while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {// mysql_fetch_assoc()
							?>
							<tr>
								<th scope="row"><?php echo $row["m_id"];?></th>
								<td><?php echo $row["m_name"];?></td>
								<td><?php echo $row["m_surname"];?></td>
								<td><?php echo $row["m_tel"];?></td>
								<td><?php echo $row["m_nickname"];?></td>
								<td><?php echo $row["m_created"];?></td>
							</tr>
							<?php 
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>