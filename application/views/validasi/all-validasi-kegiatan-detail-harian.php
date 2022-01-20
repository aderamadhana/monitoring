<small><?= $this->session->flashdata('message')?></small>
<div class="page-header">
    <h3 class="page-title"> <?= $title ?> </h3>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        
        <li class="breadcrumb-item"><a href="<?= base_url('ValidasiKegiatan/harian')?>">Kegiatan</a></li>
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
                    <h4>1. Data Kegiatan Harian</h4>
                </div>
                <hr>
            </div>
            <?php foreach($kegiatan as $data){ ?>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Kegiatan</th>
                            <td><?= $data->NAMA_KEGIATAN?></td>
                        </tr>
                        <tr>
                            <th>Deskripsi Kegiatan</th>
                            <td><?= $data->DESKRIPSI_KEGIATAN?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Kegiatan</th>
                            <td><?= $data->TANGGAL_KEGIATAN?> <?= $data->WAKTU_KEGIATAN?></td>
                        </tr>
                        <tr>
                            <th>Bukti</th>
                            <td><a target="_blank" href="<?= base_url('assets/img/kegiatan/'.$data->BUKTI)?>" class="badge badge-success">Lihat</a></td>
                        </tr>
                    </table>
                </div>
            </div><br>
            <?php }?>
            <?php 
                if($kegiatan_harian['STATUS_KEGIATAN_HARIAN'] != 'Tervalidasi'){
            ?>
            <div class="row">
                <div class="col-md-12">
                    <form action="<?= base_url('ValidasiKegiatan/aksi_validasi_kegiatan_harian')?>" method="post">
                        <input type="hidden" class="form-control" name="id_kegiatan" value="<?= $kegiatan_harian['ID_KEGIATAN_BULANAN']?>">
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