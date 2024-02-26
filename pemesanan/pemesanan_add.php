<?php
if (isset($_POST['Submit'])) {
    $no_plat = $_POST['no_plat'];
    $id_sewa = $_POST['id_sewa'];
    $no_id = $_POST['no_id'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $jk = $_POST['jenis_kelamin'];
    $lama_sewa = $_POST['lama_sewa'];
    $tb = $_POST['total_biaya'];

    //$query = "INSERT INTO sewa(no_plat,id_sewa,no_id,nama_lengkap,jenis_kelamin,lama_sewa,total_biaya) VALUES('$no_plat', '$id_sewa','$no_id','$nama_lengkap','$jk','$lama_sewa', '$tb')";
    //$query .= "UPDATE mobil SET status='Disewa' WHERE no_plat=$no_plat";
   // $q = mysqli_multi_query($con, $query);
   // if ($q) {
    //  echo "Success";
    //} else{
     //   echo "Error: " . $query . "<br>" . mysqli_error($con);
   // }

   $result = mysqli_query($con,"INSERT INTO sewa(no_plat,id_sewa,no_id,nama_lengkap,jenis_kelamin,lama_sewa,total_biaya) VALUES('$no_plat', '$id_sewa','$no_id','$nama_lengkap','$jk','$lama_sewa', '$tb')");
        if($result){
            $result = mysqli_query($con,  "UPDATE mobil SET status='Disewa' WHERE no_plat='$no_plat'");
            echo "<script>alert('Data Berhasil diperbaharui');</script>";
        }
   // $result = mysqli_query($con,"INSERT INTO sewa(no_plat,id_sewa,no_id,nama_lengkap,jenis_kelamin,lama_sewa,total_biaya) VALUES('$no_plat', '$id_sewa','$no_id','$nama_lengkap','$jk','$lama_sewa', '$tb')");
   // $result = mysqli_query($con, "UPDATE mobil SET status='Disewa' WHERE id_sewa='$id'");
    header("Location:?page=mobil-show");
}
?>
<?php 
$plat = $_GET['no_plat'];
$lihat = mysqli_query($con, "SELECT * FROM mobil where no_plat='$plat'");

while ($data = mysqli_fetch_array($lihat)) {
    $no_plat = $data['no_plat']; 
    $merek = $data['merek'];
    $harga_sewa = $data['harga_sewa'];
    $jt = $data['jenis_transmisi'];
    $warna = $data['warna']; 
    $status = $data['status'];

}
?>
 
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong>Masukkan Data Diri dan Rentalan Mobil</strong>
            </div>
           
            <div class="card-body">
            <?php 
    include '../connection.php';
// mengambil data barang dengan kode paling besar
$query = mysqli_query($con, "SELECT max(id_sewa) as kodeTerbesar FROM sewa");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];

// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
$urutan = (int) substr($kodeBarang, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$urutan++;

// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
$huruf = "REN";
$kodeBarang = $huruf . sprintf("%03s", $urutan);
?>
                <form method="POST" action="?page=pemesanan-add" class="form-horizontal">
                <div class="form-group">
                        <label for="no_plat" class="control-label">No Polisi</label>
                        <input type="text" class="form-control" name="no_plat" placeholder="" value="<?php echo $no_plat?>" readonly> 
                    </div>
                    <div class="form-group">
                        <label for="id_sewa" class="control-label">Id Sewa</label>
                        <input type="text" class="form-control" name="id_sewa" value="<?php echo $kodeBarang ?>" placeholder="" readonly> 
                    </div>
                    <div class="form-group">
                        <label for="no_id" class="control-label">No Identitas</label>
                        <input type="text" class="form-control" maxlength="16" name="no_id" placeholder="Masukan No Identitas(KTP/SIM)" required> 
                    </div>
                    
                    <div class="form-group">
                        <label for="nama_lengkap" class="control-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_lengkap" placeholder="Masukan Nama Lengkap..." required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin" class="control-label">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin">
                            <option disabled selected> Pilih </option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                    
                    <div class="form-row">
                        <script type="text/javascript">
                        function sum() {
                            var txtFirstNumberValue = document.getElementById('lama').value;
                            var txtSecondNumberValue = document.getElementById('harga').value;
                            var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
                            if (!isNaN(result)){  
                            document.getElementById('total').value = result;
                            }
                            }
                        </script>
                        <div class="form-group col-md-6">
                        <label for="lama_sewa" class="control-label">Lama Sewa</label>
                        <input type="text" class="form-control" onkeyup="sum();" name="lama_sewa" id="lama" placeholder="Masukan Lama Penyewaan..." required>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="harga_sewa" class="control-label">Harga Sewa/hari</label>
                        <input type="text" class="form-control" onkeyup="sum();" value="<?php echo $harga_sewa; ?>" id="harga" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="total_biaya" class="control-label">Total Biaya Sewa</label>
                    <input type="text" name="total_biaya" class="form-control"  id="total" readonly>
                    </div>
                    <input type="submit" name="Submit" class="btn btn-success" value="Pesan">
                    <input type="reset" name="reset" class="btn btn-warning" value="Reset">
                    <input type="button" onClick="history.back(-1);" class="btn btn-primary" value="Kembali">
                </form>
            </div>
        </div>
    </div>
</div>