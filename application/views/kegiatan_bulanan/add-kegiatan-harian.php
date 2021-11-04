
<div class="page-header">
    <h3 class="page-title"> <?= $title ?> </h3>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Master</a></li>
        <li class="breadcrumb-item"><a href="<?= site_url('KegiatanBulanan')?>">Data Kegiatan</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Kegiatan Harian</li>
    </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <small><?= $this->session->flashdata('message')?></small>
                <form action="<?= site_url('KegiatanBulanan/do_tambah_kegiatan_harian') ?> " method="post" enctype="multipart/form-data">
                    <?php 
                        for ($i=1; $i <= $target_kuantitas; $i++) { 
                    ?>
                    <h4 class="card-title">Tambah Kegiatan Harian <?= $i ?></h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama Kegiatan</label>
                                <input type="text" name="NAMA_KEGIATAN[]" class="form-control">
                                <input type="hidden" name="ID_KEGIATAN_BULANAN" value="<?= $id_kegiatan_bulanan?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Deskripsi Kegiatan</label>
                                <textarea name="DESKRIPSI_KEGIATAN[]" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tanggal Kegiatan</label>
                                <input type="date" name="TANGGAL_KEGIATAN[]" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Waktu Kegiatan</label>
                                <input type="time" name="WAKTU_KEGIATAN[]" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Bukti</label>
                                <input type="file" name="BUKTI[]" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
