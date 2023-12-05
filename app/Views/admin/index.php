<?= $this->extend('partials/sidebaradmin') ?>


<?= $this->section('content') ?>

<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-dark-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                        <h5 class="text-white op-7 mb-2">Aplikasi Diagnosa Penyakit Tulang</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <a href="<?= base_url('/admin/datapenyakit') ?>" class="btn btn-white btn-border btn-round mr-2">Manage</a>
                        <a href="<?= base_url('/konsultasi') ?>" class="btn btn-secondary btn-round">Diagnosa</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="card-title">Overall statistics</div>
                            <div class="card-category">Daily information about statistics in the system</div>
                            <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-1"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Pengguna</h6>
                                </div>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-4"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Gejala</h6>
                                </div>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-2"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Penyakit</h6>
                                </div>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-3"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Diagnosa</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= view('partials/footeradmin') ?>

    <script src="<?= base_url('assets/js/plugin/chart-circle/circles.min.js') ?>"></script>
    <script>
        Circles.create({
            id:'circles-1',
            radius:45,
            value:<?= $statPasien ?>,
            maxValue:100,
            width:7,
            colors:['#f1f1f1', '#FF9E27'],
            duration:400,
            wrpClass:'circles-wrp',
            textClass:'circles-text',
            styleWrapper:true,
            styleText:true,
            text: <?= $statPasien ?>
        })

        Circles.create({
            id:'circles-4',
            radius:45,
            value:<?= $statGejala ?>,
            maxValue:100,
            width:7,
            colors:['#f1f1f1', 'blue'],
            duration:400,
            wrpClass:'circles-wrp',
            textClass:'circles-text',
            styleWrapper:true,
            styleText:true,
            text: <?= $statGejala ?>
        })

        Circles.create({
            id:'circles-2',
            radius:45,
            value:<?= $statPenyakit ?>,
            maxValue:100,
            width:7,
            text: <?= $statPenyakit ?>,
            colors:['#f1f1f1', '#2BB930'],
            duration:400,
            wrpClass:'circles-wrp',
            textClass:'circles-text',
            styleWrapper:true,
            styleText:true
        })

        Circles.create({
            id:'circles-3',
            radius:45,
            value:<?= $statDiagnosa ?>,
            maxValue:100,
            width:7,
            text: <?= $statDiagnosa ?>,
            colors:['#f1f1f1', '#F25961'],
            duration:400,
            wrpClass:'circles-wrp',
            textClass:'circles-text',
            styleWrapper:true,
            styleText:true
        })
    </script>
    
<?= $this->endSection() ?>
