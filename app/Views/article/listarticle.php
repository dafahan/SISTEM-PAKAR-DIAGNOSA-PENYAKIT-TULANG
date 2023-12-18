<!-- app/Views/diagnosa/gejala.php -->

<?= $this->extend('layouts/main') ?>



<?= $this->section('content') ?>
<div class="d-flex justify-content-center align-items-center" style="margin-top:25vh;">

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Articles</h4>
        </div>
        <div class="card-content">
          <div class="card-body card-dashboard ">
          <div class="container mt-1 ">
                        <?php if (!empty($article)):
                            $id=(($currentPage-1)*10)+1;
                                foreach($article as $a):
                                    ?>
                                    <div class="card my-3" style="border:1px solid;">
                                        <div class="card-body">
                                            <h5 class="card-title"><h1 class="mb-1"><?= $a['headline'];?></h1></h5>
                                            <p class="card-text"><?= $a['description']?></p>
                                            <a href="<?=base_url('article/details/'.$id++);?>" class="btn">Read More <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg></a>
                                        </div>
                                    </div>
                                <?php
                                endforeach;
                            endif; ?>

                            <!-- Pagination Links -->
                            <div class="d-flex justify-content-center mt-3">
                                  <nav aria-label="Page navigation">
                                     
                                              <?php if($currentPage > 1): ?>
                                                <a href="http://localhost:8080/article?page=<?= $currentPage-1 ?>"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="10" viewBox="0 0 320 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z"/></svg>></a>
                                                <?php endif; ?>
                                                <a class="mx-2"  href="http://localhost:8080/article?page=<?= $currentPage ?>"><strong style="color:black;font-size:20px;"><?= $currentPage; ?></strong></a>
                                              <?php if($currentPage < $maxPages): ?>
                                              <a  href="http://localhost:8080/article?page=<?= $currentPage+1 ?>"><svg xmlns="http://www.w3.org/2000/svg" height="16" width="10" viewBox="0 0 320 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg></a>
                                              <?php endif; ?>
                                           
                                    </nav>
                            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
                                              </div>


<?= $this->endSection() ?>
