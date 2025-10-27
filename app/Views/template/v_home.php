<?= $this->extend('template/template-frontend') ?>
<?= $this->section('content') ?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-300" height="500px" src="<?= base_url('ppdb/ppdb1.jpg')?>" alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-200" height="450px" src="<?= base_url('ppdb/ppdb2.png')?>" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-200" height="450px" src="<?= base_url('ppdb/ppdb3.png')?>" alt="Third slide">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-custom-icon" aria-hidden="true">
                      <i class="fas fa-chevron-left"></i>
                    </span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-custom-icon" aria-hidden="true">
                      <i class="fas fa-chevron-right"></i>
                    </span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>


                
<?= $this->endSection() ?>