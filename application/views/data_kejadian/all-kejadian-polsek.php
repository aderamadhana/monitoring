<small><?= $this->session->flashdata('message')?></small>
<div class="page-header">
    <h3 class="page-title"> <?= $title ?> </h3>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Validasi Kejadian</li>
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
            </div>
        </div><br>
        <table class="table table-striped" id="table">
            <thead>
            <tr>
                <th> No </th>
                <th> Nama Pencatat </th>
                <th> Total Kejadian </th>
                <th> Aksi </th>
            </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($kejadian as $data){ ?>
                <tr>
                    <td><?= $no++?></td>
                    <td><?= $data->NAMA?></td>
                    <td><?= $data->TOTAL_KEJADIAN?></td>
                    <td> 
                        <a href="<?= site_url('DataKejadian/detail/'.$data->NIP_PENCATAT); ?>" class="btn btn-sm btn-success" title="Detail Kejadian"><i class="mdi mdi-eye"></i> </a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>