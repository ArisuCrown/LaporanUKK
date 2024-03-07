<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_POST['submit'])) {
        $id_buku = mysqli_real_escape_string($koneksi, $_POST['id_buku']);
        $tanggal_peminjaman = mysqli_real_escape_string($koneksi, $_POST['tanggal_peminjaman']);
        $tanggal_pengembalian = mysqli_real_escape_string($koneksi, $_POST['tanggal_pengembalian']);
        $status_peminjaman = mysqli_real_escape_string($koneksi, $_POST['status_peminjaman']);

        $query = mysqli_query($koneksi, "UPDATE peminjaman SET id_buku='$id_buku', tanggal_peminjaman='$tanggal_peminjaman', tanggal_pengembalian='$tanggal_pengembalian', status_peminjaman='$status_peminjaman' WHERE id_peminjaman=$id");

        if ($query) {
            echo '<script>alert("Ubah Data Berhasil");</script>';
            echo '<script>window.location.href = "index.php?page=laporan";</script>';
            exit();
        } else {
            echo '<script>alert("Ubah Data Gagal");</script>';
        }
    }

    $query = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id_peminjaman=$id");
    $data = mysqli_fetch_array($query);

    // Display the form
    ?>
    <h1 class="mt-4">Peminjaman Buku</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="post">
                        <div class="row mb-3">
                            <div class="col-md-2">Buku</div>
                            <div class="col-md-8">
                                <select name="id_buku" class="form-control">
                                    <?php
                                    $buk = mysqli_query($koneksi, "SELECT * FROM buku");
                                    while ($buku_data = mysqli_fetch_array($buk)) {
                                        $selected = ($data['id_buku'] == $buku_data['id_buku']) ? 'selected' : '';
                                        echo '<option value="' . htmlspecialchars($buku_data['id_buku']) . '" ' . $selected . '>' . htmlspecialchars($buku_data['judul']) . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Tanggal Peminjaman</div>
                            <div class="col-md-8">
                                <input type="date" class="form-control" name="tanggal_peminjaman" value="<?= htmlspecialchars($data['tanggal_peminjaman']); ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Tanggal Pengembalian</div>
                            <div class="col-md-8">
                                <input type="date" class="form-control" name="tanggal_pengembalian" value="<?= htmlspecialchars($data['tanggal_pengembalian']); ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-2">Status Peminjaman</div>
                            <div class="col-md-8">
                                <select name="status_peminjaman" class="form-control">
                                    <option value="dikembalikan" <?= ($data['status_peminjaman'] == 'dikembalikan') ? 'selected' : ''; ?>>Dikembalikan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <a href="?page=laporan" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    echo '<script>alert("Invalid Request");</script>';
    exit();
}

?>
