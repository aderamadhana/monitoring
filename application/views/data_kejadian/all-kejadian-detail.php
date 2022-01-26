<small><?= $this->session->flashdata('message') ?></small>
<div class="page-header">
    <h3 class="page-title"> <?= $title ?> </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <?php
            if ($this->session->userdata('role') == '1') {
            ?>
                <li class="breadcrumb-item"><a href="<?= base_url('Kejadian') ?>">Kejadian</a></li>
            <?php } else { ?>
                <li class="breadcrumb-item"><a href="<?= base_url('ValidasiKejadian') ?>">Kejadian</a></li>
            <?php } ?>
            <li class="breadcrumb-item active" aria-current="page">Detail Kejadian</li>
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
                        <?php
                        if ($this->session->userdata('role') == '1') {
                        ?>
                            <div class="float-right">
                                <a class="btn btn-sm btn-primary" title="Cetak Detail Kejadian" href="<?= base_url('Kejadian/print/') . $kejadian['ID_KEJADIAN']; ?>"><i class="mdi mdi-printer"></i> </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4>1. Identitas pelapor, pelaku, korban, dan saksi</h4>
                    </div>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <h5>Data Pelapor</h5>
                        <table>
                            <tr>
                                <th>Nama</th>
                                <td>: <?= $kejadian['NAMA_PELAPOR'] ?></td>
                            </tr>
                            <tr>
                                <th>Tempat, Tanggal Lahir</th>
                                <td>: <?= $kejadian['TEMPAT_LAHIR_PELAPOR'] ?>, <?= $kejadian['TANGGAL_LAHIR_PELAPOR'] ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>: <?= $kejadian['ALAMAT_PELAPOR'] ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>: <?= $kejadian['JENIS_KELAMIN_PELAPOR'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-3">
                        <h5>Data Pelaku</h5>
                        <table>
                            <tr>
                                <th>Nama</th>
                                <td>: <?= $kejadian['NAMA_PELAKU'] ?></td>
                            </tr>
                            <tr>
                                <th>Tempat, Tanggal Lahir</th>
                                <td>: <?= $kejadian['TEMPAT_LAHIR_PELAKU'] ?>, <?= $kejadian['TANGGAL_LAHIR_PELAKU'] ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>: <?= $kejadian['ALAMAT_PELAKU'] ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>: <?= $kejadian['JENIS_KELAMIN_PELAKU'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-3">
                        <h5>Data Korban</h5>
                        <table>
                            <tr>
                                <th>Nama</th>
                                <td>: <?= $kejadian['NAMA_KORBAN'] ?></td>
                            </tr>
                            <tr>
                                <th>Tempat, Tanggal Lahir</th>
                                <td>: <?= $kejadian['TEMPAT_LAHIR_KORBAN'] ?>, <?= $kejadian['TANGGAL_LAHIR_KORBAN'] ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>: <?= $kejadian['ALAMAT_KORBAN'] ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>: <?= $kejadian['JENIS_KELAMIN_KORBAN'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-3">
                        <h5>Data Saksi</h5>
                        <table>
                            <tr>
                                <th>Nama</th>
                                <td>: <?= $kejadian['NAMA_SAKSI'] ?></td>
                            </tr>
                            <tr>
                                <th>Tempat, Tanggal Lahir</th>
                                <td>: <?= $kejadian['TEMPAT_LAHIR_SAKSI'] ?>, <?= $kejadian['TANGGAL_LAHIR_SAKSI'] ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>: <?= $kejadian['ALAMAT_SAKSI'] ?></td>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <td>: <?= $kejadian['JENIS_KELAMIN_SAKSI'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <h4>2. Detail kejadian</h4>
                    </div>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <tr>
                                <th>Peristiwa</th>
                                <td><?= $kejadian['PERISTIWA'] ?></td>
                            </tr>
                            <tr>
                                <th>Runtutan Kejadian</th>
                                <td><?= $kejadian['KETERANGAN_KEJADIAN'] ?></td>
                            </tr>
                            <tr>
                                <th>Kategori Kejadian</th>
                                <td><?= $kejadian['KATEGORI_KEJADIAN'] ?></td>
                            </tr>
                            <tr>
                                <th>Bukti</th>
                                <td><a target="_blank" href="<?= $kejadian['BUKTI'] ?>" class="badge badge-success">Lihat</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <br>
                <?php
                if ($this->session->userdata('role') == '1' || $this->session->userdata('role') == '2') {
                ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>3. Status Verifikasi</h4>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Nama Pencatat</th>
                                    <?php
                                    if ($nip_pencatat['NAMA'] != null) {
                                    ?>
                                        <td><?= $nip_pencatat['NAMA'] ?></td>
                                    <?php
                                    } else {
                                    ?>
                                        <td>-</td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <th>Nama Validator</th>
                                    <td><?php if (!empty($nip_validator['NAMA'])) {
                                            echo $nip_validator['NAMA'];
                                        } ?></td>
                                </tr>
                                <tr>
                                    <th>Status Pelapor</th>
                                    <td><?= $kejadian['STATUS_KEJADIAN'] ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Dicatat</th>
                                    <td><?= $kejadian['TANGGAL_INPUT_DATA'] ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Selesai</th>
                                    <td><?= $kejadian['TANGGAL_VALIDASI'] ?></td>
                                </tr>
                                <tr>
                                    <th>Tempat Pencatatan</th>
                                    <td><?= $polsek['NAMA_POLSEK'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <?php 
                        if ($this->session->userdata('role') == '2') {
                    ?>
                    
                    <?php
                        }
                    ?>
                <?php } else { ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>3. Status Verifikasi</h4>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="<?= base_url('ValidasiKejadian/aksi_validasi') ?>" method="post">
                                <input type="hidden" class="form-control" name="id_kejadian" value="<?= $kejadian['ID_KEJADIAN'] ?>">
                                <input type="hidden" class="form-control" name="id_validator" value="<?= $this->session->userdata('nip') ?>">
                                <div class="form-group">
                                    <label>Catatan</label>
                                    <textarea class="form-control" name="catatan"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" name="validasi">Selesai Diproses</button>
                                <!-- <button type="submit" class="btn btn-danger" name="tolak">Tolak</button> -->
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>