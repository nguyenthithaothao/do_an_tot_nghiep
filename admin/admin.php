
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
	padding-right: 800px;
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
#t{
	width: 100%;
	height: 450px;
	display: flex;
	
	position: relative;

}
.slidershow{
	width: 100%;
	height: 100%;
	overflow: hidden;
	position: absolute;
	top: 47%;
	left: 50%;
	transform: translate(-50%,-50%);
	z-index: -999;
}

.navigation{
	position: absolute;
	bottom: 10px;
	left: 50%;
	transform: translateX(-50%);
	display: flex;
}

.bar{
	width: 20px;
	height: 20px;
	border:2px solid #fff;
	border-radius: 30px;
	margin: 10px;
	cursor: pointer;
}

.bar:hover{
	background: #fff;
	transition: 0.6s;
	border:2px solid red;
}


input[name="bottom"]{
	position: absolute;
	visibility: hidden;
}

.slides{
	width: 500%;
	height: 100%;
	display: flex;
	animation: slideShow 16s infinite;
}

.slide{
	width: 20%;
	transition: 0.6s;
}

.slide img{
	width: 100%;
	height: 100%;
}

#bottom_1:checked ~ .s1{
	margin-left: 0;
}
#bottom_2:checked ~ .s1{
	margin-left: -20%;
}
#bottom_3:checked ~ .s1{
	margin-left: -40%;
}
#bottom_4:checked ~ .s1{
	margin-left: -60%;
}
#bottom_5:checked ~ .s1{
	margin-left: -80%;
}

@keyframes slideShow{
    20%{
        margin-left: 0;        
    }
    30%{
        margin-left: -100%;        
    }
    40%{
        margin-left: -100%;        
    }
    50%{
        margin-left: -200%;        
    }
    60%{
        margin-left: -200%;        
    }
    70%{
        margin-left: -300%;        
    }
    80%{
        margin-left: -300%;        
    }
    90%{
        margin-left: -400%;        
    }
    100%{
        margin-left: -400%;        
    }
}
	</style>
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
			<div id="t">
				<div class="slidershow">
			<div class="slides">
				
				<div class="slide s1">
					<img src="../img/1.jpg">
				</div>
				<div class="slide">
					<img src="../img/2.jpg">
				</div>
				<div class="slide">
					<img src="../img/3.jpg">
				</div>
				<div class="slide">
					<img src="../img/4.jpg">
				</div>
				<div class="slide">
					<img src="../img/5.jpg">
				</div>
			</div>
			
		</div>
			</div>

	</div>
</div>
</body>
</html>
