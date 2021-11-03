<small><?= $this->session->flashdata('message')?></small>
<div class="page-header">
    <h3 class="page-title"> <?= $title ?> </h3>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        
        <li class="breadcrumb-item"><a href="<?= base_url('ValidasiKegiatan')?>">Kegiatan</a></li>
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
                    <h4>1. Data Kegiatan</h4>
                </div>
                <hr>
            </div>
            <!-- <div class="row">
                <div class="col-md-4">
                    <table >
                        <tr>
                            <th>Nama</th>
                            <td>: <?= $kejadian['NAMA_PELAPOR']?></td>
                        </tr>
                        <tr>
                            <th>Tempat, Tanggal Lahir</th>
                            <td>: <?= $kejadian['TEMPAT_LAHIR_PELAPOR']?>, <?= $kejadian['TANGGAL_LAHIR_PELAPOR']?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>: <?= $kejadian['ALAMAT_PELAPOR']?></td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>: <?= $kejadian['JENIS_KELAMIN_PELAPOR']?></td>
                        </tr>
                    </table>
                </div>
            </div> -->
            <div class="row">
                <div class="col-md-12">
                    <h4>3. Status Verifikasi</h4>
                </div>
                <hr>
            </div>
            <!-- <div class="row">
                <div class="col-md-12">
                    <form action="<?= base_url('ValidasiKejadian/aksi_validasi')?>" method="post">
                        <input type="hidden" class="form-control" name="id_kejadian" value="<?= $kejadian['ID_KEJADIAN']?>">
                        <input type="hidden" class="form-control" name="id_validator" value="<?= $this->session->userdata('nip')?>">
                        <div class="form-group">
                            <label>Catatan</label>
                            <textarea class="form-control" name="catatan"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="validasi">Validasi</button>
                        <button type="submit" class="btn btn-danger" name="tolak">Tolak</button>
                    </form>
                </div>
            </div> -->
        </div>
    </div>
    </div>
</div>