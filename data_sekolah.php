<?php

session_start();
require_once 'function/functions.php';

$data['css'] = 'style2.css';
$data['title'] = 'Halaman data sekolah';

$rows = query("SELECT * FROM data_siswa ORDER BY id DESC");

// memanggil file header.php
view('templates/header', $data);

?>

<header class="navbar">
  <a href="<?= base_url(); ?>" class="navbar-logo">Coding Santai</a>
  <a href="admin/login.php" class="button-purple">Login</a>
</header>

<div class="container">
  <div class="table-responsive mb-3">
    <table class="table table-striped rounded shadow" id="myTable">
      <thead>
        <tr>
          <th>No absen</th>
          <th>Nama</th>
          <th>Kelas</th>
          <th>Jurusan</th>
        </tr>
      </thead>
      <tbody>
        <?php $num = 1; ?>
        <?php foreach ($rows as $row) : ?>
        <tr>
          <td><small class="text-black-50"><?= $num++; ?></small></td>
          <td><small class="text-black-50"><?= strtolower($row['nama']); ?></small></td>
          <td><small class="text-black-50"><?= strtolower($row['kelas']); ?></small></td>
          <td><small class="text-black-50"><?= strtolower($row['jurusan']); ?></small></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<div class="container mb-3">
  <a href="<?= base_url(); ?>" class="button-purple">
    <i class="fas fa-fw fa-arrow-left mr-1"></i>
    <span>Kembali</span>
  </a>
</div>

<?php

$data['javascript'] = 'script.js';


// memanggil file footer.php
view('templates/footer', $data);

?>