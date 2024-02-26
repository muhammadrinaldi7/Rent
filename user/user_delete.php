<?php
include "../connection.php";
$id = $_GET['id'];
$result = mysqli_query($con, "DELETE FROM user WHERE id=$id");
header("Location:../admin/?pade=user-show");