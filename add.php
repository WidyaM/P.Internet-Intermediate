<?php
require '../connection.php';
require '../model.php';

$data = [
  "id" => '',
  "dokter" => htmlspecialchars($_POST["dokter"]),
  "spesialis" => htmlspecialchars($_POST["spesialis"]),
  "hari" => htmlspecialchars($_POST["hari"]),
  "jam" => htmlspecialchars($_POST["jam"]),
];

$insert = $db->insert($conn, 'dokter', $data);

if ($insert > 0) {
  echo "
      <script>
        alert('Berhasil Ditambah');
        location.href = 'index.php';
      </script>
    ";
} else {
  echo "
      <script>
        alert('Gagal Ditambah');
        location.href = 'index.php';
      </script>
    ";
}
