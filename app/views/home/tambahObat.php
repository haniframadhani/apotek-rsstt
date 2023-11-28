<?php
print_r($data);
?><div class="container mt-3 mb-5">
    <div class="row">
        <div class="col-lg-6">
            <h2 class="text-capitalize">tambah obat</h2>
            <a href="<?= BASEURL ?>/home" class=""><i class="bi bi-chevron-left"></i> kembali</a>
            <form class="mt-2" action="<?= BASEURL ?>/home/tambah" method="post" novalidate>
                <div>
                    <label class="form-label" for="nama-generik">nama generik</label>
                    <input minlength="1" maxlength="255" type="text" name="nama_generik" id="nama_generik"
                        class="<?=$data['format']['nama_generik']?>" placeholder="nama generik"
                        value="<?= $data['obat']['nama_generik'] ?>" required>
                    <?php if(!empty($data['errors']['nama_generik'])) { ?>
                    <div class="invalid-feedback dblock">
                        <?php echo $data['errors']['nama_generik']; ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="mt-2">
                    <label class="form-label" for="nama-merek">nama merek</label>
                    <input minlength="1" maxlength="255" type="text" name="nama_merek" id="nama_merek"
                        class="<?=$data['format']['nama_merek']?>" placeholder="nama merek"
                        value="<?= $data['obat']['nama_merek'] ?>" required>
                    <?php if(!empty($data['errors']['nama_merek'])) { ?>
                    <div class="invalid-feedback ">
                        <?php echo $data['errors']['nama_merek']; ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="mt-2">
                    <label class="form-label" for="deskripsi">deskripsi</label>
                    <textarea maxlength="65535" name="deskripsi" id="deskripsi"
                        class="<?=$data['format']['deskripsi']?>" placeholder="deskripsi"
                        value="<?= $data['obat']['deskripsi'] ?>" required></textarea>
                    <?php if(!empty($data['errors']['deskripsi'])) { ?>
                    <div class="invalid-feedback ">
                        <?php echo $data['errors']['deskripsi']; ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="mt-2">
                    <label class="form-label" for="dosis">stok</label>
                    <div class="input-group">
                        <input type="number" name="stok" id="stok" class="<?=$data['format']['stok']?>" min="0"
                            max="2147483647" placeholder="stok" value="<?= $data['obat']['stok'] ?>" required>
                        <select class="<?= $data['format']['unit'] ?> input-group" name="unit" id="unit">
                            <option value="botol" selected>botol</option>
                            <option value="tablet">tablet</option>
                            <option value="kapsul">kapsul</option>
                        </select>
                        </select>
                        <?php if(!empty($data['errors']['stok'])) { ?>
                        <div class="invalid-feedback ">
                            <?php echo $data['errors']['stok']; ?>
                        </div>
                        <?php } ?>
                        <?php if(!empty($data['errors']['unit'])) { ?>
                        <div class="invalid-feedback ">
                            <?php echo $data['errors']['unit']; ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="mt-2">
                    <label class="form-label" for="efek-samping">efek samping</label>
                    <textarea maxlength="65535" name="efek_samping" id="efek_samping"
                        class="<?=$data['format']['efek_samping']?>" placeholder="efek samping"
                        value="<?= $data['obat']['efek_samping'] ?>" required></textarea>
                    <?php if(!empty($data['errors']['efek_samping'])) { ?>
                    <div class="invalid-feedback ">
                        <?php echo $data['errors']['efek_samping']; ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="mt-2">
                    <label class="form-label" for="indikasi">indikasi</label>
                    <textarea maxlength="65535" type="text" name="indikasi" id="indikasi"
                        class="<?=$data['format']['indikasi']?>" placeholder="indikasi"
                        value="<?= $data['obat']['indikasi'] ?>" required></textarea>
                    <?php if(!empty($data['errors']['indikasi'])) { ?>
                    <div class="invalid-feedback ">
                        <?php echo $data['errors']['indikasi']; ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="mt-2">
                    <label class="form-label" for="kontradiksi">kontradiksi</label>
                    <textarea maxlength="65535" type="text" name="kontradiksi" id="kontradiksi"
                        class="<?=$data['format']['kontradiksi']?>" placeholder="kontradiksi"
                        value="<?= $data['obat']['kontradiksi'] ?>" required></textarea>
                    <?php if(!empty($data['errors']['kontradiksi'])) { ?>
                    <div class="invalid-feedback ">
                        <?php echo $data['errors']['kontradiksi']; ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="mt-2">
                    <label class="form-label" for="peringatan">peringatan</label>
                    <textarea maxlength="65535" type="text" name="peringatan" id="peringatan"
                        class="<?=$data['format']['peringatan']?>" placeholder="peringatan"
                        value="<?= $data['obat']['peringatan'] ?>" required></textarea>
                    <?php if(!empty($data['errors']['peringatan'])) { ?>
                    <div class="invalid-feedback ">
                        <?php echo $data['errors']['peringatan']; ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="mt-2">
                    <label class="form-label" for="interaksi-obat">interaksi obat</label>
                    <textarea maxlength="65535" type="text" name="interaksi_obat" id="interaksi_obat"
                        class="<?=$data['format']['interaksi_obat']?>" placeholder="interaksi obat"
                        value="<?= $data['obat']['interaksi_obat'] ?>" required></textarea>
                    <?php if(!empty($data['errors']['interaksi_obat'])) { ?>
                    <div class="invalid-feedback ">
                        <?php echo $data['errors']['interaksi_obat']; ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="mt-2">
                    <label class="form-label" for="produsen">produsen</label>
                    <input minlength="1" maxlength="255" type="text" name="produsen" id="produsen"
                        class="<?=$data['format']['produsen']?>" placeholder="produsen"
                        value="<?= $data['obat']['produsen'] ?>" required>
                    <?php if(!empty($data['errors']['produsen'])) { ?>
                    <div class="invalid-feedback ">
                        <?php echo $data['errors']['produsen']; ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="mt-2">
                    <label class="form-label" for="harga">harga</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text">Rp.</span>
                        <input type="number" name="harga" id="harga" min="0" max="2147483647"
                            class="<?=$data['format']['harga']?>" placeholder="10000"
                            value="<?= $data['obat']['harga'] ?>" required>
                    </div>
                    <?php if(!empty($data['errors']['harga'])) { ?>
                    <div class="invalid-feedback ">
                        <?php echo $data['errors']['harga']; ?>
                    </div>
                    <?php } ?>
                </div>
                <button type="submit" class="btn btn-primary mt-3">tambah obat</button>
            </form>
        </div>
    </div>
</div>
<!-- 
<script>
(() => {
    'use strict'

    const forms = document.querySelectorAll('.needs-validation');

    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }
            form.classList.add('was-validated')
        }, false)
    })
})()
</script> -->