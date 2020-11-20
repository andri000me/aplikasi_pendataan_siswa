<?php

session_start();
require_once '../function/functions.php';

if (isset($_SESSION['login'])) {
  header('Location: index.php');
  exit();
}

$data['css'] = 'style3.css';
$data['title'] = 'Halaman Login Admim';

// memanggil file header.php
view('../templates/header', $data);

if (isset($_POST['submit'])) {

  // memberikan kemanan supaya mengurangi resiko terkena retas oleh orang yang tidak bertanggung jawab
  $email = trim(rtrim(stripslashes(htmlspecialchars($_POST['email']))));
  $password = trim(stripslashes(htmlspecialchars($_POST['password'])));
  
  $_SESSION['value'] = ['email' => $email];
  
  if (!login_validation($email, $password)) {
    
    // berikan validasi terlebih dahulu
    header('Location: login.php');
    exit();
  } else {
    
    
    /*
      | jika lolos dari uji validasi
      | jalankan fungsi login();
    */
    
    
    login($email, $password);
  }
}

?>

<div class="box">
  
  <div class="container d-flex justify-content-center align-items-center">
    <div class="row">
      <div class="col">
        <?php if (flashdata('form_admin_error')) : ?>
          <div class="alert alert-danger" role="alert">
            <span><?= flashdata('form_admin_error'); ?></span>
          </div>
        <?php unset($_SESSION['form_admin_error']); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
  
  <h3 class="header">Login</h3>
  <div class="forms mt-4">
    <form action="" method="post">
      <div class="form-group">
        <label for="email"><small class="text-black-50">Email</small></label>
        <input type="text" name="email" class="form-control p-3" id="nama" placeholder="example@example.com" autocomplete="off" value="<?= $_SESSION['value']['email']; ?>">
      </div>
      <div class="form-group">
        <label for="password"><small class="text-black-50">Password</small></label>
        <input type="password" name="password" class="form-control p-3" id="password" placeholder="password" autocomplete="off">
      </div>
      <button type="submit" name="submit" class="button-purple">login</button>
      <a href="<?= base_url(); ?>" class="button-red">Kembali</a>
    </form>
  </div>
</div>

<?php

$data['javascript'] = 'script.js';

// memanggil file footer.php
view('../templates/footer', $data);

?>