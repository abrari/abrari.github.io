<?php require 'lib.php' ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="Tooplate">

        <title>YKids Toys Rental</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/tooplate-moso-interior.css" rel="stylesheet">
        
    </head>
    
    <body>

        <nav class="navbar navbar-expand-lg bg-light fixed-top shadow-lg">
            <div class="container">
                <a class="navbar-brand" href="/">YKids Toys Rental</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_1">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_2">Tentang</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link click-scroll" href="#section_3">Katalog</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_footer">Kontak</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main>

            <section class="hero-section hero-slide d-flex justify-content-center align-items-center" id="section_1">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 col-12 text-center mx-auto">
                            <div class="hero-section-text">
                                <h1 class="hero-title mt-2 mb-4">Sewa Mainan dan Perlengkapan Bayi</h1>

                                <small class="section-small-title mb-4">
                                    Perlengkapan bayi mahal-mahal, padahal dipakainya cuma sebentar? Mending sewa aja di YKids Toys Rental!
                                    Hemat kantong, anak happy! Sekarang, bikin playground di rumah bisa banget tanpa perlu beli.
                                </small>

                                <a href="https://wa.me/6281290320159" class="btn cta-button">Sewa Sekarang &nbsp; <i class="bi bi-whatsapp"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="about-section section-padding" id="section_2">
                <div class="container">

                    <small class="section-small-title">Kenapa Harus Sewa di YKids?</small>
                    <div class="row g-4 mt-2">
                        <div class="col-md-4">
                            <div class="custom-block custom-block-1 featured-custom-block">
                                <h3>Hemat Biaya</h3>
                                <p>Tidak perlu mengeluarkan banyak uang untuk membeli mainan yang hanya dipakai sebentar.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="custom-block custom-block-2 featured-custom-block">
                                <h3>Pilihan Lengkap</h3>
                                <p>Kami menyediakan berbagai mainan seperti perosotan, ayunan, mandi bola, stroller, dan masih banyak lagi!</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="custom-block custom-block-3 featured-custom-block">
                                <h3>Bersih & Higienis</h3>
                                <p>Semua perlengkapan kami jamin kebersihannya sebelum disewakan.</p>
                            </div>
                        </div>
                    </div>


            

                </div>
            </section>            

            <?php $products = get_inventory_list(); ?>

            <section class="shop-section section-padding" id="section_3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <h2 class="mt-2 mb-4"><span class="tooplate-red">Katalog</span> Mainan</h2>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-3">
                        <?php foreach ($products as $product) : 
                            $detail_link = "product.php/" . $product->Kode . '-' . slugify($product->Nama);    
                        ?>
                        <div class="col">
                            <div class="shop-thumb">
                                <div class="shop-image-wrap">
                                    <a href="<?php echo $detail_link; ?>">
                                        <img src="images/product/thumbs/<?php echo $product->Foto; ?>" class="shop-image img-fluid" alt="Gambar <?php echo $product->Nama; ?>">
                                    </a>

                                    <div class="shop-icons-wrap">
                                        <p class="shop-pricing mb-0">
                                            <span class="badge shop-pricing-badge">
                                                <?php echo "Rp " . number_format($product->Sewa1Minggu, 0, ",", "."); ?>
                                                <br>
                                                <small>per minggu</small>
                                            </span>
                                        </p>
                                    </div>

                                    <div class="shop-btn-wrap">
                                        <a href="<?php echo $detail_link; ?>" class="shop-btn custom-btn btn d-flex align-items-center align-items-center text-center">PESAN</a>
                                    </div>
                                </div>

                                <div class="shop-body">
                                    <small class="text-muted"><?php echo $product->Merk; ?></small>
                                    <h4><?php echo $product->Nama; ?></h4>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>


            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#36363e" fill-opacity="1" d="M0,96L40,117.3C80,139,160,181,240,186.7C320,192,400,160,480,149.3C560,139,640,149,720,176C800,203,880,245,960,250.7C1040,256,1120,224,1200,229.3C1280,235,1360,277,1400,298.7L1440,320L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path></svg>            
        </main>

        <footer id="section_footer" class="site-footer section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-5 col-12 mb-3">
                        <h3><a href="/" class="custom-link mb-1">YKids Toys Rental</a></h3>

                        <p class="text-white">Menyewakan beragam mainan anak dan perlengkapan bayi</p>
                        
                        <p class="text-white">Web Design: YYY Family</p>
                    </div>

                    <div class="col-lg-3 col-md-3 col-12 ms-lg-auto mb-3">
                        <h3 class="text-white mb-3">Lokasi</h3>

                        <p class="text-white mt-2">
                            <i class="bi-geo-alt"></i>
                            Perumahan Graha Arradea Blok U11, Ciherang, Dramaga, Bogor
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-4 col-12 mb-3">
                        <h3 class="text-white mb-3">Kontak</h3>

                            <p class="text-white mb-1">
                                <i class="social-icon-whatsapp bi-whatsapp me-1"></i>

                                <a href="https://wa.me/6281290320159/" target="_blank" class="text-white">
                                    0812-9032-0159
                                </a>
                            </p>

                            <p class="text-white mb-0">
                                <i class="social-icon-instagram bi-instagram me-1"></i>

                                <a href="https://www.instagram.com/ykids_bogor" target="_blank" class="text-white">
                                    @ykids_bogor
                                </a>
                            </p>
                    </div>

                </div>
            </div>
        </footer>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>