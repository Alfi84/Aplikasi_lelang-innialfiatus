<div class="container">

     <div class="row">
        <div class="col-md-12">
            <div class="text-center"><br>

            <h2>DETAIL HISTORY</h2>
            </div>
            <br>
            <a href="<?= base_url() ?>masyarakat/datalelang/riwayat" class="btn btn-danger">Kembali</a> <br><br>
            

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                     <!-- untuk menampilkan siapa pemenang lelang di history --> 
                     <?php if($product->harga_akhir) : ?>
                          <?= $max_bid->nama_lengkap; ?> memenangkan lelang ini dengan harga Rp. <?= number_format($product->harga_akhir, 2, ',', '.'); ?>
                        <?php else : ?>
                              Belum ada pemenang
                            <?php endif; ?>



                </div>

            <div class="row">


                <div class="col-md-4">
                    <div class="card mb-3">
                         <div class="card-heading btn btn-warning btn-sm-5">
                             Detail Barang
                        </div>


                        <div class="card-body">

                        <img src="<?= base_url() . '/uploads/' . $product->photo; ?>" class="card-img-top">


                            <p><strong>Nama Barang: </strong> <?= $product->nama_barang; ?></p>
                            <p><strong>Harga Awal: </strong> Rp. <?= number_format($product->harga_awal, 2, ',', '.'); ?></p>
                            <p><strong>Deskripsi Barang: </strong> <br> <?= $product->keterangan; ?></p>
                            <p><strong>Tanggal Lelang: </strong> <br> <?= $product->tgl_lelang; ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                <?php if($this->session->userdata('username')) : ?>
                     <div class="card mb-3">
                         <div class="card-heading btn btn-warning btn-sm-5">
                             History Bid
                            </div>
                            <div class="card-body">

                                <?php if (empty($history)) : ?>
                                     <div class="alert alert-info">
                                          <p>Belum ada yang melakukan bid, kenapa tidak menjadi yang pertama ?</p>
                                        </div>
                                    <?php else : ?>
                                         <?php foreach ($history as $hist) : ?>
                                              <p><strong><?= $hist->nama_lengkap ?></strong>: Rp. <?= number_format($hist->penawaran_harga, 2, ',', '.') ?></p>

                                         <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-4">
                        <div class="card mb-3">
                         <div class="card-heading btn btn-warning btn-sm-5">
                             Bid Tertinggi
                            </div>
                            <div class="card-body">


                        <!-- cek penawaran --> 
                        <?php if (empty($max_bid)) : ?>
                                     <div class="alert alert-info">
                                          <p>Belum ada yang melakukan bid, kenapa tidak menjadi yang pertama ?</p>
                                        </div>
                                    <?php else : ?>
                                           <p>

                                               <strong>Nama</strong>: <?= $max_bid->nama_lengkap; ?><i class="fas fa-solid fa-trophy text-warning"></i>

                                            <p>
                                              <p><strong>Harga</strong>: <?= number_format($max_bid->penawaran_harga, 2, ',', '.') ?></p>

                                        
                                    <?php endif; ?>
                                    <!-- cek pemenang cetak bukti -->
                                    <?php if($product->harga_akhir)   : ?>
								<?php if($product->id_user == $this->session->userdata('nama_lengkap')) : ?>
									<a href="<?= base_url('masyarakat/Datalelang/cetak/') . $product->id_lelang; ?>" class="btn btn-primary text-white"><i class="fas fa-print"></i>  CETAK BUKTI</a>
								<?php endif; ?>

            <?php else : ?>

            <?php endif; ?>
        </div>
        </div>
</div>

<?php endif; ?>
</div>
</div>
</div>
</div>