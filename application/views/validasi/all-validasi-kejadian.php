<small><?= $this->session->flashdata('message')?></small>
<div class="page-header">
    <h3 class="page-title"> <?= $title ?> </h3>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Master</a></li>
        <li class="breadcrumb-item active" aria-current="page">Anggota</li>
    </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <div class="float-left">
            <h4 class="card-title">Data Kejadian</h4>
        </div>
        
        <div class="float-right">
            <a href="<?= site_url('DataKejadian/tambah_kejadian'); ?>" class="btn btn-sm btn-primary"><i class="mdi mdi-account-plus"></i> Tambah</a>
        </div>
        <table class="table table-striped table-responsive">
            <thead>
            <tr>
                <th> No </th>
                <th> Nama Pelapor </th>
                <th> Alamat Pelapor </th>
                <th> Peristiwa </th>
                <th> Nama Pelaku </th>
                <th> Alamat Pelaku </th>
                <th> Nama Korban </th>
                <th> Alamat Korban </th>
                <th> Keterangan Kejadian </th>
                <th> Kategori Kejadian </th>
                <th> Status Kejadian </th>
                <th> Tanggal Validasi </th>
                <th> Aksi </th>
            </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($kejadian as $data){ ?>
                <tr>
                    <td><?= $no++?></td>
                    <td><?= $data->NAMA_PELAPOR?></td>
                    <td><?= $data->ALAMAT_PELAPOR?></td>
                    <td><?= $data->PERISTIWA?></td>
                    <td><?= $data->NAMA_PELAKU?></td>
                    <td><?= $data->ALAMAT_PELAKU?></td>
                    <td><?= $data->NAMA_KORBAN?></td>
                    <td><?= $data->ALAMAT_KORBAN?></td>
                    <td><?= $data->KETERANGAN_KEJADIAN?></td>
                    <td><?= $data->KATEGORI_KEJADIAN?></td>
                    <td><?= $data->STATUS_KEJADIAN?></td>
                    <td><?= $data->TANGGAL_VALIDASI?></td>
                    <td> 
                        <a href="<?= site_url('ValidasiKejadian/detail/'.$data->ID_KEJADIAN); ?>" class="btn btn-sm btn-success"><i class="mdi mdi-eye"></i> Detail</a>
                     </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>