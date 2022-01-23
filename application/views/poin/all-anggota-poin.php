<small><?= $this->session->flashdata('message')?></small>
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
        <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="float-left">
                    <h4 class="card-title">Data Anggota</h4>
                </div>   
            </div>
        </div><br>
       
        <table class="table table-striped" id="table">
            <thead>
            <tr>
                <th> No </th>
                <th> NIP </th>
                <th> Nama User </th>
                <th> Jabatan </th>
                <th> Aksi </th>
            </tr>
            </thead>
            <tbody>
            <?php 
                $no = 1;
                foreach($user as $data){
            ?>
            <tr>
                <td> <?= $no++ ?> </td>
                <td> <?= $data->NIP ?> </td>
                <td> <?= $data->NAMA ?> </td>
                <td> <?= $data->JABATAN ?> </td>
                <td> 
                <a href="<?= site_url('Poin/detailPoinAnggota/'.$data->NIP); ?>" class="btn btn-sm btn-warning"><i class="mdi mdi mdi-eye"></i> Lihat</a>
                </td>
            </tr>
            <?php }?>
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>