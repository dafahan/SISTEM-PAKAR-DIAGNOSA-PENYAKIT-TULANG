<?= $this->extend('partials/sidebaradmin') ?>



<?= $this->section('content') ?>
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title"><b>Data Pasien</b></h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="<?= base_url('/home') ?>">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('/admin/penyakit') ?>">Manajemen Data</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('/admin/datapasien') ?>">Data Pasien</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title"><b>Detail Article <?= $id?></b></h4>
                                    <a class="btn btn-primary btn-round ml-auto" href="<?= in_groups("admin")? base_url('article/manage') :base_url('article/manage'); ?>">
                                        
                                        &nbsp;BACK
                                    </a>
                                </div>
                            </div>
                            <div class="card-body card-dashboard">
                            <div class="container mt-1">
                            <?php if (!empty($article)): ?>
                                    <h1 class="mb-1"><?= $article['headline'];?></h1>
                                        <p><?= $article['description']?></p>
                                        <?php
                                            $html = $article['hasPart'][0]['text'];
                                            $baseUrl = 'https://www.nhs.uk';
                                            $modifiedHtml = preg_replace('/href="([^"]+)"/', 'href="' . $baseUrl . '$1"', $html);
                                            echo $modifiedHtml;
                                        ?>
                                    
                                
                            <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 

<?= $this->endSection() ?>
