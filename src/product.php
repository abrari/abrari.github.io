<?php require 'lib.php' ?>
<?php require 'header.php' ?>

<?php

$kode = get_product_kode_from_url($_SERVER["REQUEST_URI"]);
$product = get_inventory($kode);

// WhatsApp phone number and message
$whatsappNumber = '6281290320159'; // International format without leading '+' or '00'
$whatsappMessage = urlencode("Halo YKids, saya mau sewa " . $product->Nama);
$whatsappLink = "https://wa.me/{$whatsappNumber}?text={$whatsappMessage}";

?>

        <main class="container">

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

                                <a href="<?php echo htmlspecialchars($whatsappLink); ?>" class="btn cta-button">Sewa Sekarang &nbsp; <i class="bi bi-whatsapp"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <div class="row gx-5">
                <!-- Left Column: Product Photo -->
                <div class="col-md-6 mb-4 mb-md-0">
                    <div class="card shadow-sm rounded-4 border-0 overflow-hidden">
                        <img src="images/product/<?php echo $product->Foto; ?>"
                            class="img-fluid rounded-4 object-fit-cover"
                            alt="<?php echo htmlspecialchars($product->Nama); ?>"
                            onerror="this.onerror=null;this.src='https://placehold.co/600x400/CCCCCC/333333?text=Image+Not+Found';"
                            style="width: 100%;">
                    </div>
                </div>

                <!-- Right Column: Product Details -->
                <div class="col-md-6">
                    <h1 class="hero-title mb-3">
                        <?php echo htmlspecialchars($product->Nama); ?>
                    </h1>
                    <p class="lead text-muted mb-4">
                        <span class="fw-semibold">Merk:</span> <?php echo htmlspecialchars($product->Merk); ?>
                    </p>

                    <?php if (!empty($product->Deskripsi)): ?>
                        <div class="mb-4">
                            <h3 class="h5 fw-bold mb-2">Deskripsi</h3>
                            <p class="text-secondary"><?php echo htmlspecialchars($product->Deskripsi); ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($product->Spek)): ?>
                        <div class="mb-4">
                            <h3 class="h5 fw-bold mb-2">Spesifikasi</h3>
                            <p class="text-secondary"><?php echo htmlspecialchars($product->Spek); ?></p>
                        </div>
                    <?php endif; ?>

                    <div class="mb-4">
                        <h3 class="h5 fw-bold mb-2">Detail Anak</h3>
                        <?php if (!empty($product->UsiaAnak)): ?>
                            <p class="mb-1 text-secondary">
                                <i class="bi bi-person-fill icon-space"></i> Usia Anak: <span class="fw-semibold"><?php echo htmlspecialchars($product->UsiaAnak); ?></span>
                            </p>
                        <?php endif; ?>
                        <?php if (!empty($product->BobotAnak)): ?>
                            <p class="mb-0 text-secondary">
                                <i class="bi bi-arrow-down-up icon-space"></i> Bobot Anak: <span class="fw-semibold"><?php echo htmlspecialchars($product->BobotAnak); ?></span>
                            </p>
                        <?php endif; ?>
                        <?php if (empty($product->UsiaAnak) && empty($product->BobotAnak)): ?>
                            <p class="text-secondary">Tidak ada detail usia atau bobot yang tersedia.</p>
                        <?php endif; ?>
                    </div>

                    <div class="mb-5">
                        <h3 class="h5 fw-bold mb-3">Harga Sewa</h3>
                        <ul class="list-group list-group-flush border rounded-3 overflow-hidden shadow-sm">
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                <span class="fw-bold text-dark">1 Minggu</span>
                                <span class="badge bg-success fs-6 py-2 px-3 rounded-pill">
                                    Rp <?php echo number_format($product->Sewa1Minggu, 0, ',', '.'); ?>
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                <span class="fw-bold text-dark">2 Minggu</span>
                                <span class="badge bg-info fs-6 py-2 px-3 rounded-pill">
                                    Rp <?php echo number_format($product->Sewa2Minggu, 0, ',', '.'); ?>
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                                <span class="fw-bold text-dark">4 Minggu</span>
                                <span class="badge bg-warning fs-6 py-2 px-3 rounded-pill">
                                    Rp <?php echo number_format($product->Sewa4Minggu, 0, ',', '.'); ?>
                                </span>
                            </li>
                        </ul>
                    </div>

                    <div class="d-grid gap-2">
                        <a href="<?php echo htmlspecialchars($whatsappLink); ?>"
                        class="btn btn-success btn-lg rounded-pill shadow-lg mb-2"
                        target="_blank" rel="noopener noreferrer">
                            <i class="bi bi-whatsapp me-2"></i> Order via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </main>

<?php require 'footer.php' ?>