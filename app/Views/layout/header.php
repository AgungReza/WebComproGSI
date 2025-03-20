<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?></title>
    <!-- Favicon -->
    <link rel="icon" href="<?= base_url('img/logo.png') ?>" type="image/x-icon" />

    <link href="<?= base_url('/src/output.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/swiper/swiper-bundle.min.css') ?>">
    <script src="<?= base_url('assets/swiper/swiper-bundle.min.js') ?>"></script>
    <script src="<?= base_url('js/swiper-init.js') ?>"></script>
    <style>
    @media (max-width: 767px) {
    .gallery-swiper {
        display: none !important;
    }
    }
    
        @media (max-width: 767px) {
    .swiper-slide {
        display: flex;
        justify-content: center;
    }
    }
    
    </style>


</head>
    <body class="bg-black text-white">
        <?= view('layout/navbar') ?>
            <main>
                <?= $this->renderSection('content') ?>
            </main>
        <?= view('layout/footer') ?>
    </body>
</html>