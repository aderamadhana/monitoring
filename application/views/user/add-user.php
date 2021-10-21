
<div class="page-header">
    <h3 class="page-title"> <?= $title ?> </h3>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">User</a></li>
        <li class="breadcrumb-item"><a href="<?= site_url('User')?>">User</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah User</li>
    </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah User</h4>
                <small><?= $this->session->flashdata('message')?></small>
                <form action="<?= site_url('User/do_tambah_user') ?> " method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>NIP</label>
                        <input type="text" name="NIP" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="NAMA" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="TEMPAT_LAHIR" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="TANGGAL_LAHIR" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="ALAMAT" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" name="TELEPON" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <input type="text" name="JABATAN" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="USERNAME" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="PASSWORD" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="FOTO" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="ROLE" class="form-control" required>
                            <option>--- Pilih ---</option>
                            <?php 
                                foreach($role as $data){
                            ?>
                            <option value="<?= $data->ID_ROLE?>"><?= $data->ROLE?></option>
                            <?php }?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
