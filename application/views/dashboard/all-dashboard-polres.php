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
    <div class="col-lg-12 grid-margin stretch-card">
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
                <h4 class="card-title">Statistik Kejadian</h4>
                <canvas id="doughnutChart" style="height: 343px; display: block; width: 686px;" class="chartjs-render-monitor" width="686" height="343"></canvas>
            </div>
        </div>
    </div>
</div>
<!-- container-scroller -->
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="<?= base_url() ?>assets/vendors/chart.js/Chart.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<!-- endinject -->
<!-- Custom js for this page -->
<script>
    var ctx = document.getElementById('doughnutChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [
                'Kriminal',
                'Non Kriminal',
            ],
            datasets: [{
                data: [<?php echo $kejadianKriminal; ?>, <?php echo $kejadianNonKriminal; ?>],
                backgroundColor: [
                    '#1cc88a',
                    '#e74a3b',
                ],
                hoverOffset: 4
            }]
        }
    });
</script>
<!-- End custom js for this page -->