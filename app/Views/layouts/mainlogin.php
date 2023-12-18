<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url('img/logo.png') ?>" type="image/x-icon"/>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?= base_url('assets/css/fonts.min.css') ?>']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url('font-awesome/css/font-awesome.min.css') ?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<style>
    body {
        font-family: 'Nunito', sans-serif;
    }
</style>

<body>

<?= view('partials/navbar') ?>

<div>
    <?= $this->renderSection('content') ?>
</div>