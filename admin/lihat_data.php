<?php

session_start();
require_once '../function/functions.php';

if (!isset($_SESSION['login'])) {
  header('Location: login.php');
  exit();
}

$data['css'] = 'style4.css';
$data['title'] = 'Halaman lihat data siswa';

$rows = query("SELECT * FROM data_siswa ORDER BY id DESC");

// memanggil file header.php
view('../templates/header', $data);

?>

<header class="navbar">
  <nav>
    <ul>
      <li>
        <a href="index.php">
          <i class="fas fa-fw fa-home mr-1" id="icon"></i>
          <span>Beranda</span>
        </a>
      </li>
      <li>
        <a href="lihat_data.php" class="active">
          <i class="fas fa-fw fa-user mr-1" id="icon"></i>
          <span>Lihat data</span>
        </a>
      </li>
      <li>
        <a href="tambah.php">
          <i class="fas fa-fw fa-plus mr-1" id="icon"></i>
          <span>Tambah data</span>
        </a>
      </li>
      <li>
        <a href="atur_profile.php?id=<?= $_SESSION['login']['id']; ?>">
          <i class="fas fa-fw fa-cog mr-1" id="icon"></i>
          <span>Pengaturan</span>
        </a>
      </li>
      <li>
        <a href="logout.php">
          <i class="fas fa-fw fa-sign-out-alt mr-1" id="icon"></i>
          <span>Logout</span>
        </a>
      </li>
    </ul>
  </nav>
</header>

<div class="container">
  <siv class="row">
    <div class="col-md-8">
      <?php if (flashdata('data_sukses')) : ?>
      <div class="alert alert-success" role="alert">
        <?= flashdata('data_sukses'); ?>
      </div>
      <?php unset($_SESSION['data_sukses']); ?>
      <?php endif; ?>
    </div>
  </siv>
</div>

<div class="container">
  <siv class="row">
    <div class="col-md-8">
      <?php if (flashdata('data_gagal')) : ?>
      <div class="alert alert-danger" role="alert">
        <?= flashdata('data_gagal'); ?>
      </div>
      <?php unset($_SESSION['data_gagal']); ?>
      <?php endif; ?>
    </div>
  </siv>
</div>

<div class="container">
  <div class="table-responsive">
    <table class="table table-striped rounded shadow" id="myTable">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Tanggal lahir</th>
          <th>Jenis kelamin</th>
          <th>Alamat</th>
          <th>Tahun ajaran</th>
          <th>Nama ibu</th>
          <th>Tanggal lahir ibu</th>
          <th>Nama ayah</th>
          <th>Tanggal lahir ayah</th>
          <th>Kelas</th>
          <th>Jurusan</th>
          <th>Masuk sekolah</th>
          <th>Keluar sekolah</th>
          <th>Bayar spp</th>
          <th>Keterangan</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tbody>
        <?php $num = 1; ?>
        <?php foreach ($rows as $row) : ?>
        <?php $result = ($row['spp'] < 100000) ? flash_belum_lunas() : flash_lunas(); ?>
        <tr>
          <td><small class="text-black-50"><?= $num++; ?></small></td>
          <td><small class="text-black-50"><?= $row['nama']; ?></small></td>
          <td><small class="text-black-50"><?= $row['ttl']; ?></small></td>
          <td><small class="text-black-50"><?= $row['jk']; ?></small></td>
          <td><small class="text-black-50"><?= $row['alamat']; ?></small></td>
          <td><small class="text-black-50"><?= $row['tahun_ajaran']; ?></small></td>
          <td><small class="text-black-50"><?= $row['nama_ibu']; ?></small></td>
          <td><small class="text-black-50"><?= $row['ttl_ibu']; ?></small></td>
          <td><small class="text-black-50"><?= $row['nama_ayah']; ?></small></td>
          <td><small class="text-black-50"><?= $row['ttl_ayah']; ?></small></td>
          <td><small class="text-black-50"><?= $row['kelas']; ?></small></td>
          <td><small class="text-black-50"><?= $row['jurusan']; ?></small></td>
          <td><small class="text-black-50"><?= $row['masuk']; ?></small></td>
          <td><small class="text-black-50"><?= $row['keluar']; ?></small></td>
          <td><small class="text-black-50"><?= $row['spp']; ?></small></td>
          <td><small><?= $result; ?></small></td>
          <td>
            <div class="d-flex justify-content-center">
              <a href="ubah.php?id=<?= $row['id']; ?>" class="badge badge-primary p-2 text-light mr-1">
                <small class="fas fa-fw fa-edit mr-1"></small>
                <small>ubah</small>
              </a>
              <a href="" class="badge badge-danger p-2 text-light badge-delete" data-target="hapus.php?id=<?= $row['id']; ?>">
                <small class="fas fa-fw fa-trash-alt mr-1"></small>
                <small>hapus</small>
              </a>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<footer>
  <div class="d-flex justify-content-center">
    <span>© Copyright by <strong class="text-purple"> candra dwi cahyo </strong></span>
  </div>
</footer>

<?php

$data['javascript'] = 'lihatData.js';

// memanggil file footer.php
view('../templates/footer', $data);

?>