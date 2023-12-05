<!-- app/Views/navbar.php -->

<div class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-bglg" style="background-color: #18A0FB;">
        <div class="container">
            <a class="navbar-brand" href="#" style="color: #18A0FB;">Polindra</a>
            <div class="ikons">
                <a href=""></a>
            </div>
        </div>
    </nav>

    <style>
        
    .active{
      border-bottom: 3px solid #000000;
    }

    .btn-primary{
      background-color: #2692ff;
      border:1px solid #ffffff;
      color: #ffffff;
    }

    svg{
      height: 25px;
      width: 25px;
    }

    .navbar-brand b{
      /* font-family: 'Trebuchet MS'; */
      font-size: 26px;
      color: rgb(0, 20, 37); 
      font-family: Copperplate, Papyrus, fantasy;
    }
    </style>

    <nav class="navbar navbar-expand-lg navbar-light" style="background: #ffffff;">
        <div class="container">
            <a class="navbar-brand" href="#" style=""><img src="<?= base_url('img/logo.png') ?>" alt="" width="22px;"><b style="">ilang</b></a>
            <div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href=""></a>
                        <a class="nav-link <?= $title === "Home" ? 'active' : '' ?>" href="/"><svg style="height: 20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>&nbsp;&nbsp;Home&nbsp;</a>
                        <a class="nav-link" href=""></a>
                        <a class="nav-link <?= $title === "Diagnosa" ? 'active' : '' ?>" href="/konsultasi"><svg style="height: 20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M142.4 21.9c5.6 16.8-3.5 34.9-20.2 40.5L96 71.1V192c0 53 43 96 96 96s96-43 96-96V71.1l-26.1-8.7c-16.8-5.6-25.8-23.7-20.2-40.5s23.7-25.8 40.5-20.2l26.1 8.7C334.4 19.1 352 43.5 352 71.1V192c0 77.2-54.6 141.6-127.3 156.7C231 404.6 278.4 448 336 448c61.9 0 112-50.1 112-112V265.3c-28.3-12.3-48-40.5-48-73.3c0-44.2 35.8-80 80-80s80 35.8 80 80c0 32.8-19.7 61-48 73.3V336c0 97.2-78.8 176-176 176c-92.9 0-168.9-71.9-175.5-163.1C87.2 334.2 32 269.6 32 192V71.1c0-27.5 17.6-52 43.8-60.7l26.1-8.7c16.8-5.6 34.9 3.5 40.5 20.2zM480 224c17.7 0 32-14.3 32-32s-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32z"/></svg>&nbsp;&nbsp;Diagnosa&nbsp;</a>
                        <a class="nav-link" href=""></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
