<?php

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $no_plat = $_POST['no_plat'];
    $merek = $_POST['merek'];
    $jt = $_POST['jenis_transmisi']; 
    $harga_sewa = $_POST['harga_sewa'];
    $warna = $_POST['warna'];
    $status = $_POST['status'];
    //$gambar = $_POST['gambar'];
  //  $gambar = upload();
//		if( !$gambar) {
//			return false;
//		}
$result = mysqli_query($con,"UPDATE mobil SET no_plat='$no_plat',merek='$merek', jenis_transmisi='$jt', harga_sewa='$harga_sewa', warna='$warna', status='$status' where id ='$id'") or die(mysql_error());
if($result){
    $result = mysqli_query($con,  "DELETE from sewa WHERE no_plat='$no_plat'");
    echo "<script>alert('Data Berhasil diperbaharui');</script>";
}
    // update user data
  //  $result = mysqli_query($con, "UPDATE mobil SET no_plat='$no_plat',merek='$merek', jenis_transmisi='$jt', harga_sewa='$harga_sewa', warna='$warna', status='$status' where id ='$id'") or die(mysql_error());
    // Redirect to homepage to display update user in list
    header("Location:?page=mobil-show");
}?> 
