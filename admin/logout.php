<?php 
session_start(); 
unset($_SESSION['email']);
unset($_SESSION['password']);
unset($_SESSION['idnd']);


echo "
							<script language='javascript'>
								alert('Thoát quản trị thành công');
								window.open('index.php','_self', 1);
							</script>
						";
?>