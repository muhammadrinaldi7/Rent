<ul class="list-group">
<?php
if ($_SESSION['akun'] == 'user') {
		echo '
		<li class="list-group-item"><a href="?page=dashboard">Dashboard</a></li>
		';

	}
	?>
	
	<li class="list-group-item"><a href="?page=pemesanan-show">Rental Mobil</a></li>
	<?php

	if ($_SESSION['akun'] == 'admin') {
		echo '
		<li class="list-group-item"><a href="?page=mobil-show">Data Mobil</a></li>
		<li class="list-group-item"><a href="?page=user-show">Data User</a></li>
		<li class="list-group-item"><a href="?page=pesanan-show">Data Pesanan</a></li>
		';

	}
	?>

	<li class="list-group-item"><a href="logout.php" onclick="return confirm('Anda yakin mau Log Out ?')">Logout</a></li>
</ul>