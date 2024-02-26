<?php
include "../connection.php";
$id = $_GET['id'];
$result = mysqli_query($con, "DELETE FROM mobil WHERE id=$id");
header("Location:../admin/?page=mobil-show");
// echo "<meta http-equiv='refresh' content='0; url=../?page=mobil-show'>";