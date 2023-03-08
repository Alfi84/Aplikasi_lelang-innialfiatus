<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <h2><?= $title ?></h2>
            </div>


            <form action="" method="post" enctype="multipart/form-data">
                <!-- <?= validation_errors() ?> -->
                <div class="form-group">
                    <label for="product">Barang</label>
                    <select name="product" id="product" class="form-control">
                        <option value="">--- Pilih Barang ---</option>
                        <?php foreach ($products as $product) : ?>
                            <option value="<?= $product->id_barang ?>" <?= set_select('product', $product->id_barang) ?>><?= $product->nama_barang ?></option>
                        <?php endforeach; ?>
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl_lelang">Tanggal Lelang</label>
                            <input type="datetime-local" name="tgl_lelang" id="tgl_lelang" value="<?= set_value('tgl_lelang') ?>"
                            class="form-control" placeholder="Enter .." />
                        </div>
                        <div class="form-group">
                            <label for="tgl_lelang">Tanggal Akhir Lelang</label>
                            <input type="datetime-local" name="tanggal_akhir" id="tanggal_akhir" 
                            class="form-control" placeholder="Enter .." />
                        </div>

                        <!-- <div class="form-group">
                            <label for="jam_lelang">Jam Lelang</label>
                            <input type="time" name="jam_lelang" id="jam_lelang" value="<?= set_value('jam_lelang') ?>"
                            class="form-control" placeholder="Enter .." />
                        </div> -->
                        

                        <!-- <div class="form-group">
                            <label for="user">Pelelang</label>
                            <select name="user" id="user" class="form-control">
                                <option value="">-- Pilih Pelelang --</option>
                                <?php foreach ($users as $user) : ?>
                                    <option value="<?php echo $user->id_user ?>" <?php echo set_select('user', $user->id_user) ?>><?php echo $user->nama_lengkap ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div> -->

                        <div class="form-group">
                            <label for="petugas">Petugas</label>
                            <input type="text" class="form-control" value="<?= $this->session->userdata('nama_petugas')?>" disabled>
                                </div>

                                <!-- <div class="form-group">
                            <label for="petugas">Petugas</label>
                            <select name="petugas" id="petugas" class="form-control">
                                <option value="">-- Pilih Petugas --</option>
                                <?php foreach ($staffs as $staff) : ?>
                                    <option value="<?= $staff->id_petugas ?>" <?= set_select('petugas', $staff->id_petugas) ?>><?= $staff->nama_petugas ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div> -->

                <div class="form-group">
                    <label for="status">Status</label>
                    <label class="radio-inline">
                        <input type="radio" name="status" value="dibuka" <?= set_radio('status', 'dibuka') ?>> Dibuka
                    </label>
                    <label class="radio-inline">
                    <input type="radio" name="status" value="ditutup" <?= set_radio('status', 'dibuka') ?>> Ditutup
                    </label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="save" value="true">Simpan</button>
                    <a href="<?= base_url() ?>petugas/datalelang" class="btn btn-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div>
    
</div>