<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <h2><?$title ?></h2>
            </div>

    <?= $this->session->flashdata('message'); ?>

    <!-- tombol tambah -->
        <a href="<?= base_url('petugas/datalelang/create')?>" class="btn btn-sm btn-primary mb-3"><i class="fas 
        fa-plus mr-2"></i>Tambahkan barang</a>

    <div class="table-responsive">
        <table class="table table-borderet table-striped alert alert-primary">
            <tr>
                <th>Nomor</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Harga Awal</th>
                <th>Status</th>
                <th>Harga Akhir</th>
                <th>Pemenang</th>
                <th>petugas</th>
                <th>Tanggal Akhir</th>
                <th>Action</th>
            </tr>
            <?php $i = 1;
            foreach ($auctions as $auction ) : ?>
            <tr>

            <td><?= $i; ?></td>
            <td><img src="<?= base_url().'/uploads/'.$auction->photo ?>" width="100"></td>
            <td><?=substr($auction->nama_barang,0,20) ?><h4>....</h4></td>
            <td>Rp. <?=number_format($auction->harga_awal   , 2, ',', '.') ?></td>

            <td>
                <?php if ($auction->status == 'ditutup') : ?>
                    <div class="label laber-danger">Ditutup</div>
                <?php else : ?>
                    <div class="label laber-success">Dibuka</div>
                <?php endif; ?>
            </td>

            <td>

                <?php if ($auction->harga_akhir == null) : ?>
                    -
                <?php else : ?>
                    Rp. <?=number_format($auction->harga_akhir,2,',','.') ?>
                
                <?php endif; ?>
                
                <td><?= $auction->nama_lengkap ?></td>
                <td><?= $auction->nama_petugas ?></td>
                <td><?= $auction->tanggal_akhir ?></td>
                <td>

                <?php if ($auction->status != 'ditutup' || $auction->harga_akhir == null) : ?>
                <a class="btn btn-sm btn-primary" href="<?= base_url('petugas/datalelang/edit/'.$auction->id_lelang) ?>"><i class="fas fa-edit"></i></a>
                <?php endif; ?>

            <a onclick="return confirm('Apakah Anda Yakin Akan Menghapus Barang ini? barang Yang dilelang tidak Bisa Dihapus!')" class="btn btn-sm btn-danger" href="<?= base_url('petugas/datalelang/delete/'. $auction->id_lelang) ?>"><i class="fas fa-trash"></i></a>

            <?php if ($auction->status != 'ditutup') : ?>
                <a class="btn btn-sm btn-warning" href="<?= base_url('petugas/datalelang/finish/' . $auction->id_lelang) ?>"><i class="fas fa-solid fa-trophy"></i> </a>
            <?php endif; ?>


            <a class="btn btn-sm btn-success" href="<?= base_url('petugas/datalelang/view/' . $auction->id_lelang) ?>"><i class="fas fa-eye"></i></a>
                </td>
                </tr>
                    <?php $i++;
                    endforeach; ?>
                    </table>
                </div>
                </div>
                </div>

                </div>