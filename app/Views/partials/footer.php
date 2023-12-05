<!-- app/Views/footer.php -->
<style>
    .footer{
        height: 46vh;
        background-color: #0C293D;
    }

    .main-footer{
        
        height: 36vh;
        width: 100%;
        padding-top: 40px;
    }

    .kolom1{
        width: 70%;
        color: #ffffff;
        
        
    }

    .logo{
        width: 100%;
        float: left;
    }

    .kolom2{
        width: 20%;
        color: #ffffff;
    }

    .kolom3{
        width: 10%;
    }

    .sosmed{
        padding-top: 15px;
    }

    .sosmed-icon{
        width: 100%;
    }

    .sosmed-icon i{
        font-size: 20px;
        width: 5%;
        float: left;
    }

    a{
        color: rgba(255, 255, 255, 0.6);
        padding-top: 5px;
        line-height: 35px;
        font-size: 15px;
    }

    p{
        color: rgba(255, 255, 255, 0.6);
        padding-top: 5px;
        line-height: 12px;
        font-size: 15px;
    }

    .lisensi-footer{
        height: 20%;
    }
</style>

<section class="footer" style="border-top: 1px solid rgba(255, 255, 255, 0.3);">
    <div class="container">
        <div class="main-footer">
            <div class="navbar">
                <div class="kolom1">
                    <div class="navbar">
                        <img src="<?= base_url('img/logo.png') ?>" alt="" style="width:26px;">
                        <div style=" width:97%; height:20px;">
                            <p style="font-size:26px; color: aliceblue; font-family: Copperplate, Papyrus, fantasy;"><b>ilang</b></p>
                        </div>
                    </div>
                    <div class="sosmed">
                        <p style="color: #ffffff">Contact us</p>
                        <div class="sosmed-icon">
                            <i class="bi bi-facebook"></i>
                            <p style="width: 90%; line-height:18px;">Facebook</p>
                        </div>
                        <div class="sosmed-icon">
                            <i class="bi bi-whatsapp"></i>
                            <p style="width: 90%; line-height:18px;">Whatsapp</p>
                        </div>
                        <div class="sosmed-icon">
                            <i class="bi bi-instagram"></i>
                            <p style="width: 90%; line-height:18px;">Instagram</p>
                        </div>
                    </div>                    
                </div>
                <div class="kolom2" style="padding-top: 65px;">
                    <p style="color:white;">Fitur</p>
                    <div class="row-1">
                        <a href="#" style="text-decoration: none; color: rgba(255, 255, 255, 0.6)">Kontak</a><br>
                        <a href="/konsultasi" style="text-decoration: none; color: rgba(255, 255, 255, 0.6)">Diagnosa</a><br>
                        <a href="#" style="text-decoration: none; color: rgba(255, 255, 255, 0.6)"></a><br>
                    </div>
                </div>
                <div class="kolom3" style="">
                    <div style="height: 100px;">
                        <a href="/login" class="btn btn-primary" style="background: none; color: #18A0FB; border:1px solid #18A0FB;">Sign-in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
