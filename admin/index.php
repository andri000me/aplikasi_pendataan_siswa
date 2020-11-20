<?php

session_start();
require_once '../function/functions.php';

if (!isset($_SESSION['login'])) {
  header('Location: login.php');
  exit();
}

$data['css'] = 'style4.css';
$data['title'] = 'Halaman utama admin';

$row = query("SELECT * FROM admin WHERE id = " . $_SESSION['login']['id'])[0];

// memanggil file header.php
view('../templates/header', $data);

?>

<header class="navbar">
  <nav>
    <ul>
      <li>
        <a href="index.php" class="active">
          <i class="fas fa-fw fa-home mr-1" id="icon"></i>
          <span>Beranda</span>
        </a>
      </li>
      <li>
        <a href="lihat_data.php">
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

<div class="content">
  <div class="box mb-3">
    <span>Selamat datang, <strong class="text-purple"><?= strtolower($row['level']); ?> <?= strtolower($row['nama']); ?></strong></span>
  </div>
  <img src="<?= base_url('assets/images/profile-admin/' . $row['gambar']); ?>" alt="" class="img-fluid rounded" id="admin-image">
</div>

<footer>
  <div class="d-flex justify-content-center">
    <span>© Copyright by <strong class="text-purple"> candra dwi cahyo </strong></span>
  </div>
</footer>

<?php

$data['javascript'] = 'script.js';


// memanggil file footer.php
view('../templates/footer', $data);

?>