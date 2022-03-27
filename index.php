<?php
require '../connection.php';
require '../model.php';

$title = "Dokter";
require '../partials/header.php';
?>

<?php require '../partials/navbar.php'; ?>

<div class="container mt-5 p-4 shadow-sm">

  <h3 class="mb-3">Data Dokter</h3>

  <button type="button" class="btn btn-outline-success mb-3" data-bs-toggle="modal" data-bs-target="#modalAdd">
    Tambah Dokter
  </button>
  <a href="print.php" class="btn btn-outline-secondary mb-3">
    Print
  </a>

  <?php $dokters = $db->get($conn, 'dokter') ?>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Dokter</th>
        <th scope="col">Spesialis</th>
        <th scope="col">Hari Praktek</th>
        <th scope="col" class="text-center">Jam</th>
        <th scope="col" class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1 ?>
      <?php foreach ($dokters as $dokter) : ?>
        <tr>
          <th scope="row"><?= $no ?></th>
          <td><?= $dokter['nama'] ?></td>
          <td><?= $dokter['spesialis'] ?></td>
          <td><?= $dokter['hari'] ?></td>
          <td class="text-center"><?= $dokter['jam'] ?></td>
          <td class="text-center">
            <a type="button" class="btn btn-sm btn-outline-success" href="edit.php?id=<?= $dokter['id'] ?>">
              Edit
            </a>
            <a class="btn btn-sm bg-warning bg-gradient text-white" href="delete.php?id=<?= $dokter['id'] ?>">Delete</a>
          </td>
        </tr>
        <?php $no++; ?>
      <?php endforeach; ?>

    </tbody>
  </table>

  <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog">

      <form action="add.php" method="POST">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAddLabel">Tambah Dokter</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <label for="dokter" class="form-label">Dokter</label>
            <input type="text" name="dokter" class="form-control mb-3" id="dokter" placeholder="Nama Dokter">

            <label for="spesialis" class="form-label">Spesialis</label>
            <input type="text" name="spesialis" class="form-control mb-3" id="spesialis" placeholder="Spesialis">

            <label for="hari" class="form-label">Hari</label>
            <select id="hari" class="form-select mb-3" name="hari">
              <option selected>Pilih Hari</option>
              <option value="Senin">Senin</option>
              <option value="Selasa">Selasa</option>
              <option value="Rabu">Rabu</option>
              <option value="Kamis">Kamis</option>
              <option value="Jumat">Jumat</option>
              <option value="Sabtu">Sabtu</option>
              <option value="Minggu">Minggu</option>
            </select>

            <label for="Jam" class="form-label">Jam</label>
            <input type="text" name="jam" class="form-control mb-3" id="Jam" placeholder="Jam">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Tambah</button>
          </div>
        </div>
      </form>

    </div>
  </div>

</div>

<?php require '../partials/footer.php'; ?>