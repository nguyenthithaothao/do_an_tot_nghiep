 <?php
require_once ('../db/ketnoi.php');


				if (isset($_GET['id'])) {
					$id = $_GET['id'];
					$sql='delete from hoadon where id ='.$id;
					execute($sql);
					header("Location:quanlyhoadon.php");
				}
			
		
	
 ?>