<small><?= $this->session->flashdata('message')?></small>
<div class="page-header">
    <h3 class="page-title"> <?= $title ?> </h3>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        
        <li class="breadcrumb-item"><a href="<?= base_url('ValidasiKegiatan/bulanan')?>">Kegiatan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Kegiatan</li>
    </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="float-left">
                        <!-- <h4 class="card-title">Detail Kejadian</h4> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4>1. Data Kegiatan Bulanan</h4>
                </div>
                <hr>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Kegiatan</th>
                            <td><?= $kegiatan['NAMA_KEGIATAN']?></td>
                        </tr>
                        <tr>
                            <th>Deskripsi Kegiatan</th>
                            <td><?= $kegiatan['DESKRIPSI_KEGIATAN']?></td>
                        </tr>
                        <tr>
                            <th>Periode</th>
                            <td><?= $kegiatan['PERIODE_BULAN']?> <?= $kegiatan['PERIODE_TAHUN']?></td>
                        </tr>
                        <tr>
                            <th>Target Kuantitas</th>
                            <td><?= $kegiatan['TARGET_KUANTITAS']?></td>
                        </tr>
                        <tr>
                            <th>Target Waktu</th>
                            <td><?= $kegiatan['TARGET_WAKTU']?></td>
                        </tr>
                    </table>
                </div>
            </div><br>
            
            <?php 
                if($kegiatan['STATUS_KEGIATAN_BULANAN'] != 'Tervalidasi'){
            ?>
            <div class="row">
                <div class="col-md-12">
                    <form action="<?= base_url('ValidasiKegiatan/aksi_validasi')?>" method="post">
                        <input type="hidden" class="form-control" name="id_kegiatan" value="<?= $kegiatan['ID_KEGIATAN_BULANAN']?>">
                        <input type="hidden" class="form-control" name="id_validator" value="<?= $this->session->userdata('nip')?>">
                        <div class="form-group">
                            <label>Catatan</label>
                            <textarea class="form-control" name="catatan"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="validasi">Validasi</button>
                        <button type="submit" class="btn btn-danger" name="tolak">Tolak</button>
                    </form>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
    </div>
</div>