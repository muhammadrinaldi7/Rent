<?php include "connection.php" ?>

<?php
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($con, "SELECT * FROM user WHERE id=$id");

while ($data = mysqli_fetch_array($result)) {
    $username = $data['username'];
    $password = $data['password'];
}
?>

<div class="card">
    <div class="card-header">
        <strong>Tambah Data Uer</strong>
    </div>
    <div class="card-body">
        <form action="?page=user-update" method="POST">
            <!-- <?php echo $password ?> -->
            <input type="hidden" name="password_lama1" class="form-control" placeholder="Username" value="<?php echo $password; ?>">
            <div class="form-group row">
                <label for="username" class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-9">
                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $username; ?>" required>
                </div>


            </div>
            <div class="form-group row">
                <label for="password_lama2" class="col-sm-3 col-form-label">Password Lama</label>
                <div class="col-sm-9">
                    <input type="password" name="password_lama2" class="form-control" placeholder="Password Lama" required>
                </div>
            </div>
            <div class=" form-group row">
                <label for="password_baru" class="col-sm-3 col-form-label">Password Baru</label>
                <div class="col-sm-9">
                    <input type="password" name="password_baru" class="form-control" placeholder="Password Baru" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="no_id" class="col-sm-3 col-form-label">No Identitas</label>
                <div class="col-sm-9">
                    <input type="text" name="no_id" class="form-control" placeholder="No Identitas" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                <div class="col-sm-9">
                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="no_hp" class="col-sm-3 col-form-label">No Telepon</label>
                <div class="col-sm-9">
                    <input type="text" name="no_hp" class="form-control" maxlength="14" placeholder="No Telepon" required>
                </div>
            </div>
            <div class="form-group row">
                            <label for="status" class="col-sm-3 col-form-label" style="margin-right:15px;">Status</label>
                        <select class="form-control col-sm-2" name="akun">
                            <option disabled selected> Pilih </option>
                            <option value="admin">admin</option>
                            <option value="user">user</option>
                        </select>
            </div>
        </div>
        <div class="card-footer bg-tranparent">
            <input type="hidden" name="id" value=<?php echo $id; ?>>
            <button type="submit" name="update" class="btn btn-success">Simpan</button>
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="button" onClick="history.back(-1);" class="btn btn-primary">Kembali</button>
        </div>
        </form>
    </div>