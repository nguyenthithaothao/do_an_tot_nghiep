<?php
function ketnoi($sql)
{
	$con=mysqli_connect("localhost","root","","sach");
	mysqli_query($con,$sql);
	mysqli_close($con);
}
function cacdong($sql){
	$con = mysql_connect("localhost","root","","sach");
	$result=mysqli_query($con,$sql);
	$data=[];
	$row=null;
	if($row!=null)
	{
		while ($row = mysqli_fetch_array($result,1)) {
			$data=$row;
		}
	}
	mysqli_close($con);
	return $data;
}
function motdong($sql){
	$con = mysqli_connect("localhost","root","","sach");
	$result = mysqli_query($con,$sql);
	$row = null;
	if($row!=null){
		$row=mysqli_fetch_array($result,1);
	}
	mysqli_close($con);
	return $row;
}
?>