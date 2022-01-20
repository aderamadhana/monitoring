<small><?= $this->session->flashdata('message') ?></small>
<div class="page-header">
    <h3 class="page-title"> <?= $title ?> </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Validasi Kegiatan</li>
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
                            <h4 class="card-title">Data Kegiatan</h4>
                        </div>
                    </div>
                </div><br>
                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th> No </th>
                            <th> Nama Kegiatan </th>
                            <th> Deskripsi Kegiatan </th>
                            <th> Periode </th>
                            <th> Target Waktu </th>
                            <th> Status Kegiatan </th>
                            <th> Aksi </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kegiatan as $data) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data->NAMA_KEGIATAN ?></td>
                                <td><?= $data->DESKRIPSI_KEGIATAN ?></td>
                                <td><?= tgl_indo($data->PERIODE_BULAN) ?> - <?= $data->PERIODE_TAHUN ?></td>
                                <td><?= $data->TARGET_WAKTU ?></td>
                                <td><?= $data->STATUS_KEGIATAN_BULANAN ?></td>
                                <td>
                                    <a href="<?= site_url('ValidasiKegiatan/detail/' . $data->ID_KEGIATAN_BULANAN); ?>" class="btn btn-xs btn-success" title="Detail Kegiatan"><i class="mdi mdi-eye"></i> </a>
                                </td>
                            </tr>
                        <?php } ?>
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>