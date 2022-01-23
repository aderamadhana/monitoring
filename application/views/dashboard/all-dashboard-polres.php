<div class="page-header">
    <h3 class="page-title"> <?= $title ?> </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Master</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>
</div>
<div class="row">
    <?php 
        $no = 1;
        foreach ($polsek as $data) {
    ?>
    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <h4 class="card-title">Statistik Kejadian - <?= $data->NAMA_POLSEK ?></h4>
                <canvas id="doughnutChart-<?= $no?>" style="height: 343px; display: block; width: 686px;" class="chartjs-render-monitor" width="686" height="343"></canvas>
            </div>
        </div>
    </div>
    <?php
            $no++;
        }
    ?>
</div>
<!-- container-scroller -->
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="<?= base_url() ?>assets/vendors/chart.js/Chart.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<!-- endinject -->
<!-- Custom js for this page -->
<?php 
    $no = 1;
    foreach ($polsek as $data) {
        $kejadianKriminal = $this->db->query("SELECT COUNT(kejadian.ID_KEJADIAN) AS 'JUMLAH' FROM kejadian WHERE kejadian.KATEGORI_KEJADIAN = 'Kriminal' AND kejadian.NIP_PENCATAT IN (SELECT anggota_polsek.NIP FROM anggota_polsek WHERE anggota_polsek.ID_POLSEK = '".$data->ID_POLSEK."')")->result();
        $kejadianNonKriminal = $this->db->query("SELECT COUNT(kejadian.ID_KEJADIAN) AS 'JUMLAH' FROM kejadian WHERE kejadian.KATEGORI_KEJADIAN = 'Non Kriminal' AND kejadian.NIP_PENCATAT IN (SELECT anggota_polsek.NIP FROM anggota_polsek WHERE anggota_polsek.ID_POLSEK = '".$data->ID_POLSEK."')")->result();
?>
<script>
    var ctx = document.getElementById('doughnutChart-<?= $no?>').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [
                'Kriminal',
                'Non Kriminal',
            ],
            datasets: [{
                data: [<?php echo $kejadianKriminal[0]->JUMLAH; ?>, <?php echo $kejadianNonKriminal[0]->JUMLAH; ?>],
                backgroundColor: [
                    '#1cc88a',
                    '#e74a3b',
                ],
                hoverOffset: 4
            }]
        }
    });
</script>
<?php
       $no++;
    }
?>
<!-- End custom js for this page -->