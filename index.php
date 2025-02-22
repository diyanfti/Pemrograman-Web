<?php
    require "koneksi.php";
    $queryProduk1 = mysqli_query($con, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 3");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOKO | Home</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.5.2-web/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require "navbar.php"; ?>

    <!-- banner -->
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container putih text-center">
            <h1>Toko Rajoet</h1>
            <h3>Mau cari Produk apa?</h3>
            <div class="col-md-8 offset-md-2">
                <form method="get" action="produk.php">
                    <div class="input-group input-group-lg my-4">
                        <input type="text" class="form-control" placeholder="Nama Barang" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword">
                        <button type="submit" class="btn warna2 putih">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- highlighted kategori -->
    <div class="container-fluid py-5 warna3">
        <div class="container text-center army">
            <h3>Kategori Terlaris</h3>

            <div class="row mt-5">
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-dompet d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="kategori-decoration" href="produk.php?kategori=Fashion">Dompet</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-tas-biru d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="kategori-decoration" href="produk.php?kategori=Tas">Tas</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-taplak d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="kategori-decoration" href="produk.php?kategori=Taplak">Taplak</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- tentang kami -->
    <div class="container-fluid warna2 py-5">
        <div class="container text-center putih">
            <h3>Tentang kami</h3>
            <p class="fs-5 mt-3">E lakonin dhibik tadek se abhentoh masak kuatah mon ngak riah malolo ngucak en klompok tapeh tadek se nolongin rogi kakeh cong. PA BHIER COLOK EN MAREH KABBHIN.</p>
        </div>
    </div>

    <!-- Produk -->
    <div class="container-fluid warna3 py-5">
        <div class="container text-center army">
            <h3>Produk</h3>

            <div class="row mt-5">
                <?php while($data = mysqli_fetch_array($queryProduk1)){ ?>
                <div class="col-sm-6 col-md-4 mb-4">
                    <div class="card text-harga h-100">
                        <div class="image-box">
                            <img src="image/<?php echo $data['foto']; ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $data['nama']; ?></h4>
                            <p class="card-text text-truncate"><?php echo $data['detail']; ?></p>
                            <p class="card-text text-harga">Rp. <?php echo $data['harga']; ?></p>
                            <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>" class="btn warna2 putih">Gasss bangg</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <a class="btn btn-outline-dy mt-3" href="produk.php">See More</a>
        </div>
    </div>

    <!-- Footer -->
    <?php require "footer.php"; ?>

    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome-free-6.5.2-web/js/all.min.js"></script>
</body>
</html>