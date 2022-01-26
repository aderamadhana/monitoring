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
        <div class="row">
            <div class="col-md-12">
                <div class="float-left">
                    <h4 class="card-title">Data Kejadian</h4>
                </div>
        
                <div class="float-right">
                    <a href="<?= site_url('DataKejadian/tambah_kejadian'); ?>" class="btn btn-sm btn-primary"><i class="mdi mdi-account-plus"></i> Tambah</a>
                </div>    
            </div>
        </div><br>
       
        <table class="table table-striped table-responsive" id="table">
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
                <th> Nama Saksi </th>
                <th> Alamat Saksi </th>
                <th> Runtutan Kejadian </th>
                <th> Kategori Kejadian </th>
                <th> Status Pelapor </th>
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
                    <td><?= $data->NAMA_SAKSI?></td>
                    <td><?= $data->ALAMAT_SAKSI?></td>
                    <td><?= $data->KETERANGAN_KEJADIAN?></td>
                    <td><?= $data->KATEGORI_KEJADIAN?></td>
                    <td><?= $data->STATUS_KEJADIAN?></td>
                    <td><?= $data->TANGGAL_VALIDASI?></td>
                    <?php 
                        if ($data->STATUS_KEJADIAN == 'Sedang Diproses') {
                    ?>
                    <td> 
                        <a href="<?= site_url('DataKejadian/edit_kejadian/'.$data->ID_KEJADIAN); ?>" class="btn btn-sm btn-warning"><i class="mdi mdi-grease-pencil"></i> Edit</a>
                        <a href="<?= site_url('DataKejadian/hapus_kejadian/'.$data->ID_KEJADIAN); ?>"  onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger"><i class="mdi mdi-delete"></i> Hapus</a>
                    </td>
                    <?php
                        } else {
                    ?>
                    <td> 
                        <a href="<?= site_url('DataKejadian/detail_kejadian/'.$data->ID_KEJADIAN); ?>" class="btn btn-sm btn-success" title="Detail Kejadian"><i class="mdi mdi-eye"></i> </a>
                    </td>
                    <?php
                        }
                    ?>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>