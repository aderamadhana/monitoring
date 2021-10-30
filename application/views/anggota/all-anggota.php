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
            <h4 class="card-title">Data Anggota</h4>
        </div>
        
        <div class="float-right">
            <a href="<?= site_url('Anggota/tambah_anggota'); ?>" class="btn btn-sm btn-primary"><i class="mdi mdi-account-plus"></i> Tambah</a>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th> No </th>
                <th> NIP </th>
                <th> Nama Anggota </th>
                <th> Jabatan </th>
                <th> Anggota dari </th>
                <th> Role </th>
                <th> Aksi </th>
            </tr>
            </thead>
            <tbody>
            <?php 
                $no = 1;
                foreach($anggota_polsek as $d_a_polsek){
                    if($d_a_polsek->ID_ROLE == 1){
                        $role = 'Admin';
                    }else if($d_a_polsek->ID_ROLE == 2){
                        $role = 'Anggota';
                    }else{
                        $role = 'Kepala';
                    }
            ?>
            <tr>
                <td> <?= $no++ ?> </td>
                <td> <?= $d_a_polsek->NIP ?> </td>
                <td> <?= $d_a_polsek->NAMA ?> </td>
                <td> <?= $d_a_polsek->JABATAN ?> </td>
                <td> <?= $d_a_polsek->NAMA_POLSEK ?> </td>
                <td> <?= $role ?> </td>
                <td> 
                <a href="<?= site_url('Anggota/edit_anggota/'.$d_a_polsek->NIP); ?>" class="btn btn-sm btn-success"><i class="mdi mdi-grease-pencil"></i> Edit</a>
                <a href="<?= site_url('Anggota/hapus_anggota/'.$d_a_polsek->NIP); ?>"  onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger"><i class="mdi mdi-delete"></i> Hapus</a>
                </td>
            </tr>
            <?php }?>
            <?php 
                foreach($anggota_polres as $d_a_polsek){
                    if($d_a_polsek->ID_ROLE == 1){
                        $role = 'Admin';
                    }else if($d_a_polsek->ID_ROLE == 2){
                        $role = 'Anggota';
                    }else{
                        $role = 'Kepala';
                    }
            ?>
            <tr>
                <td> <?= $no++ ?> </td>
                <td> <?= $d_a_polsek->NIP ?> </td>
                <td> <?= $d_a_polsek->NAMA ?> </td>
                <td> <?= $d_a_polsek->JABATAN ?> </td>
                <td> <?= $d_a_polsek->NAMA_POLRES ?> </td>
                <td> <?= $role ?> </td>
                <td> 
                <a href="<?= site_url('Anggota/edit_anggota/'.$d_a_polsek->NIP); ?>" class="btn btn-sm btn-success"><i class="mdi mdi-grease-pencil"></i> Edit</a>
                <a href="<?= site_url('Anggota/hapus_anggota/'.$d_a_polsek->NIP); ?>"  onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger"><i class="mdi mdi-delete"></i> Hapus</a>
                </td>
            </tr>
            <?php }?>
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>