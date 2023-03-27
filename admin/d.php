<?php
require_once ('../db/ketnoi.php');


				if (isset($_POST['id'])) {
					$id = $_POST['id'];

					$sql = 'delete from tacgia where id = '.$id;
					$con = mysqli_connect("localhost","root","","book");
	//insert, update, delete
	mysqli_query($con, $sql);

	//close connection
	
					
				}
				header('Location: quanlytacgia.php');
	?>			
		
	
