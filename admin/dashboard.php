<?php
session_start();
?>

<div class="card">
	<div class="card-header">
		<strong>Informasi</strong>
	</div>
	<div class="card-body">
		<p>Selamat Datang <strong><i><?php echo $_SESSION['username'] ?></i></strong>,</p>
		<p>
		<?php 
			if ($_SESSION['akun'] == "admin") { ?>
			<strong>Selamat berkerja dan Selamat beraktifitas hehehe... <br> <code>RINALDI RENTAL CAR</code></strong><br><br>
        <?php } ?>
		<?php 
			if ($_SESSION['akun'] == "user") { ?>
			<strong>Silahkan lihat-lihat dulu mobil yang mau disewa hehehe... <br> <code>RINALDI RENTAL CAR</code></strong><br><br>
        <?php } ?>
			</ul>
		</p>
	</div>
</div>