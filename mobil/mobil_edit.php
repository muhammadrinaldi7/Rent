<?php


$id = $_GET['id'];

// Fetch user data based on id
$result = mysqli_query($con, "SELECT * FROM mobil WHERE id=$id");

while ($data = mysqli_fetch_array($result)) {
    $no_plat = $data['no_plat']; 
    $merek = $data['merek'];
    $jt = $data['jenis_transmisi'];
    $harga_sewa = $data['harga_sewa'];
    $warna = $data['warna']; 
    $status = $data['status'];
    $gambar = $data['gambar'];
}
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="panel-title">Ubah Data Mobil</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="?page=mobil-tt" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                        <label for="no_plat" class="col-sm-2 control-label">No Plat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="no_plat" value="<?php echo $no_plat; ?>" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="merek" class="col-sm-2 control-label">Merek Mobil</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="merek" value="<?php echo $merek; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jenis_transmisi" class="col-sm-2 control-label">Jenis Transmisi</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="jenis_transmisi">
                                <option disabled> Pilih </option>
                                <option <?php if ($jt == "Matic") echo 'selected'; ?> value="Matic">Matic</option>
                                <option <?php if ($jt == "Manual") echo 'selected'; ?> value="Manual">Manual</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="harga_sewa" class="col-sm-2 control-label">Harga Sewa</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="harga_sewa" value="<?php echo $harga_sewa; ?>" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="warna" class="col-sm-2 control-label">Warna Mobil</label>
                        <div class="col-sm-10">
                            <input type="warna" class="form-control" name="warna" value="<?php echo $warna; ?>" required>
                        </div>
                    </div>
                    
                    <div class="form-group col-md-6">
                            <label for="status" class="control-label">Status</label>
                            <select class="form-control" name="status">
                            <option disabled selected> Pilih </option>
                            <option <?php if ($status == "Ready") echo 'selected'; ?> value="Ready">Ready</option>
                            <option <?php if ($status == "Disewa") echo 'selected'; ?> value="Disewa">Disewa</option>
                            
                        </select>
                        </div>
                    <div class="form-group">
                    <div class="col-sm-10">
                    <img src="file/<?php echo $gambar ?>" width="100">
                    <div>
                    <label for="gambar" class="control-label">Masukkan Gambar Terbaru</label>
                    </div>
                    <input type="file" name="gambar" id="gambar">
                    </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="hidden" name="id" value=<?php echo $id; ?>>
                            <input type="submit" name="update" class="btn btn-success" value="Update">
                            <input type="reset" name="reset" class="btn btn-warning" value="Reset">
                            <input type="button" name="back" onClick="history.go(-1);" class="btn btn-primary" value="Kembali">
                        </div> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>