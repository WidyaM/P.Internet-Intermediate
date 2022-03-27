<?php
require '../connection.php';
require '../model.php';
$title = "print";
require '../partials/header.php';
?>

<?php $dokters = $db->get($conn, 'dokter') ?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Dokter</th>
      <th scope="col">Spesialis</th>
      <th scope="col">Hari Praktek</th>
      <th scope="col" class="text-center">Jam</th>
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

      </tr>
      <?php $no++; ?>
    <?php endforeach; ?>

  </tbody>
</table>

<script>
  print();
</script>