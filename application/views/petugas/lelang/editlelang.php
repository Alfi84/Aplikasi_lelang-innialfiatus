<?php
$tgl_lelang = substr($auction->tgl_lelang, 0, 10);
$jam_lelang = substr($auction->tgl_lelang, 11);
?>
<div class="container-fluid">

    <div class="row">
        <div class="card mx-auto" style="width: 35%;">
            <div class="card-header bg-dark text-white text-center">
                <?=$title ?>
            </div>

            <form action="<?= base_url('petugas/datalelang/edit/') . $auction->id_lelang ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                
                <div class="form-group row">
                    <label for="tanggal_akhir" class="col-sm-3 col-form-label">Tanggal lelang</label>
                    <div class="col-sm-9">
                        <input type="datetime-local" name="tanggal_akhir" id="tanggal_akhir" value="<?= $auction->tanggal_akhir ?>" class="form-control" placeholder="Enter.."/>
                        
                    </div>
                </div>
                
                <div class="form-group">
                    <button type="submit" name="save" class="btn btn-secondary col-lg"  value="true"><i class="fas fa-edit"></i> Ubah</button>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>