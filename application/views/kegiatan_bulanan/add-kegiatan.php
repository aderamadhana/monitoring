
<div class="page-header">
    <h3 class="page-title"> <?= $title ?> </h3>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Master</a></li>
        <li class="breadcrumb-item"><a href="<?= site_url('KegiatanBulanan')?>">Data Kegiatan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Kegiatan</li>
    </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Kegiatan</h4>
                <small><?= $this->session->flashdata('message')?></small>
                <form action="<?= site_url('KegiatanBulanan/do_tambah_kegiatan') ?> " method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama Kegiatan</label>
                                <input type="hidden" name="NIP_PENCATAT" value="<?= $this->session->userdata('nip')?>" class="form-control" >
                                <input type="text" name="NAMA_KEGIATAN" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Deskripsi Kegiatan</label>
                                <textarea name="DESKRIPSI_KEGIATAN" class="form-control" ></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Periode Bulan</label>
                                <select name="PERIODE_BULAN" class="form-control" >
                                    <option value="Januari">Januari</option>
                                    <option value="Februari">Februari</option>
                                    <option value="Maret">Maret</option>
                                    <option value="April">April</option>
                                    <option value="Mei">Mei</option>
                                    <option value="Juni">Juni</option>
                                    <option value="Juli">Juli</option>
                                    <option value="Agustus">Agustus</option>
                                    <option value="September">September</option>
                                    <option value="Oktober">Oktober</option>
                                    <option value="November">November</option>
                                    <option value="Desember">Desember</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Periode Tahun</label>
                                <input type="number" min=2021 max=2030 name="PERIODE_TAHUN" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Target Kuantitas</label>
                                <input type="number" min=0 name="TARGET_KUANTITAS" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Target Waktu</label>
                                <input type="date" name="TARGET_WAKTU" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
