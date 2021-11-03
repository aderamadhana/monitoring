
<div class="page-header">
    <h3 class="page-title"> <?= $title ?> </h3>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Master</a></li>
        <li class="breadcrumb-item"><a href="<?= site_url('KegiatanBulanan')?>">Data Kegiatan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Kegiatan</li>
    </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Kegiatan</h4>
                <small><?= $this->session->flashdata('message')?></small>
                <form action="<?= site_url('KegiatanBulanan/do_edit_kegiatan') ?> " method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama Kegiatan</label>
                                <input type="hidden" name="NIP_PENCATAT" value="<?= $this->session->userdata('nip')?>" class="form-control" >
                                <input type="text" name="NAMA_KEGIATAN" class="form-control" value="<?= $kegiatan['NAMA_KEGIATAN']?>">
                                <input type="hidden" name="ID_KEGIATAN_BULANAN" class="form-control" value="<?= $kegiatan['ID_KEGIATAN_BULANAN']?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Deskripsi Kegiatan</label>
                                <textarea name="DESKRIPSI_KEGIATAN" class="form-control" ><?= $kegiatan['DESKRIPSI_KEGIATAN']?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Periode Bulan</label>
                                <select name="PERIODE_BULAN" class="form-control" >
                                    <option value="Januari" <?php if($kegiatan['PERIODE_BULAN'] == 'Januari') echo 'selected'?> >Januari</option>
                                    <option value="Februari" <?php if($kegiatan['PERIODE_BULAN'] == 'Februari') echo 'selected'?>>Februari</option>
                                    <option value="Maret" <?php if($kegiatan['PERIODE_BULAN'] == 'Maret') echo 'selected'?>>Maret</option>
                                    <option value="April" <?php if($kegiatan['PERIODE_BULAN'] == 'April') echo 'selected'?>>April</option>
                                    <option value="Mei" <?php if($kegiatan['PERIODE_BULAN'] == 'Mei') echo 'selected'?>>Mei</option>
                                    <option value="Juni" <?php if($kegiatan['PERIODE_BULAN'] == 'Juni') echo 'selected'?>>Juni</option>
                                    <option value="Juli" <?php if($kegiatan['PERIODE_BULAN'] == 'Juli') echo 'selected'?>>Juli</option>
                                    <option value="Agustus" <?php if($kegiatan['PERIODE_BULAN'] == 'Agustus') echo 'selected'?>>Agustus</option>
                                    <option value="September" <?php if($kegiatan['PERIODE_BULAN'] == 'September') echo 'selected'?>>September</option>
                                    <option value="Oktober" <?php if($kegiatan['PERIODE_BULAN'] == 'Oktober') echo 'selected'?>>Oktober</option>
                                    <option value="November" <?php if($kegiatan['PERIODE_BULAN'] == 'November') echo 'selected'?>>November</option>
                                    <option value="Desember" <?php if($kegiatan['PERIODE_BULAN'] == 'Desember') echo 'selected'?>>Desember</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Periode Tahun</label>
                                <input type="number" min=2021 max=2030 name="PERIODE_TAHUN" class="form-control" value="<?= $kegiatan['PERIODE_TAHUN']?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Target Kuantitas</label>
                                <input type="number" min=0 name="TARGET_KUANTITAS" class="form-control" value="<?= $kegiatan['TARGET_KUANTITAS']?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Target Waktu</label>
                                <input type="date" name="TARGET_WAKTU" class="form-control" value="<?= $kegiatan['TARGET_WAKTU']?>">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
