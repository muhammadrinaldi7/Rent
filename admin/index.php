<?php
session_start(); 
if ($_SESSION['username'] == '') {
    header("location:../index.php");
}
?>

<!doctype html>
<html lang="en"> 

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <base href="praktikum20201"> -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <title>Praktikum 2021</title>
    <style> 
        body {
            margin-bottom: 6em; 
        }

        * { 
            font-size: 14px; 
        }

        footer { 
            position: fixed; 
            /* height: 100px; */ 
            bottom: 0; 
            width: 100%; 
            background: #1fb359; 
            padding: lOpx 0; 
            color: #fff; 
            font-family: Arial, Helvetica, sans-serif; 
            letter-spacing: 1.5px; 
            text-align: center;
        }
    </style> 
</head> 

<body background="../img/bckg.jpg"> 
    <div class="container-fluid">
        <h3 class="mt-4 mb-4">Aplikasi Rental Mobil</h3>
        <div class="row">
            <div class="col-md-3 col-sm-12 mb-4"> 
                <?php include 'nav.php'; ?>
            </div> 

            <div class="col-md-9 col-sm-12 "> 
                <?php include '../connection.php'; ?>
                <?php 

                error_reporting(0);
                switch ($_GET['page']) { 
                    
                    default: 
                        include "dashboard.php"; 
                        break; 

                    case "dashboard"; 
                        include "dashboard.php";
                        break; 
                    
                    // mahasiswa 
                    case "mobil-show"; 
                        include "../mobil/mobil_show.php"; 
                        break; 

                    case "mobil-add";
                        include "../mobil/mobil_add.php"; 
                        break; 
                    
                    case "mobil-edit"; 
                        include "../mobil/mobil_edit.php"; 
                        break; 
                    
                    case "mobil-delete"; 
                        include "../mobil/mobil_delete.php"; 
                        break; 

                    case "mobil-tt"; 
                        include "../mobil/mobil_update.php";
                        break; 

                    //order

                    case "pemesanan-show"; 
                        include "../pemesanan/pemesanan_show.php"; 
                        break;
                 case "mobil-kembali"; 
                        include "../pemesanan/mobil_kembali.php"; 
                        break; 
                    case "pemesanan-add";
                        include "../pemesanan/pemesanan_add.php"; 
                        break;
                    case "mobil-update";
                        include "../pemesanan/mobil_update.php"; 
                        break;
                    case "pesanan-show";
                        include "../pemesanan/pesanan_show.php";
                        break;
                    // user 

                    case "buat-akun"; 
                        include "../buat_akun.php"; 
                        break;
                    case "user-add"; 
                        include "../user/user_add.php"; 
                        break; 
                    
                    case "user-show"; 
                        include "../user/user_show.php";
                        break; 
                    
                    case "user-edit"; 
                        include "../user/user_edit.php"; 
                        break; 
                        
                    case "user-update";
                        include "../user/user_update.php";
                        break;
                }
                    
                ?>
            </div>
        </div>
    </div> 
    
    <footer>
        <div class="container bg-info">
            <span>&copy; 2021 - RINALDI RENTAL MOBIL</span> 
        </div>
    </footer> 

</body> 

</html> 