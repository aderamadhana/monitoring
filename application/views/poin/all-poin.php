<small><?= $this->session->flashdata('message') ?></small>
<div class="page-header">
    <h3 class="page-title"> <?= $title ?> </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Master</a></li>
            <li class="breadcrumb-item active" aria-current="page">Poin</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <h3 class="page-title"> <?= $title ?> </h3>
            </div>
            <div class="card-body">
                <!-- <div class="row">
                    <div class="col-md-12">
                        <div class="float-left">
                            <h4 class="card-title">Poin</h4>
                        </div>
                    </div>
                </div><br> -->
                <form action="<?= site_url('Poin') ?>" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col-3">
                            <select class="form-control" name="BULAN">
                                <option value="0" <?php $pengajuan == 0 ? "selected" : ""; ?>>Semua</option>
                                <?php
                                foreach ($bulan as $row) {
                                    if (isset($row->PERIODE_BULAN)) {
                                ?>
                                        <option value="<?php echo $row->PERIODE_BULAN  ?>" <?php if ($pengajuan == $row->PERIODE_BULAN) {
                                                                                                echo "selected";
                                                                                            }; ?>><?php echo tgl_indo($row->PERIODE_BULAN) ?></option>
                                <?php
                                    }
                                } ?>
                            </select>
                        </div>
                        <div class="col-3">
                            <select class="form-control" name="TAHUN">
                                <option value="0" <?php $pengajuan == 0 ? "selected" : ""; ?>>Semua</option>
                                <?php
                                foreach ($tahun as $row) {
                                    if (isset($row->PERIODE_TAHUN)) {
                                ?>
                                        <option value="<?php echo $row->PERIODE_TAHUN ?>" <?php if ($pengajuan == $row->PERIODE_TAHUN) {
                                                                                                echo "selected";
                                                                                            }; ?>><?php echo $row->PERIODE_TAHUN ?></option>
                                <?php
                                    }
                                } ?>
                            </select>
                        </div>
                        <div class="col-1">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </div>
                </form>
                <br />
                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th> No </th>
                            <th> Nama Kegiatan </th>
                            <th> Deskripsi Kegiatan </th>
                            <th> Periode </th>
                            <th> Target Kegiatan </th>
                            <th> Kegiatan Terealisasi </th>
                            <th> Poin </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $rataRata = 0;
                        foreach ($kegiatan as $data) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data->NAMA_KEGIATAN ?></td>
                                <td><?= $data->DESKRIPSI_KEGIATAN ?></td>
                                <td><?= tgl_indo($data->PERIODE_BULAN) ?> - <?= $data->PERIODE_TAHUN ?></td>
                                <td><?= $data->TARGET_KUANTITAS ?></td>
                                <td><?= $data->TARGET_TEREALISASI ?></td>
                                <td><?= ($data->TARGET_TEREALISASI / $data->TARGET_KUANTITAS) * 100 ?></td>
                            </tr>
                        <?php $rataRata = $rataRata + (($data->TARGET_TEREALISASI / $data->TARGET_KUANTITAS) * 100);
                        } ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer" style="text-align: right;">
                <h3 class="page-title"> Rata-rata poin : <?= $rataRata ?> </h3>
            </div>
        </div>
    </div>
</div>
<?php
function tgl_indo($bulanDB)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    return $bulan[$bulanDB];
}
?>