<?php 
include('../db/ketnoi.php');
$id = $name = $addres = $description= $image= '';
if (isset($_GET['id'])) {
	$id    = $_GET['id'];
	$sql      = "select * from places where id= '$id'";
	$sanpham = executeSingleResult($sql);
	if ($sanpham != null) {
		$name = $sanpham['name'];
		$addres = $sanpham['addres'];
		$description= $sanpham['description'];
		$imge = $sanpham['image'];
		
		

	}
}
if (!empty($_POST)) {
	if (isset($_POST['name'])) {
		$name = $_POST['name'];
	}
	if (isset($_POST['id'])) {
		$id= $_POST['id'];
	}
	if (isset($_POST['addres'])) {
		$addres= $_POST['addres'];
	}
	if (isset($_POST['description'])) {
		$description = $_POST['description'];
	}
	if (isset($_POST['image'])) {
		$image = $_POST['image'];
	}
	
	if (!empty($name)) {
		if ($id == '') {
			$sql = "insert into places(name,addres,description,image) values ('$name','$addres','$description','../img/$image')";
		execute($sql);
		} else {
			$sql = "update places set name = '$name',addres = '$addres',description = '$description',image = '../img/$image'";
			execute($sql);
		}


		header('Location: quanlysanpham.php');
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
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>

<body>

<div id="header">
		<div id="a">
			<img src="../img/sach.png">
		</div>
		<div id="b">
			Quản lý Website du lịch Việt Nam
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
				<li><a href="quanlydanhmuc.php">Quản lý loại địa điểm</a></li>
				<li><a href="quanlysanpham.php">Quản lý địa điểm</a></li>
				
				<li><a href="quanlynguoidung.php">Quản lý người dùng</a></li>
			</ul>
		</div>
	</div>
		<div id="content">
			<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm/Sửa Địa Điểm</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="name">Tên Địa Điểm:</label>
					  <input type="text" name="idsp" value="<?=$idsp?>" hidden="true">
					  <input required="true" type="text" class="form-control" id="name" name="name" value="<?=$name?>">

					
					<div>
					  <label for="tacgia">Địa chỉ:</label>
					  <select class="form-control" name="addres" id="addres">
					  	<option>---Lựa chọn địa chỉ---</option>
					  	<?php
					  	$sql = 'select * from place_categories';
					  	$dc = executeResult($sql);
					  	foreach ($dc as $item) {
					  		if($item['id']==$addres)
					  		{
					  		echo '<option selected value="'.$item['id'].'">'.$item['name'].'</option>';
					  	}
					  	else
					  	{
					  		echo '<option value="'.$item['id'].'">'.$item['name'].'</option>';
					  	}
					  	}
					  	?>
					  </select>
					

					</div>
					
					</div>
					<div class="form-group">
					  <label for="hinhanh">Hình ảnh:</label>
					  <input required="true" type="file" class="form-control" id="image" name="image" value="<?=$image?>" onchange="updateanh()" >
					  <img src="../img/<?=$image?>" style="max-width: 100px;max-height: 100px" id="anh">
					</div>
					
					<div class="form-group">
					 <label for="noidung">Nội dung:</label>
					 <br>
					 <textarea class="form-group" rows="7" name="description" id="description"><?=$description?></textarea>
					</div>
					
					<button class="btn btn-success">Lưu</button>
				</form>
				<a href="quanlysanpham.php" style="margin-left: 1000px"><button class="btn btn-success"><<</button></a>
			</div>
		</div>
	</div>

	</div>
</div>
<script type="text/javascript">
	function updateanh(){
		$('#anh').attr('src',$('../img/#image').val())
	}
	$(function(){
		 $('#description').summernote();
	})
</script>
</body>
</html>