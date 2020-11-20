<?php

session_start();
require_once '../function/functions.php';

if (!isset($_SESSION['login'])) {
  header('Location: login.php');
  exit();
}

// tangkap id yang berada di URL
$id = trim(stripslashes(mysqli_real_escape_string($conn, $_GET['id'])));

if (hapus($id) > 0) {
  
  // jika data berhasil dihapus
  set_flashdata('data_sukses', 'data berhasil dihapus');
  
  header('Location: lihat_data.php');
  exit();
} else {
  
  // jika data gagal dihapus
  set_flashdata('data_gagal', 'data gagal dihapus');
  
  header('Location: lihat_data.php');
  exit();
}