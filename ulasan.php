<h1 class="mt-4">Ulasan Buku</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <?php
                $userLevel = $_SESSION['user']['level'];
                if ($userLevel != 'admin' && $userLevel != 'petugas') {
                ?>
                    <a href="?page=ulasan_tambah" class="btn btn-primary">+ Tambah Data</a>
                <?php
                }
                ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Buku</th>
                        <th>Ulasan</th>
                        <th>Rating</th>
                        <?php
                        if ($userLevel != 'admin' && $userLevel != 'petugas') {
                        ?>
                            <th>Aksi</th>
                        <?php
                        }
                        ?>
                    </tr>

                    <?php
                    $i = 1;
                    $loggedInUserId = $_SESSION['user']['id_user'];

                    // Query modified to include the user ID check
                    $query = mysqli_query($koneksi, "SELECT * FROM ulasan
                        LEFT JOIN user ON user.id_user = ulasan.id_user
                        LEFT JOIN buku ON buku.id_buku = ulasan.id_buku");

                    if (mysqli_num_rows($query) > 0) {
                        while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $data['username']; ?></td>
                                <td><?php echo $data['judul']; ?></td>
                                <td><?php echo $data['ulasan']; ?></td>
                                <td><?php echo $data['rating']; ?></td>
                                <td>
                                    <?php
                                    $isAuthor = ($loggedInUserId == $data['id_user']);

                                    if ($userLevel != 'admin' && $userLevel != 'petugas') {
                                        if ($isAuthor) {
                                    ?>
                                            <a href="?page=ulasan_ubah&&id=<?php echo $data['id_ulasan']; ?>" class="btn btn-info">Ubah</a>
                                            <a onclick="return confirm('Apakah anda yakin menghapus data ini?');" href="?page=ulasan_hapus&&id=<?php echo $data['id_ulasan']; ?>" class="btn btn-danger">Hapus</a>
                                    <?php
                                        } else {
                                            echo "<span class='text-muted'></span>";
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="6">Belum ada ulasan</td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
