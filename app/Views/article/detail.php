<!-- app/Views/diagnosa/gejala.php -->

<?= $this->extend('layouts/main') ?>



<?= $this->section('content') ?>
<style>
p {
    color: black !important; 
}
</style>
<div class="d-flex justify-content-center align-items-center" style="margin-top:25vh;margin-bottom:5vh;">
<div class="card" >
                            <div class="card-header">
                                <div class="d-flex align-items-center m-3">
                                    <h4 class="card-title px-3"><b>Detail Article <?= $id?></b></h4>
                                    <a class="btn btn-primary btn-round ml-auto" href="<?= in_groups("admin")? base_url('article/manage') :base_url('article'); ?>">
                                        
                                        &nbsp;BACK
                                    </a>
                                </div>
                            </div>
                            <div class="card-body card-dashboard ">
                            <div class="container mt-1 p-3 m-3">
                            <?php if (!empty($article)): ?>
                                    <h1 class="mb-1"><?= $article['headline'];?></h1>
                                        <p ><?= $article['description']?></p>
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


<?= $this->endSection() ?>
