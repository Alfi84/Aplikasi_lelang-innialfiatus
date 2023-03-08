<section class="site-section py-sm">
     <div class="container">
     
         <div class="row">
         <div class="col-md-6">
         <br>
         <h2 class="mb-4">DAFTAR HISTORY</h2>

    </div>
 </div>


 <div class="row text-center mt-3">
 
 <?php foreach ($history as $his) : ?>

 <div class="card ml-3 mb-3" style="width: 16rem;">
               <img src="<?= base_url() . '/uploads/' . $his->photo; ?>" class="card-img-top">

            <div class="card-body">
            <h4 class="card-title"><?= $his->nama_barang; ?></h4>
            <span class="badge badge-success mb-3">Rp. <?= number_format($his->harga_awal, 0, ',', '.'); ?></span>
            <h5 class="text-primary">
            <strong><hr></strong>
            </h5>
            <a href="<?= base_url('masyarakat/datalelang/history_detail/') . $his->id_lelang; ?>">
             <h5 class="text-center text-primary"><strong>LIHAT DETAIL</h5>
             </a>
             <h5 class="text-primary">
             <strong><hr></strong>
             </h5>
             

     </div>
 </div>
 <?php endforeach; ?>

</div> 
</section>