<?php

session_start();
require_once '../function/functions.php';

if (!isset($_SESSION['login'])) {
  header('Location: login.php');
  exit();
}

$data['css'] = 'style4.css';
$data['title'] = 'Halaman tambah data siswa';
$data['jenis_kelamin'] = list_jenis_kelamin();
$data['jurusan'] = list_jurusan();

// memanggil file header.php
view('../templates/header', $data);

if (isset($_POST['submit'])) {
  if (tambah($_POST) > 0) {
    
    // jika data berhasil ditambahkan
    set_flashdata('data_sukses', 'data siswa berhasil ditambahkan');
    
    header('Location: lihat_data.php');
    exit();
  } else {
    
    // jika data gagal ditambahkan
    set_flashdata('data_gagal', 'data siswa gagal ditambahkan');
    
    header('Location: lihat_data.php');
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
        <a href="tambah.php" class="active">
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
  <div class="row">
    <div class="col-md-8">
      <div class="card rounded shadow">
        <div class="card-header">
          <small>Form tambah data</small>
        </div>
        <div class="card-body">
          <?php if (flashdata('form_error')) : ?>
          <div class="alert alert-danger" role="alert">
            <span><?= flashdata('form_error'); ?></span>
          </div>
          <?php unset($_SESSION['form_error']); ?>
          <?php endif; ?>
          <form action="" method="post">
            <div class="form-group">
              <label for="nama"><small class="text-black-50">Nama</small></label>
              <input type="text" name="nama" class="form-control" id="nama" placeholder="nama" autocomplete="off" value="<?= $_SESSION['value']['nama']; ?>">
            </div>
            <div class="form-group">
              <label for="tanggal_lahir"><small class="text-black-50">Tanggal lahir</small></label>
              <input type="text" name="ttl" class="form-control" id="tanggal_lahir" placeholder="tanggal bulan tahun" autocomplete="off" value="<?= $_SESSION['value']['tanggal_lahir']; ?>">
            </div>
            <div class="form-group">
              <label for="jenis_kelamin"><small class="text-black-50">Jenis kelamin</small></label>
              <?php foreach ($data['jenis_kelamin'] as $jenis_kelamin) : ?>
              <div class="form-check">
                <?php if ($jenis_kelamin === $_SESSION['value']['jenis_kelamin']) : ?>
                <input class="form-check-input" type="radio" name="jk" id="<?= $jenis_kelamin ?>" value="<?= $jenis_kelamin; ?>" checked>
                <?php else : ?>
                <input class="form-check-input" type="radio" name="jk" id="<?= $jenis_kelamin ?>" value="<?= $jenis_kelamin; ?>">
                <?php endif; ?>
                <label class="form-check-label" for="<?= $jenis_kelamin; ?>">
                  <span><?= $jenis_kelamin; ?></span>
                </label>
              </div>
              <?php endforeach; ?>
            </div>
            <div class="form-group">
              <label for="alamat"><small class="text-black-50">Alamat</small></label>
              <input type="text" name="alamat" class="form-control" id="alamat" placeholder="alamat" autocomplete="off" value="<?= $_SESSION['value']['alamat']; ?>">
            </div>
            <div class="form-group">
              <label for="tahun_ajaran"><small class="text-black-50">Tahun ajaran</small></label>
              <input type="text" name="tahun_ajaran" class="form-control" id="tahun_ajaran" placeholder="tahun ajaran" autocomplete="off" value="<?= $_SESSION['value']['tahun_ajaran']; ?>">
            </div>
            <div class="form-group">
              <label for="nama_ibu"><small class="text-black-50">Nama ibu</small></label>
              <input type="text" name="nama_ibu" class="form-control" id="nama_ibu" placeholder="nama ibu" autocomplete="off" value="<?= $_SESSION['value']['nama_ibu']; ?>">
            </div>
            <div class="form-group">
              <label for="tanggal_lahir_ibu"><small class="text-black-50">Tanggal lahir ibu</small></label>
              <input type="text" name="ttl_ibu" class="form-control" id="tanggal_lahir_ibu" placeholder="tanggal bulan tahun" autocomplete="off" value="<?= $_SESSION['value']['tanggal_lahir_ibu']; ?>">
            </div>
            <div class="form-group">
              <label for="nama_ayah"><small class="text-black-50">Nama ayah</small></label>
              <input type="text" name="nama_ayah" class="form-control" id="nama_ayah" placeholder="nama ayah" autocomplete="off" value="<?= $_SESSION['value']['nama_ayah']; ?>">
            </div>
            <div class="form-group">
              <label for="tanggal_lahir_ayah"><small class="text-black-50">Tanggal lahir ayah</small></label>
              <input type="text" name="ttl_ayah" class="form-control" id="tanggal_lahir_ayah" placeholder="tanggal bulan tahun" autocomplete="off" value="<?= $_SESSION['value']['tanggal_lahir_ayah']; ?>">
            </div>
            <div class="form-group">
              <label for="kelas"><small class="text-black-50">Kelas</small></label>
              <input type="text" name="kelas" class="form-control" id="kelas" placeholder="kelas" autocomplete="off" value="<?= $_SESSION['value']['kelas']; ?>">
            </div>
            <div class="form-group">
              <label for="jurusan"><small class="text-black-50">Jurusan</small></label>
              <select name="jurusan" id="jurusan" class="form-control">
                <?php foreach ($data['jurusan'] as $jurusan) : ?>
                <?php if ($jurusan === $_SESSION['value']['jurusan']) : ?>
                <option value="<?= $jurusan; ?>" selected><?= $jurusan; ?></option>
                <?php else : ?>
                <option value="<?= $jurusan; ?>"><?= $jurusan; ?></option>
                <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="masuk_sekolah"><small class="text-black-50">Masuk sekolah</small></label>
              <input type="date" name="masuk" class="form-control" id="masuk_sekolah" placeholder="tanggal bulan tahun" autocomplete="off" value="<?= $_SESSION['value']['masuk_sekolah']; ?>">
            </div>
            <div class="form-group">
              <label for="keluar_sekolah"><small class="text-black-50">Keluar sekolah</small></label>
              <input type="date" name="keluar" class="form-control" id="keluar_sekolah" placeholder="tanggal bulan tahun" autocomplete="off" value="<?= $_SESSION['value']['keluar_sekolah']; ?>">
            </div>
            <div class="form-group">
              <label for="spp"><small class="text-black-50">Spp</small></label>
              <input type="text" name="spp" class="form-control" id="nrp" placeholder="spp" autocomplete="off" value="<?= $_SESSION['value']['spp']; ?>">
            </div>
            <button type="submit" name="submit" class="button-purple">
              <i class="fas fa-fw fa-plus mr-1"></i>
              <span>Tambah data</span>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
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