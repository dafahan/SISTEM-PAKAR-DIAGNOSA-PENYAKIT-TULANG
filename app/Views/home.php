
<?= $this->extend('layouts/main'); ?>



<?= $this->section('content'); ?>

<style>
    .banner{
        padding-top: 15vh;
        height: 100vh;
        width: 100%;
        background-color: #ffffff;
    }

    .piece h5{
        color:#88cbfa;
    }

    .piece h4{
        color: #2692ff;
        padding-top: 8px;
        padding-bottom: 10px;
    }


    .tentang-kami{
        height: 90vh;
        width: 100%;
        background-color: #f1f1f1;
        padding-top: 81px;
    }

    .statistik{
        height: 40vh;
        width: 100%;
        background-color: #003152;
        padding-top: 40px;
    }

    .btn-primary{
        background-color: #2692ff;
    }

    .statistik h2{
        color: #ffffff;
    }

    .statistik .container .navbar{
        margin: 60px 200px;
    }

    .gambar{
        height: 500px;
        width: 500px;
        background-image: url('../img/ilustrasi-tulang-gerak-manusia_ratio-16x9_waifu2x_photo_noise3_scale.png');
        background-size:cover;
    }

    .tentang{
        padding-top:3%;
        padding-right: 30px;
        padding-left: 30px;
    }

    .tentang h1{
        
        font-family: Garamond, serif;
        font-size: 65px;
        font-weight: bold;
        color:rgb(0, 127, 127);
        
        text-align: left;
    }

    h3{
        color: white;
    }

    h5{
        color: #88cbfa;
    }


</style>


<section class="banner">
    <div class="container">
        <div class="navbar" >
        <div class="piece">
            <div class="garis" style="border-bottom:4px solid #004f9d; width:70px; padding-top: 120px;"></div>
            <h4><b><?= $tagline ?></b></h4>
            <h1><b><?= $judul ?></b></h1>
            <h1><b><?= $judul1 ?></b></h1>
            <h5><?= $deskrip ?></h5>
            <h5><?= $deskrip1 ?></h5>
            <br><br>
            <a href="/konsultasi"><button class="btn btn-primary">Diagnosa Sekarang</button></a>
        </div>
        <div class="piece" style="padding-top: 80px;">
            <img src="img/7709378_3731957.jpg" alt="" style="height:50vh;">
        </div>
        </div>
    </div>
</section>

<section class="tentang-kami">
    <div class="container">
        <div class="navbar">
            <div class="about" style="padding-left:60px;">
                <div class="gambar">
                </div>
            </div>
            <div class="about" style="float: left; width:55%; height:550px; padding:10px;">
                <div class="tentang">
                    <h1>Healthy is for</h1>
                    <h1>Everybody</h1>
                    <h1>and Every body .</h1>
                    <br><br>
                    </div>
            </div>
            
        </div>
    </div>   
</section>

<section class="statistik">
    <div class="container">
        <div class="navbar">
            <div class="col3">
                <center>
                    <div class="ikon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#f9f9f9" class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                            <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                        </svg>  
                    </div><br>
                    <h3><?= $statPasien ?></h3>
                    <h5>Pengguna</h5>
                </center>
            </div>
            <div class="col3">
                <center>
                    <div class="ikon">
                        <img src="../img/icon_tulang.png" width="30px;" alt="">
                        <i class="fas fa-bone-break"></i>
                    </div><br>
                    <h3><?= $statPenyakit ?></h3>
                    <h5>Penyakit</h5>
                </center>
            </div>
            <div class="col3">
                <center>
                    <div class="ikon">
                        <svg style="height: 30px;" xmlns="http://www.w3.org/2000/svg" fill="#f9f9f9" viewBox="0 0 576 512">
                            <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path d="M142.4 21.9c5.6 16.8-3.5 34.9-20.2 40.5L96 71.1V192c0 53 43 96 96 96s96-43 96-96V71.1l-26.1-8.7c-16.8-5.6-25.8-23.7-20.2-40.5s23.7-25.8 40.5-20.2l26.1 8.7C334.4 19.1 352 43.5 352 71.1V192c0 77.2-54.6 141.6-127.3 156.7C231 404.6 278.4 448 336 448c61.9 0 112-50.1 112-112V265.3c-28.3-12.3-48-40.5-48-73.3c0-44.2 35.8-80 80-80s80 35.8 80 80c0 32.8-19.7 61-48 73.3V336c0 97.2-78.8 176-176 176c-92.9 0-168.9-71.9-175.5-163.1C87.2 334.2 32 269.6 32 192V71.1c0-27.5 17.6-52 43.8-60.7l26.1-8.7c16.8-5.6 34.9 3.5 40.5 20.2zM480 224c17.7 0 32-14.3 32-32s-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32z"/>
                        </svg>
                    </div><br>
                    <h3><?= $statDiagnosa ?></h3>
                    <h5>Diagnosa</h5>
                </center>
            </div>
        </div>
    </div>
</section>


<?= $this->endSection(); ?>
