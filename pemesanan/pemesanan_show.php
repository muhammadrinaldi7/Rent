<div class="card">
    <div class="card-header">
        <strong>Data Mobil Rental</strong>
    </div> 
    
    <div class="card-body">
        <!-- <div class="col-md-12"> -->
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover m-0"> 
                <?php
                include '../connection.php'; 
                $limit = 5;
                $page = isset($_GET["halaman"]) ? (int) $_GET["halaman"] : 1;
                $mulai = ($page > 1) ? ($page * $limit) - $limit : 0;
                $query = mysqli_query($con, "SELECT * FROM mobil where status='Ready' LIMIT $mulai, $limit") or die(mysqli_error);
                ?>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Polisi</th>
                        <th>Merek Mobil</th>
                        <th>Harga Sewa</th>
                        <th>Jenis Transmisi</th>
                        <th>Warna</th>
                        <th>Foto Mobil</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody> 
                    <?php 
                    
                    
                    $no = $mulai + 1;
                    while ($data = mysqli_fetch_array($query)) {
                    
                    ?>    
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $data['no_plat']; ?></td>
                            <td><?php echo $data['merek']; ?></td>
                            <td><?php echo $data['harga_sewa']; ?></td>
                            <td><?php echo $data['jenis_transmisi']; ?></td>
                            <td><?php echo $data['warna']; ?></td>
                            
                            <td><img src="file/<?php echo $data['gambar'] ?>" width="100"></td>
                            <td>
                            <a class="btn btn-sm btn-success" href="?page=pemesanan-add&no_plat=<?php echo $data['no_plat']; ?>">ORDER</a>
                            </td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
        include '../connection.php'; 
        $result = mysqli_query($con, "SELECT * FROM mobil WHERE status='Ready'");
        $total_records = mysqli_num_rows($result);
        ?>
        <p>Jumlah Data : <?php echo $total_records; ?></p>
        <nav class="mb-5">
            <ul class="pagination justify-content-end">
                <?php
                $jumlah_page = ceil($total_records / $limit);
                $jumlah_number = 1; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
                $start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1;
                $end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page;
                
                if ($page == 1) {
                    echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
                    echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
                } else {
                    $link_prev = ($page > 1) ? $page - 1 : 1;
                    echo '<li class="page-item"><a class="page-link" href="?page=mobil-show&halaman=1">First</a></li>';
                    echo '<li class="page-item"><a class="page-link" href="?page=mobil-show&halaman=' . $link_prev . '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
                }
                
                for ($i = $start_number; $i <= $end_number; $i++) {
                    $link_active = ($page == $i) ? ' active' : '';
                    echo '<li class="page-item ' . $link_active . '"><a class="page-link" href="?page=mobil-show&halaman=' . $i . '">' . $i . '</a></li>';
                }
                
                if ($page == $jumlah_page) {
                    echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                    echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
                } else {
                    $link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page;
                    echo '<li class="page-item"><a class="page-link" href="?page=mobil-show&halaman=' . $link_next . '" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
                    echo '<li class="page-item"><a class="page-link" href="?page=mobil-show&halaman=' . $jumlah_page . '">Last</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
</div> 