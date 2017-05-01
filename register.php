	<?php include("head.php"); ?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php include("top_menu.php"); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
				  <div class="panel-heading"><strong>ลงทะเบียน</strong></div>
				  <div class="panel-body">
				    <form method="post" action="register_send.php">
						  <div class="form-group">
						    <label>ชื่อผู้ใช้งาน</label>
						    <input type="text" name="username" class="form-control" placeholder="ระบุชื่อผู้ใช้งาน">
						  </div>
						  <div class="form-group">
						    <label>รหัสผ่าน</label>
						    <input type="password" name="password" class="form-control" placeholder="ระบุรหัสผ่าน">
						  </div>
						  <hr>
						  <div class="form-group">
						    <label>ชื่อ</label>
						    <input type="text" name="m_name" class="form-control" placeholder="ระบุชื่อ">
						  </div>
						  <div class="form-group">
						    <label>นามสกุล</label>
						    <input type="text" name="m_surname" class="form-control" placeholder="ระบุนามสกุล">
						  </div>
						  <div class="form-group">
						    <label>ชื่อเล่น</label>
						    <input type="text" name="m_nickname" class="form-control" placeholder="ระบุชื่อเล่น">
						  </div>
						  <div class="form-group">
						    <label>เบอร์โทรศัพท์</label>
						    <input type="text" name="m_tel" class="form-control" placeholder="ระบุเบอร์โทรศัพท์">
						  </div>
						  <button type="submit" class="btn btn-primary">ลงทะเบียน</button>
						</form>
				  </div>
				</div>
			</div>
		</div>
		<hr>
	</div>
</body>
</html>