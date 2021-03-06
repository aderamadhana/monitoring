
<div class="page-header">
    <h3 class="page-title"> <?= $title ?> </h3>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Master</a></li>
        <li class="breadcrumb-item"><a href="<?= site_url('DataKejadian')?>">Data Kejadian</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Kejadian</li>
    </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Kejadian</h4>
                <small><?= $this->session->flashdata('message')?></small>
                <form action="<?= site_url('DataKejadian/do_edit_kejadian') ?> " method="post" enctype="multipart/form-data">
                    <h5>Peristiwa</h5><hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Kategori Kejadian</label>
                                <select name="KATEGORI_KEJADIAN" class="form-control" >    
                                    <option value="Kriminal" <?php if($kejadian['JENIS_KELAMIN_KORBAN'] == 'Kriminal') echo 'selected'?>>Kriminal</option>
                                    <option value="Non Kriminal" <?php if($kejadian['JENIS_KELAMIN_KORBAN'] == 'Non Kriminal') echo 'selected'?>>Non Kriminal</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Detail Peristiwa</label>
                                <textarea name="PERISTIWA" class="form-control" ><?= $kejadian['PERISTIWA'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Runtutan Kejadian</label>
                                <textarea name="KETERANGAN_KEJADIAN" class="form-control" >  <?= $kejadian['KETERANGAN_KEJADIAN'] ?> </textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tempat Kejadian</label>
                                <textarea name="TEMPAT_KEJADIAN" class="form-control" required><?= $kejadian['TEMPAT_KEJADIAN'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Kejadian</label>
                                <input type="date" name="TANGGAL_KEJADIAN" class="form-control" value="<?= $kejadian['TANGGAL_KEJADIAN'] ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Waktu Kejadian</label>
                                <input type="time" name="WAKTU_KEJADIAN" class="form-control" value="<?= $kejadian['WAKTU_KEJADIAN'] ?>" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Bukti</label>
                                <input type="file" name="BUKTI" class="form-control">
                            </div>
                        </div>
                    </div>
                    <h5>Data Pelapor</h5><hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nama Pelapor</label>
                                <input type="hidden" name="NIP_PENCATAT" value="<?= $this->session->userdata('nip')?>" class="form-control" >
                                <input type="text" name="NAMA_PELAPOR" class="form-control" value="<?= $kejadian['NAMA_PELAPOR'] ?>" >
                                <input type="hidden" name="ID_KEJADIAN" class="form-control" value="<?= $kejadian['ID_KEJADIAN'] ?>" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tempat Lahir Pelapor</label>
                                <input type="text" name="TEMPAT_LAHIR_PELAPOR" class="form-control" value="<?= $kejadian['TEMPAT_LAHIR_PELAPOR'] ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tanggal Lahir Pelapor</label>
                                <input type="date" name="TANGGAL_LAHIR_PELAPOR" class="form-control" value="<?= $kejadian['TANGGAL_LAHIR_PELAPOR'] ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Alamat Pelapor</label>
                                <input type="text" name="ALAMAT_PELAPOR" class="form-control" value="<?= $kejadian['ALAMAT_PELAPOR'] ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jenis Kelamin Pelapor</label>
                                <select name="JENIS_KELAMIN_PELAPOR" class="form-control" >
                                    <option value="Laki-Laki" <?php if($kejadian['JENIS_KELAMIN_PELAPOR'] == 'Laki-Laki') echo 'selected'?>>Laki-Laki</option>
                                    <option value="Perempuan" <?php if($kejadian['JENIS_KELAMIN_PELAPOR'] == 'Perempuan') echo 'selected'?> >Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <h5>Data Pelaku</h5><hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nama Pelaku</label>
                                <input type="text" name="NAMA_PELAKU" class="form-control" value="<?= $kejadian['NAMA_PELAKU'] ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tempat Lahir Pelaku</label>
                                <input type="text" name="TEMPAT_LAHIR_PELAKU" class="form-control" value="<?= $kejadian['TEMPAT_LAHIR_PELAKU'] ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tanggal Lahir Pelaku</label>
                                <input type="date" name="TANGGAL_LAHIR_PELAKU" class="form-control" value="<?= $kejadian['TANGGAL_LAHIR_PELAKU'] ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Alamat Pelaku</label>
                                <input type="text" name="ALAMAT_PELAKU" class="form-control" value="<?= $kejadian['ALAMAT_PELAKU'] ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jenis Kelamin Pelaku</label>
                                <select name="JENIS_KELAMIN_PELAKU" class="form-control" >
                                    <option value="-" <?php if($kejadian['JENIS_KELAMIN_PELAKU'] == '-') echo 'selected'?>>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki" <?php if($kejadian['JENIS_KELAMIN_PELAKU'] == 'Laki-Laki') echo 'selected'?>>Laki-Laki</option>
                                    <option value="Perempuan" <?php if($kejadian['JENIS_KELAMIN_PELAKU'] == 'Perempuan') echo 'selected'?> >Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <h5>Data Korban</h5><hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nama Korban</label>
                                <input type="text" name="NAMA_KORBAN" class="form-control" value="<?= $kejadian['NAMA_KORBAN'] ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tempat Lahir Korban</label>
                                <input type="text" name="TEMPAT_LAHIR_KORBAN" class="form-control" value="<?= $kejadian['TEMPAT_LAHIR_KORBAN'] ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tanggal Lahir Korban</label>
                                <input type="date" name="TANGGAL_LAHIR_KORBAN" class="form-control" value="<?= $kejadian['TANGGAL_LAHIR_KORBAN'] ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Alamat Korban</label>
                                <input type="text" name="ALAMAT_KORBAN" class="form-control" value="<?= $kejadian['ALAMAT_KORBAN'] ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jenis Kelamin Korban</label>
                                <select name="JENIS_KELAMIN_KORBAN" class="form-control" >
                                    <option value="-" <?php if($kejadian['JENIS_KELAMIN_KORBAN'] == '-') echo 'selected'?>>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki" <?php if($kejadian['JENIS_KELAMIN_KORBAN'] == 'Laki-Laki') echo 'selected'?>>Laki-Laki</option>
                                    <option value="Perempuan" <?php if($kejadian['JENIS_KELAMIN_KORBAN'] == 'Perempuan') echo 'selected'?> >Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <h5>Data Saksi</h5><hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nama Saksi</label>
                                <input type="text" name="NAMA_SAKSI" class="form-control" value="<?= $kejadian['NAMA_SAKSI'] ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tempat Lahir Saksi</label>
                                <input type="text" name="TEMPAT_LAHIR_SAKSI" class="form-control" value="<?= $kejadian['TEMPAT_LAHIR_SAKSI'] ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tanggal Lahir Saksi</label>
                                <input type="date" name="TANGGAL_LAHIR_SAKSI" class="form-control" value="<?= $kejadian['TANGGAL_LAHIR_SAKSI'] ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Alamat Saksi</label>
                                <input type="text" name="ALAMAT_SAKSI" class="form-control" value="<?= $kejadian['ALAMAT_SAKSI'] ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jenis Kelamin Saksi</label>
                                <select name="JENIS_KELAMIN_SAKSI" class="form-control" >
                                    <option value="-" <?php if($kejadian['JENIS_KELAMIN_SAKSI'] == '-') echo 'selected'?>>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki" <?php if($kejadian['JENIS_KELAMIN_SAKSI'] == 'Laki-Laki') echo 'selected'?>>Laki-Laki</option>
                                    <option value="Perempuan" <?php if($kejadian['JENIS_KELAMIN_SAKSI'] == 'Perempuan') echo 'selected'?> >Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
