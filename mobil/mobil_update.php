<?php
//include '../connection.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $no_plat = $_POST['no_plat'];
    $merek = $_POST['merek'];
    $harga_sewa = $_POST['harga_sewa'];
    $jt = $_POST['jenis_transmisi']; 
    $warna = $_POST['warna'];
    $status = $_POST['status'];
    $gambar = upload();
		if( !$gambar) {
			return false;
		}
    // update user data
    $result = mysqli_query($con, "UPDATE mobil SET no_plat='$no_plat',merek='$merek', jenis_transmisi='$jt', harga_sewa='$harga_sewa', warna='$warna', status='$status', gambar='$gambar' where id ='$id'") or die(mysql_error());

    // Redirect to homepage to display update user in list
    header("Location:?page=mobil-show");
}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];


    // cek ketersediaan gambar
    if( $error === 4){
        echo "<script>
            alert('Pilih Gambar terlebih dahulu');history.go(-1);
            </script>";
            
            return false;
    }

    // cek format yang di upload
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.',$namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "<script> 
            alert('yang anda upload bukan gambar!');
        </script>";

        return false;
    }

    // cek ukuran gambar
    if( $ukuranFile > 1000000) {
        echo "<script> 
            alert('ukuran gambar terlalu besar');
        </script>";

        return false;
    }

    // lolos pengecekan
    //GENERATE NAMA
    $namaFilebaru = uniqid();
    $namaFilebaru .= '.';
    $namaFilebaru .= $ekstensiGambar;




    move_uploaded_file($tmpName, 'file/'. $namaFilebaru);

    return $namaFilebaru;


    

}
?>