/*
  | nama : candra dwi cahyo
  | umur : 16 tahun
  | email : candradwicahyo18@gmail.com
*/


$(document).ready(function() {
  
  // menggunakan plugin datatables()
  $('#myTable').dataTable();
  
  // ketika tombol hapus ditekan
  $('.badge-delete').on('click', function(e) {
    
    // matikan fitur attribute href
    e.preventDefault();
    
    // munculkan popun dari plugin sweetalert 2
    swal.fire({
      position: 'center',
      icon: 'warning',
      title: 'apakah anda sudah yakin',
      text: 'ingin menghapus data tersebut?',
      showCancelButton: true,
      cancelButtonText: 'tidak',
      confjrmButtonText: 'yakin'
    }).then(result => {
      
      // ketika tombol yakin ditekan, maka arahkan ke file hapus.php
      if (result.value) document.location.href = $(this).data('target');
    });
    
  });
  
});