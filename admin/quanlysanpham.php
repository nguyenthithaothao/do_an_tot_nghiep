<?php 
include('../db/ketnoi.php');
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
	height: 70px;
	line-height: 60px;
	background-color: white;
	display: flex;
	border-bottom: 1px solid black;
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
#hinhanh
{
	width: 50px;
	height: 100px;
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
				<h2 class="text-center">Quản Lý Sách</h2>
			</div>
			<div class="panel-body">
				<a href="addsp.php">
					<button class="btn btn-success" style="margin-bottom: 15px">Thêm sản phẩm</button>
				</a>
				<form method="get" style="width: 300px;float: right;">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Tìm kiếm..." id="timkiem" name="timkiem">
					</div>
				</form>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px">STT</th>
							<th>Tên sách</th>
							<th>Tác giả</th>
							<th>Thể loại</th>
							<th>Hình ảnh</th>
							<th>Giá tiền</th>
							<th>Số lượng</th>
							<th>Nội dung</th>
							<th>Danh mục sách</th>
							<th width="50px"></th>
							<th width="50px"></th>
						</tr>
					</thead>
					<tbody>

	


<?php

	$limit = 2;
	$page =1;
	if(isset($_GET['page'])){
		$page=$_GET['page'];
	}
	$firstIndex = ($page-1)*$limit;
	$timkiem = '';
	if(isset($_GET['timkiem'])){
		$timkiem=$_GET['timkiem'];
	}
	$add='';
	if(!empty($timkiem)){
		$add='and sanpham.name like "%'.$timkiem.'%" ';
	}
	$sql = 'select sanpham.idsp, sanpham.name, tacgia.name nametg, theloai.name nametl, sanpham.thumbnail, sanpham.price, sanpham.number, sanpham.content, danhmucsanpham.name namedm from sanpham left join danhmucsanpham on sanpham.iddm=danhmucsanpham.id left join tacgia on sanpham.idtg=tacgia.id left join theloai on sanpham.idtl=theloai.id where 1 '.$add.' limit '.$firstIndex.','.$limit;
$sanpham= executeResult($sql);
$sql1 = 'select count(idsp) as tong from sanpham where 1 '.$add;
$countResult = executeSingleResult($sql1);
if($countResult !=null){
	$count=$countResult['tong'];
$number = ceil($count/$limit);
}
foreach ($sanpham as $item) {
?>
	<tr>
				<td><?=++$firstIndex?></td>
				<td><?=$item['name']?></td>
				<td><?=$item['nametg']?></td>
				<td><?=$item['nametl']?></td>
				<td><img src="<?=$item['thumbnail']?>" id="hinhanh"></td>
				<td><?=$item['price']?></td>
				<td><?=$item['number']?></td>
				<td><?=$item['content']?></td>
				<td><?=$item['namedm']?></td>
				<td>
					<a href="addsp.php?idsp=<?=$item['idsp']?>"><button class="btn btn-warning">Sửa</button></a>
				</td>
				<td>
					<button class="btn btn-danger" onclick="deletesanpham(<?=$item['idsp']?>)">Xoá</button>
				</td>
			</tr>
<?php
}
?>
					</tbody>
				</table>
			<ul class="pagination">
  <?php
   if($page>1){
   	echo '<li class="page-item"><a class="page-link" href="?page='.($page-1).'">Previous</a></li>';

   }
  ?>
  <?php
  $avai = [1,$page-1,$page,$page+1,$number];
  $isF= $isL=false;
for ($i=0; $i < $number; $i++) { 
	if(!in_array($i+1, $avai)){
		if(!$isF && $page >3){
			echo '<li class="page-item" ><a class="page-link" href="?page='.($page-1).'">...</a></li>';
			$isF=true;
		}
		if(!$isL && $i >$page){
			echo '<li class="page-item" ><a class="page-link" href="?page='.($page+1).'">...</a></li>';
			$isL=true;
		}
		continue;
	}

	if($page==($i+1)){
		echo '<li class="page-item" active ><a class="page-link" href="#">'.($i+1).'</a></li>';
	}
	else
	{
		echo '<li class="page-item"><a class="page-link" href="?page='.($i+1).'">'.($i+1).'</a></li>';
	}
}
?>
   <?php
   if($page<($number)){
   	echo '<li class="page-item"><a class="page-link" href="?page='.($page+1).'">Next</a></li>';

   }
  ?>
</ul>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function deletesanpham(idsp) {
			var option = confirm('Bạn có chắc chắn muốn xoá sách này không?')
			if(!option) {
				return;
			}

			console.log(idsp)
			//ajax - lenh post
			$.post('deletesp.php', {
				'idsp': idsp,
				'action': 'delete'
			}, function(data) {
				location.reload()
			})
		}
	</script>

	</div>
</div>
</body>
</html>
