<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<?php include "connection.php" ?>

<?php 

if (isset($_POST['registrasi'])) {
    $username = $_POST['username']; 
    $pass = $_POST['password'];
    $pass2 = $_POST['password2'];
    $no_id = $_POST['no_id'];
    $nl = $_POST['nama_lengkap'];
    $nt = $_POST['no_hp']; 

    if ($pass !== $pass2) {
        echo '<script>alert("Password konfirmasi salah!");</script>';
        echo "<meta http-equiv='refresh' content='0 url=?page=buat-akun'>";
        return false; 
    }
    
    $cekUsername = mysqli_query($con, "SELECT * FROM user WHERE username = '" . $username . "' ");
    if (mysqli_num_rows($cekUsername) >= 1) {
        echo '<script>alert("username tidak dapat digunakan");</script>';

        echo "<meta http-equiv='refresh' content='0 url=?page=buat_akun'>";
        return false;
    }
    
    // merubah karakter password enkripsi hash
    // $passHash = password_hash($pass, PASSWORD_DEFAULT);
    
    // simpan user baru 
    $exec = mysqli_query($con, "INSERT INTO user(username,password, no_id,nama_lengkap,no_hp,akun) VALUES('$username','$pass','$no_id','$nl','$nt','user')");
    
    if ($exec = true) {
        echo '<script>alert("User berhasil di tambahkan");</script>';
    } else {
        echo '<script>alert("User gagal di tambahkan");</script>';
    }
} 
?>

<div class="card-body">
<div class="container">
    <div class="card-header">
        <strong>Tambah Data User</strong>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="form-group row">
                <label for="username" class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-9">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                    <input type="text" name="password" class="form-control" placeholder="Password" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="password2" class="col-sm-3 col-form-label">Password Confirmation</label>
                <div class="col-sm-9">
                    <input type="text" name="password2" class="form-control" placeholder="Password Confirmation" required> 
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
    </div>
    <div class="card-footer bg-transparent">
        <button type="submit" name="registrasi" class="btn btn-primary">Daftar</button>
        <button type="reset" class="btn btn-danger">Reset</button>
        <button type="back" onClick="location.href='./'" class="btn btn-danger">Kembali</button>
    </div>
    </form>
</div>
</div>