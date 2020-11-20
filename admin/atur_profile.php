<?php

session_start();
require_once '../function/functions.php';

if (!isset($_SESSION['login'])) {
  header('Location: login.php');
  exit();
}

$data['css'] = 'style4.css';
$data['title'] = 'Halaman ubah profile admin';

$id = trim(stripslashes(mysqli_real_escape_string($conn, $_GET['id'])));
$row = query("SELECT * FROM admin WHERE id = '$id'")[0];

// memanggil file header.php
view('../templates/header', $data);

if (isset($_POST['submit'])) {
  if (ubah_profile($_POST, $row['password'], $row['gambar'], $row['level'], $id) > 0) {

    // jika profile berhasil diubah
    set_flashdata('profile_sukses', 'profile berhasil diubah');

    header('Location: atur_profile.php?id=' . $id);
    exit();
  } else {

    // jika profile gagal diubah
    set_flashdata('profile_gagal', 'profile gagal diubah');

    header('Location: atur_profile.php?id=' . $id);
    exit();
  }
}

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
        <a href="atur_profile.php?id=<?= $_SESSION['login']['id']; ?>" class="active">
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

<div class="container d-flex justify-content-center align-items-center">
  <div class="row">
    <div class="col">
      
      <!-- tampilkan jika ada yang error ketika mengupload file -->
      <?php if (flashdata('upload_error')) : ?>
      <div class="alert alert-warning" role="alert">
        <span><?= flashdata('upload_error'); ?></span>
      </div>
      <?php unset($_SESSION['upload_error']); ?>
      <?php endif; ?>
      
      <!-- tampilkan jika ada error saat uji validasi form -->
      <?php if (flashdata('admin_error')) : ?>
      <div class="alert alert-danger" role="alert">
        <span><?= flashdata('admin_error'); ?></span>
      </div>
      <?php unset($_SESSION['admin_error']); ?>
      <?php endif; ?>
      
      <!-- tampilkan jika profile berhasil diubah -->
      <?php if (flashdata('profile_sukses')) : ?>
      <div class="alert alert-success" role="alert">
        <span><?= flashdata('profile_sukses'); ?></span>
      </div>
      <?php unset($_SESSION['profile_sukses']); ?>
      <?php endif; ?>
      
      <!-- tampilkan jika profile gagal diubah -->
      <?php if (flashdata('profile_gagal')) : ?>
      <div class="alert alert-danger" role="alert">
        <span><?= flashdata('profile_gagal'); ?></span>
      </div>
      <?php unset($_SESSION['profile_gagal']); ?>
      <?php endif; ?>

    </div>
  </div>
</div>

<div class="content">
  <img src="<?= base_url('assets/images/profile-admin/' . $row['gambar']); ?>" alt="" class="img-fluid mb-3" id="admin-image">
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="nama"><small class="text-black-50">Nama</small></label>
      <input type="text" name="nama" class="form-control" id="nama" placeholder="nama" autocomplete="off" value="<?= $row['nama']; ?>">
    </div>
    <div class="form-group">
      <label for="email"><small class="text-black-50">Email</small></label>
      <input type="text" name="email" class="form-control" id="email" placeholder="examplw@examplw.com" autocomplete="off" value="<?= $row['email']; ?>">
    </div>
    <div class="form-group">
      <label for="gambar"><small class="text-black-50">Gambar</small></label>
      <div class="custom-file">
        <input type="file" name="gambar" class="custom-file-input" id="gambar">
        <label class="custom-file-label" for="gambar"><small>pilih gambar</small></label>
      </div>
    </div>
    <button type="submit" name="submit" class="button-purple">
      <i class="fas fa-fw fa-edit mr-1"></i>
      <span>ubah profile</span>
    </button>
  </form>
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
