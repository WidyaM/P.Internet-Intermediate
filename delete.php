<?php

if (!isset($_GET['id'])) {
  echo "
  <script>
    alert('ID Kosong');
    location.href = 'index.php';
  </script>
  ";
} else {
  $id = $_GET['id'];

  require '../connection.php';
  require '../model.php';

  $delete = $db->delete($conn, 'dokter', "id='$id'");

  if ($delete) {
    echo "
      <script>
        alert('Berhasil dihapus');
        location.href = 'index.php';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('Gagal dihapus');
        location.href = 'index.php';
      </script>
    ";
  }
}
