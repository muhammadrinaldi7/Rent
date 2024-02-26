<?php
include 'header.php';
error_reporting(0);
switch ($_GET['page']) {

	default:
	include "home.php";
	break;

	case "buat-akun"; 
        include "buat_akun.php"; 
        break;

	case "home";
	include 'home.php';
	break;

	case "profile";
	include 'profile.php';
	break;

	case "mobil";
	include 'mobil.php';
	break;

	case "login";
	include "login.php";
	break;
}
include 'footer.php';

?>