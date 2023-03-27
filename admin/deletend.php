<?php
require_once ('../db/ketnoi.php');

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['innd'])) {
					$id = $_POST['innd'];

					$sql = 'delete from nguoidung where innd = '.$id;
					execute($sql);
				}
				break;
		}
	}
}