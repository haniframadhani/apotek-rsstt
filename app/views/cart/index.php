<?php
$i = 1;
?>
<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash(); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <?php if (!empty($data['cart'])) : ?>
      <div class="table-responsive mt-2">
        <table class="table table-striped table-bordered table-hover">
          <thead class="table-light">
            <tr>
              <th>kode obat</th>
              <th>nama generik</th>
              <th>nama merek</th>
              <th>jumlah</th>
              <th>simpan</th>
              <th>hapus</th>
              <th>harga</th>
            </tr>
          </thead>
          <tbody class="">
            <?php foreach ($data['cart'] as $cart) : ?>
            <tr>
              <form method="post">
                <td><a href="<?= BASEURL ?>/home/detail/<?= $cart['kode_obat'] ?>"><?= $cart['kode_obat'] ?></a></td>
                <td><a href="<?= BASEURL ?>/home/detail/<?= $cart['kode_obat'] ?>"><?= $cart['nama_generik'] ?></a></td>
                <td><a href="<?= BASEURL ?>/home/detail/<?= $cart['kode_obat'] ?>"><?= $cart['nama_merek'] ?></a></td>
                <td>
                  <div class="input-group mb-3 w-auto">
                    <button class="btn btn-outline-secondary" type="button" id="minus<?= $i ?>"
                      onclick="count<?= $i ?>(this.id)"><i class="bi bi-dash"></i></button>
                    <input type="number" class="form-control flex-grow-0 w-25" min="1" max="<?= $cart['stok'] ?>"
                      id="counter<?= $i ?>" value="1">
                    <button class="btn btn-outline-secondary" type="button" id="plus<?= $i ?>"
                      onclick="count<?= $i ?>(this.id)"><i class="bi bi-plus"></i></button>
                  </div>
                </td>
                <td>
                  <a href="<?= BASEURL ?>/cart/simpan" class="btn btn-primary"><i class="bi bi-floppy2"></i> simpan</a>
                </td>
                <td>
                  <a href="<?= BASEURL ?>/cart/hapus/<?= $cart['kode_obat'] ?>" class="btn btn-danger"
                    onclick="return confirm('yakin?')"><i class="bi bi-trash3"></i> hapus</a>
                </td>
                <td><?= $cart['harga'] ?></td>
                <script>
                function count<?= $i ?>(clicked_id) {
                  var counter = document.getElementById('counter<?= $i ?>').value;
                  console.log(clicked_id)
                  var parsed = parseInt(counter);
                  let result = clicked_id == "minus<?= $i ?>" ? parsed - 1 : parsed + 1;
                  result = result < 1 ? 1 : result;
                  result = result > <?= $cart['stok'] ?> ? <?= $cart['stok'] ?> : result;
                  document.getElementById('counter<?= $i ?>').value = result;
                }
                </script>
              </form>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <?php else : ?>
      <h2>keranjang kosong</h2>
      <?php endif; ?>
    </div>
  </div>
</div>