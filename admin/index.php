

<div class="body">
    <div class="tieude1">
        <div class="quantri">
            <h2>Đăng nhập quản trị</h2>
        </div>
    </div>
<?php
include("../db/variable.php");

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql_check = mysqli_query(mysqli_connect("localhost","root","","book"),"select * from nguoidung where email = '$email' and phanquyen='0'");
    $dem = mysqli_num_rows($sql_check);
    if($dem == 0)
    {
        echo "<p class='thongbao1'>Tài khoản không tồn tại</p>";
    }
    else
    {
        $sql_check2 = "select * from nguoidung where email = '$email' and password = '$password'";
		$row=mysqli_query(mysqli_connect("localhost","root","","book"),$sql_check2);	
        $dem2 = mysqli_num_rows($row);
        if($dem2 == 0)
            echo "<p class='thongbao1'>Mật khẩu không chính xác</p>";
        else
        {
	
		 while($rows = mysqli_fetch_array($row))
            {
             	$_SESSION['email'] = $email;
				$_SESSION['phanquyen'] = $rows['phanquyen'];
				$_SESSION['idnd'] = $rows['idnd'];
                $_SESSION['phanquyen'] = $rows['phanquyen'];
                if($rows['phanquyen'] == 0)
                {
                 
					echo "
							<script language='javascript'>
								alert('Đăng nhập quản trị thành công');
								window.open('admin.php','_self', 1);
							</script>
						";
                }
                else
                {
                    
					header('location:../index.php');
                }
            }
        }
    }
}
?>

<style type="text/css">
	.body {width: 100%; height: 100%; font-family:tahoma;}
.tieude1 {width: 330px; height: auto; border: 1px solid #0096ff; position: relative; top: 150px; overflow: hidden; margin: auto;
  
	text-align:center;
}
.tieude1 .quantri { height: auto; overflow: hidden; }
.tieude1 .quantri h2 {font-size: 18px;  color: black; text-transform: uppercase; font-family: Tahoma; font-weight: 700;}
.tieude1 .quantri p {font-size: 13px; margin: 5px 0; color: white;}
.admin_login {width: 330px; height: 130px; background: #aaa; border: 1px solid #eee; margin: auto; position: relative; top: 200px; padding-top:20px;
    -webkit-box-shadow: 0 1px 30px #fff;
    -moz-box-shadow: 0 1px 30px #fff;
    -ms-box-shadow: 0 1px 30px #fff;
    -o-box-shadow: 0 1px 30px #fff;
    box-shadow: 0 1px 30px #fff;
}
.admin_login label {width: 100px; height: 25px; display: block; float: left; margin-top: 5px; margin-left: 10px; font-size: 14px; color: #ffffff;
    font-family: Tahoma; font-weight: bold;}
.admin_login input {width: 200px; height: 25px; display: block; float: left; margin-top: 5px; margin-left: 5px;}
.admin_login button {width: 80px; height: 30px; margin: auto; margin-left:20px;  margin-top: 20px; color: #444; border-radius: 3px; border: none; cursor:pointer;}
.admin_login button:hover {
    border: 1px solid white;
    color: #444;
}
p.thongbao1 {
    color: red; text-align: center; position: relative; top: 190px; font-size: 14px; font-family: Tahoma; width: 200px; height: 30px;
    border: 1px solid red; margin: auto; line-height: 30px; background: #fdfeb4;
}
button a{text-decoration:none;}
button.dangnhap {margin-left:70px;}
	</style>


 <div class="admin_login">
    <form action="" method="post">
        <label>Email:</label><input type="text" name="email" placeholder=" Email"><br>
        <label>Mật khẩu:</label><input type="password" name="password" placeholder=" Password"><br>
        <button name="login" class="dangnhap">Đăng nhập</button><button class="thoat"><a href="../index.php">Thoát</a></button>
    </form>
</div>
</div>
