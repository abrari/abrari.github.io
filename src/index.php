<?php require 'lib.php' ?>
<?php require 'header.php' ?>

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

            <section class="shop-section" id="section_3">
                <?php $categories = ['Playground' => 'Mainan', 'Baby' => 'Perlengkapan Bayi']; ?>
                <?php foreach ($categories as $cat => $cat_label) :
                    $products = get_inventory_list($cat); 
                ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <h2 class="mt-4 mb-4"><span class="tooplate-red">Katalog</span> <?php echo $cat_label; ?></h2>
                            </div>
                        </div>
                        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3">
                            <?php foreach ($products as $product) : 
                                $detail_link = "product.php/" . $product->Kode . '-' . slugify($product->Nama) . '.html';    

                                $display_price = 0;
                                $display_label = '';

                                if (!empty($product->Sewa1Minggu) && $product->Sewa1Minggu > 0) {
                                    $display_price = $product->Sewa1Minggu;
                                    $display_label = 'per minggu';
                                } elseif (!empty($product->Sewa2Minggu) && $product->Sewa2Minggu > 0) {
                                    $display_price = $product->Sewa2Minggu;
                                    $display_label = 'per 2 minggu';
                                } elseif (!empty($product->Sewa4Minggu) && $product->Sewa4Minggu > 0) {
                                    $display_price = $product->Sewa4Minggu;
                                    $display_label = 'per 4 minggu';
                                }
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
                                                    <?php if ($display_price > 0): ?>
                                                        <?php echo format_rp($display_price); ?>
                                                        <br>
                                                        <small><?php echo htmlspecialchars($display_label); ?></small>
                                                    <?php else: ?>
                                                        <small>tidak tersedia</small>
                                                    <?php endif; ?>
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
                <?php endforeach; ?>
            </section>


        </main>

<?php require 'footer.php' ?>