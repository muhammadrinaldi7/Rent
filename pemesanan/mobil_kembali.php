<?php 
$id = $_GET['id'];
$lihat = mysqli_query($con, "SELECT * FROM mobil where id='$id'");

while ($data = mysqli_fetch_array($lihat)) {
    $no_plat = $data['no_plat']; 
    $merek = $data['merek'];
    $harga_sewa = $data['harga_sewa'];
    $jt = $data['jenis_transmisi'];
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
                <form method="POST" action="?page=mobil-update" class="form-horizontal">
                    <div class="form-group">
                        <label for="no_plat" class="col-sm-2 control-label">No Plat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="no_plat" value="<?php echo $no_plat; ?>" readonly>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="merek" class="col-sm-2 control-label">Merek Mobil</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="merek" value="<?php echo $merek; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="jenis_transmisi" class="col-sm-2 control-label">Jenis Transmisi</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="jenis_transmisi" readonly>
                                <option disabled> Pilih </option>
                                <option <?php if ($jt == "Matic") echo 'selected'; ?> value="Matic">Matic</option>
                                <option <?php if ($jt == "Manual") echo 'selected'; ?> value="Manual">Manual</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="harga_sewa" class="col-sm-2 control-label">Harga Sewa</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="harga_sewa" value="<?php echo $harga_sewa; ?>" readonly>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="warna" class="col-sm-2 control-label">Warna Mobil</label>
                        <div class="col-sm-10">
                            <input type="warna" class="form-control" name="warna" value="<?php echo $warna; ?>" readonly>
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
                       <!-- <div class="form-group">
                        <div class="col-sm-10">
                        <img src="file/" name="gambar" width="100">
                        </div>
                        </div>-->
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="hidden" name="id" value=<?php echo $id; ?>>
                            <input type="submit" name="update" class="btn btn-success" value="Update">
                            <input type="reset" name="reset" class="btn btn-warning" value="Reset">
                        </div> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>