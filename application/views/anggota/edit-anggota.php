
<div class="page-header">
    <h3 class="page-title"> <?= $title ?> </h3>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Master</a></li>
        <li class="breadcrumb-item"><a href="<?= site_url('Anggota')?>">Anggota</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Anggota</li>
    </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Anggota</h4>
                <small><?= $this->session->flashdata('message')?></small>
                <form action="<?= site_url('Anggota/do_edit_anggota') ?> " method="post" enctype="multipart/form-data">
                    <?php foreach($anggota as $data){ ?>
                    <div class="form-group">
                        <label>NIP</label>
                        <input type="text" name="NIP" class="form-control" value="<?= $data->NIP ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="NAMA" class="form-control" value="<?= $data->NAMA ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="TEMPAT_LAHIR" class="form-control" value="<?= $data->TEMPAT_LAHIR ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="TANGGAL_LAHIR" class="form-control" value="<?= $data->TANGGAL_LAHIR ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="ALAMAT" class="form-control" required><?= $data->ALAMAT ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" name="TELEPON" class="form-control" value="<?= $data->TELEPON ?>">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="PASSWORD" class="form-control" value="<?= $data->PASSWORD ?>" required>
                    </div>
                    <?php }?>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="FOTO" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Jenis Keanggotaan</label>
                        <select name="JENIS_KEANGGOTAAN" id="jenis_keanggotaan" class="form-control" required>
                            <option>--- Pilih ---</option>
                            <option value="polsek">ANGGOTA POLSEK</option>
                            <option value="polres">ANGGOTA POLRES</option>
                        </select>
                    </div>
                    <div class="form-group" id="penempatan_polsek">
                        <label>Penempatan</label>
                        <select name="PENEMPATAN_POLSEK" class="form-control" required>
                            <option>--- Pilih ---</option>
                            <?php 
                                foreach($anggota_polsek as $data){
                            ?>
                            <option value="<?= $data->ID_POLSEK?>"><?= $data->NAMA_POLSEK?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group" id="penempatan_polres">
                        <label>Penempatan</label>
                        <select name="PENEMPATAN_POLRES" class="form-control" required>
                            <option>--- Pilih ---</option>
                            <?php 
                                foreach($anggota_polres as $data){
                            ?>
                            <option value="<?= $data->ID_POLRES?>"><?= $data->NAMA_POLRES?></option>
                            <?php }?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
