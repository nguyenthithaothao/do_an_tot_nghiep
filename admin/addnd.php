<?php 
include('../db/ketnoi.php');
$innd = $name  =$email = $password = $phanquyen= '';
if (isset($_GET['innd'])) {
	$innd      = $_GET['innd'];
	$sql      = "select * from nguoidung where innd = '$innd'";
	$nguoidung = executeSingleResult($sql);
	if ($nguoidung != null) {
		$name = $nguoidung['name'];
		$email = $nguoidung['email'];
		$password = $nguoidung['password'];
		$phanquyen = $nguoidung['phanquyen'];
	}
}
if (!empty($_POST)) {
	if (isset($_POST['name'])) {
		$name = $_POST['name'];
	}
	if (isset($_POST['innd'])) {
		$innd = $_POST['innd'];
	}
if (isset($_POST['email'])) {
		$email = $_POST['email'];
	}
if (isset($_POST['password'])) {
		$password = $_POST['password'];
	}
if (isset($_POST['innd'])) {
		$phanquyen = $_POST['phanquyen'];
	}

	if (!empty($name)) {
		if ($innd == '') {
			$sql = "insert into nguoidung(name,email,password,phanquyen) values (?,?,?,?)";
			include("variable.php");
$con = new mysqli($host,$uname,$upass,$dbname);
$st = $con->prepare($sql);
$st->bind_param("ssss",$name,$email,$password,$phanquyen);
$st->execute();
		} else {
			$sql = "update nguoidung set name ='$name',email='$email',password='$password',phanquyen='$phanquyen'  where innd = '$innd'";
			execute($sql);
		}


		header('Location: quanlynguoidung.php');
		die();
	}
}


?>
<html>
<head>
	<title>Trang quản trị</title>
	<style type="text/css">
		body
{
	width: 100%;
}
#header
{
	width: 100%;
	line-height: 60px;
	background-color: white;
	display: flex;
	border-bottom: 1px solid black;
	height: 70px;
}
#header #a
{
	padding-right: 20px;
}
#header #a img
{
	width: 70px;
	height: 50px;
	margin-top: 10px;
	margin-left: 40px;
	border: solid 1px black;
}
#header #b
{
	padding-right: 760px;
	color: black;
	font-weight: bold;
	font-size: 25;
	line-height: 70px;
}

#header #d img
{
	width: 25px;
	height: 25px;
	margin-top: 30px;
}
#c{
	margin-top: 10px;
}
#c a{
	text-decoration: none;
			color:black;
			
			font-size: 18px;
			font-weight: bold;
			padding-left: 10px;
}
#nd
{
	width: 100%;
	display: flex;
	margin-top: 20px;
}
#g
{
	width: 240px;
	border: solid 2px #336699;
	height: 490px;
}
#h{
	width: 100%;
	font-weight: bold;
	font-size: 20px;
	color: white;
	background-color: #336699;
	text-align: center;
	line-height: 40px;
}
#menu{
	width: 100%;

}
#menu ul{
			margin:0px;
			padding:0px;

		}
#menu ul li{
			list-style-type: none;
			background-color: white;
			width: 100%;
			border-bottom: solid 1px black;
		}
#menu ul li a{
			text-decoration: none;
			color:black;
			display: block;
			line-height: 40px;
			font-size: 16px;
			font-weight: bold;
			padding-left: 10px;

		}
#menu ul li a:hover{
			color: #336699;
		}
		.cha{
			position: relative;
		}
		#cap2{
			position: absolute;
			width: 100%;
			background-color: white;
			left:100%;
			top:0px;
			display: none;
			border: solid 2px #336699;

		}
		#cap2>li>a:hover{
			color: #336699;
		}
		.cha:hover #cap2{
			display: block;
		}
#content 
{
	width: 80%;
	margin-left: 10px;
}

	</style>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>

<div id="header">
		<div id="a">
			<img src="../img/sach.png">
		</div>
		<div id="b">
			Quản lý Website bán sách
		</div>
	
		<div id="d">
			<a href="logout.php"><img src="../img/dang_xuat.jpg"></a>
		</div>
		<div id="c">
			<a href="logout.php">Đăng xuất</a>
		</div>
	</div>
	<div id="nd">
		<div id="g">
		<div id="h">QUẢN LÝ</div>
		<div id="menu">
			<ul>
				<li><a href="admin.php">Trang chủ</a></li>
				<li><a href="quanlydanhmuc.php">Quản lý danh mục</a></li>
				<li><a href="quanlysanpham.php">Quản lý sản phẩm</a></li>
				<li><a href="quanlytheloai.php">Quản lý thể loại</a></li>
				<li><a href="quanlytacgia.php">Quản lý tác giả</a></li>
				<li><a href="quanlynguoidung.php">Quản lý người dùng</a></li>
				<li><a href="quanlyspbanchay.php">Quản lý sản phẩm bán chạy</a></li>
				<li><a href="quanlyhoadon.php">Quản lý hoá đơn</a></li>
			</ul>
		</div>
	</div>
		<div id="content">
			<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm/Sửa Người Dùng</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="name">Tên người dùng:</label>
					  <input type="text" name="id" value="<?=$id?>" hidden="true">
					  <input required="true" type="text" class="form-control" id="name" name="name" value="<?=$name?>">
					</div>
					<div class="form-group">
					  <label for="email">Email:</label>
					  <input required="true" type="email" class="form-control" pattern="[a-z][\w$.]+@gmail+\.+com+$" id="email" name="email" value="<?=$email?>" >
					</div>
					<div class="form-group">
					  <label for="pass">Password:</label>
					  <input required="true" type="text" class="form-control" id="password" name="password" value="<?=$password?>">
					</div>
					<div class="form-group">
					  <label for="phanquyen">Phân quyền:</label>
					  <input required="true" type="text" class="form-control" id="phanquyen" name="phanquyen" value="<?=$phanquyen?>">
					</div>
					<button class="btn btn-success">Lưu</button>
				</form>
				<a href="quanlynguoidung.php" style="margin-left: 1000px"><button class="btn btn-success"><<</button></a>
			</div>
		</div>
	</div>

	</div>
</div>
<script type="text/javascript">
	function check()
	{
		var regExp = /^[A-Za-z][\w$.]+@gmail+\.+com+$/;
  var email = document.getElementById("email").value;
  if (regExp.test(email)) 
      alert('Email hợp lệ!'); 
    else 
        alert('email không hợp lệ!');
	}

</script>
</body>
</html>
