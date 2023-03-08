<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <div class="container-fluid">


         <center>
             <h1 class="h3 mb-2 text-primary-800"><?= $title ?></h1>
</center>
     

    <table class="table table-bordered table-striped alert alert--primary">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Gambar </th>
                <th class="text-center">Nama Barang</th>
                <th class="text-center">Harga Awal</th>
                <th class="text-center">Tanggal Lelang</th>
                <th class="text-center">Tanggal Akhir</th>
                <th class="text-center">Status</th>
                <th class="text-center">Pemenang</th>
                <th class="text-center">Harga Akhir</th>
                <th class="text-center">Pelelang</th>
                <th class="text-center">Action</th>
            </tr>


        <?php $no = 1; 
        foreach ($masyarakat as $m) : ?> 
        <?php if ($m->status == 'ditutup') : ?>
            <tr>
                <td class="text-center"><?= $no++ ?></td>
                <!-- <td class="text-center"><?= $m->pelelang?></td> -->
                <td class="text-center"><img src="<?= base_url(). '/uploads/' . $m->photo ?>" width="75px"></td>
                <td class="text-center"><?= $m->nama_barang ?></td>
                <td>Rp. <?= number_format($m->harga_awal, 2, ',','.') ?></td>
                <td class="text-center"><?= $m->tgl_lelang ?></td>
                <td class="text-center"><?= $m->tanggal_akhir ?></td>
                <td>
                    <?php if ($m->status == 'ditutup') : ?>
                        <div class="btn btn-sm btn-danger ml-2">Ditutup</div>
                        <?php else : ?>
                            <div class="btn btn-sm btn-success ml-2">Dibuka</div>
                            <?php endif; ?>
                        </td>

        <td>

            <?php if ($m->nama_lengkap == null) : ?>
                <center> - </center>
            <?php else : ?>
                <?= $m->nama_lengkap ?>
            <?php endif; ?>
        
            </td>

            <td>Rp. <?= number_format($m->harga_akhir, 2, ',','.') ?></td>
            <td class="text-center"><?= $m->nama_petugas ?></td>
            <td>
                <?php 
                if($m->nama_lengkap == null) : ?>
                    <center>
                        <?= anchor('petugas/datapemenang/edit_pemenang/' . $m->id_lelang, '<div class="btn
                        btn-primary btn-sm mb-3"><i class="fas fa-edit"></i></div>'); ?>
                        <?= anchor('petugas/datapemenang/view_pemenang/' . $m->id_lelang, '<div class="btn
                        btn-success btn-sm mb-3"><i class="fas fa-eye"></i></div>'); ?>
                        </center>
                    <?php else : ?>
                        <center>
                            <?= anchor('petugas/datapemenang/view_pemenang/' . $m->id_lelang, '<div class="btn
                            btn-success btn-sm mb-3"><i class="fas fa-eye"></i></div>'); ?>
                            </center>
                    <?php endif; ?>

            </td>
               
            </tr>
            <?php endif; ?>
            <?php endforeach; ?> 
      </table>
      </div>
    </div>
   </div>