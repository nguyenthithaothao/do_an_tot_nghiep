 <?php
require_once ('../db/ketnoi.php');


				if (isset($_GET['id'])) {
					$id = $_GET['id'];

					$sql = 'update hoadon set trangthai=2 where id = '.$id;
					execute($sql);
					header("Location:quanlyhoadon.php");
				}
			
		
	
 ?>