<?php

if (isset($_POST['submit'])) {
  require '../connection.php';
  require '../model.php';

  $id = $_POST['id'];
  $dokter = htmlspecialchars($_POST["dokter"]);
  $spesialis = htmlspecialchars($_POST["spesialis"]);
  $hari = htmlspecialchars($_POST["hari"]);
  $jam = htmlspecialchars($_POST["jam"]);

  $update = $db->update($conn, 'dokter', "id='$id'", "nama='$dokter', spesialis='$spesialis', hari='$hari', jam='$jam'");

  if ($update > 0) {
    echo "
        <script>
          alert('Berhasil Diubah');
          location.href = 'index.php';
        </script>
      ";
  } else {
    echo "
        <script>
          alert('Gagal Diubah');
          location.href = 'index.php';
        </script>
      ";
  }

  die;
}

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

  $dokter = $db->get($conn, 'dokter', "id='$id'");

  if ($dokter) {
    $dokter = $dokter[0];
  }

  $title = "Edit Dokter";
  require '../partials/header.php';
}

?>

<?php require '../partials/navbar.php'; ?>

<div class="container mt-5 p-4 shadow-sm">
  <h3 class="mb-3">Edit Dokter</h3>

  <form action="" method="POST">
    <input type="hidden" name="id" value="<?= $dokter['id'] ?>">
    <label for="dokter" class="form-label">Dokter</label>
    <input type="text" name="dokter" value="<?= $dokter['nama'] ?>" class="form-control mb-3" id="dokter" placeholder="Nama Dokter">

    <label for="spesialis" class="form-label">Spesialis</label>
    <input type="text" name="spesialis" value="<?= $dokter['spesialis'] ?>" class="form-control mb-3" id="spesialis" placeholder="Spesialis">

    <label for="hari" class="form-label">Hari</label>
    <select id="hari" class="form-select mb-3" name="hari">
      <option value="<?= $dokter['hari'] ?>"><?= $dokter['hari'] ?></option>
      <option value="Senin">Senin</option>
      <option value="Selasa">Selasa</option>
      <option value="Rabu">Rabu</option>
      <option value="Kamis">Kamis</option>
      <option value="Jumat">Jumat</option>
      <option value="Sabtu">Sabtu</option>
      <option value="Minggu">Minggu</option>
    </select>

    <label for="Jam" class="form-label">Jam</label>
    <input type="text" name="jam" value="<?= $dokter['jam'] ?>" class="form-control mb-3" id="Jam" placeholder="Jam">

    <button type="submit" class="btn btn-sm btn-success" name="submit">
      Ubah
    </button>
  </form>

</div>

<?php require '../partials/footer.php'; ?>