<?php
include("config/config.php");
$property_id = $_GET['property_id'];
$sql = "DELETE FROM properties WHERE property_id = {$property_id}";
$result = mysqli_query($conn, $sql);
if($result == true)
{
	$msg="<p class='alert alert-success my-2'>Property Deleted</p>";
	header("Location:profile.php?msg=$msg");
}
else{
	$msg="<p class='alert alert-warning my-2'>Property Not Deleted</p>";
	header("Location:profile.php?msg=$msg");
}
mysqli_close($conn);
?>


<!-- user delete file banate hobe!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->