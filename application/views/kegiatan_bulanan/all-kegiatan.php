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
                    <h4 class="card-title">Data Kegiatan Bulanan</h4>
                </div>
        
                <div class="float-right">
                    <a href="<?= site_url('KegiatanBulanan/tambah_kegiatan'); ?>" class="btn btn-sm btn-primary"><i class="mdi mdi-account-plus"></i> Tambah</a>
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
                <?php $no = 1; foreach($kegiatan as $data){ ?>
                <tr>
                    <td><?= $no++?></td>
                    <td><?= $data->NAMA_KEGIATAN?></td>
                    <td><?= $data->DESKRIPSI_KEGIATAN?></td>
                    <td><?= $data->PERIODE_BULAN?> - <?= $data->PERIODE_TAHUN?></td>
                    <td><?= $data->TARGET_KUANTITAS?></td>
                    <td><?= $data->STATUS_KEGIATAN_BULANAN?></td>
                    <td> 
                        <a href="<?= site_url('KegiatanBulanan/edit_kegiatan/'.$data->ID_KEGIATAN_BULANAN ); ?>" class="btn btn-sm btn-success"><i class="mdi mdi-grease-pencil"></i> Edit</a>
                        <a href="<?= site_url('KegiatanBulanan/hapus_kegiatan/'.$data->ID_KEGIATAN_BULANAN ); ?>"  onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger"><i class="mdi mdi-delete"></i> Hapus</a>
                   </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>