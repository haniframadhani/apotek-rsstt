<?php
$i = 1;
?>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <?php if (!empty($data['logs'])) : ?>
        <div class="table-responsive mt-2">
          <a href="<?= BASEURL ?>/report/print" class="btn btn-primary mb-2"><i class="bi bi-printer"></i> cetak</a>
          <table class="table table-striped table-bordered table-hover">
            <thead class="table-light">
              <tr>
                <th>no</th>
                <th>id log</th>
                <th>waktu</th>
                <th>kode obat</th>
                <th>nama generik</th>
                <th>nama merek</th>
                <th>jumlah</th>
                <th>harga</th>
                <th>total</th>
                <th>kode apoteker</th>
                <th>nama apoteker</th>
              </tr>
            </thead>
            <tbody class="">
              <?php foreach ($data['logs'] as $log) : ?>
                <tr>
                  <td><?= $i ?></td>
                  <td><?= $log['id'] ?></td>
                  <td><?= date('m/d/Y H:i:s', $log['time']) ?></td>
                  <td><?= $log['kode_obat'] ?></td>
                  <td><?= $log['nama_generik'] ?></td>
                  <td><?= $log['nama_merek'] ?></td>
                  <td><?= $log['jumlah'] ?></td>
                  <td><?= $log['harga'] ?></td>
                  <td><?= $log['jumlah'] * $log['harga'] ?></td>
                  <td><?= $log['kode_apoteker'] ?></td>
                  <td><?= $log['nama_apoteker'] ?></td>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php else : ?>
        <h2>report kosong</h2>
      <?php endif; ?>
    </div>
  </div>
</div>