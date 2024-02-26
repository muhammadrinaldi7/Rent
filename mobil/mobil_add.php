<?php

if (isset($_POST['Submit'])) {
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
    $result = mysqli_query($con, "INSERT INTO mobil(no_plat,merek,harga_sewa,jenis_transmisi,warna,status,gambar) VALUES('$no_plat', '$merek','$harga_sewa','$jt','$warna','$status', '$gambar')");
    
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

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Tambah Data Mahasiswa</strong>
            </div>
            
            <div class="card-body">
                <form method="POST" action="?page=mobil-add" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                        <label for="no_plat" class="control-label">No Plat</label>
                        <input type="text" class="form-control" name="no_plat" placeholder="Masukan No Polisi..." required> 
                    </div>
                    
                    <div class="form-group">
                        <label for="merek" class="control-label">Merek Mobil</label>
                        <input type="text" class="form-control" name="merek" placeholder="Masukan Merek Mobil..." required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_transmisi" class="control-label">Jenis Transmisi</label>
                        <select class="form-control" name="jenis_transmisi">
                            <option disabled selected> Pilih </option>
                            <option value="Matic">Matic</option>
                            <option value="Manual">Manual</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="harga_sewa" class="control-label">Harga Sewa</label>
                        <input type="text" class="form-control" name="harga_sewa" placeholder="Masukan Harga Sewa..." required>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="warna" class="control-label">Warna Mobil</label>
                            <input type="warna" class="form-control" name="warna" placeholder="Masukan Warna Mobil..." required>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="status" class="control-label">Status</label>
                            <select class="form-control" name="status">
                            <option disabled selected> Pilih </option>
                            <option value="Ready">Ready</option>
                            <option value="Disewa">Disewa</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="file" name="gambar" id="gambar">
                    </div>
                    
                    <input type="submit" name="Submit" class="btn btn-success" value="Simpan">
                    <input type="reset" name="reset" class="btn btn-warning" value="Reset">
                
                </form>
            </div>
        </div>
    </div>
</div>