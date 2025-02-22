<?php
    require "koneksi.php";

    $querykategori = mysqli_query($con, "SELECT * FROM kategori");

    //get produk by keyword
    if(isset($_GET['keyword'])){
        $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE nama LIKE '%$_GET[keyword]%'");
    }
    //get produk by kategori
    else if(isset($_GET['kategori'])){
        $queryGetKategoriId = mysqli_query($con, "SELECT id FROM kategori WHERE nama='$_GET[kategori]'");
        $kategoriId = mysqli_fetch_array($queryGetKategoriId);

        $queryProduk = mysqli_query($con, "SELECT * FROM produk WHERE kategori_id='$kategoriId[id]'");
    }
    //get produk default
    else{
        $queryProduk = mysqli_query($con, "SELECT * FROM produk");
    }

    $countdata = mysqli_num_rows($queryProduk);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOKO | Produk</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-6.5.2-web/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require "navbar.php"; ?>

    <!-- banner produk-->
    <div class="container-fluid banner-produk d-flex align-items-center">
        <div class="container">
            <h1 class="merah text-center">Produk</h1>
        </div>
    </div>

     <!-- body-->
    <div class="warna3">
        <div class="container py-5">
            <div class="row warna3">
                <div class="col-lg-3 mb-5 army">
                    <h3 class="army">Kategori</h3>
                    <ul class="list-group">
                        <?php while($kategori = mysqli_fetch_array($querykategori)) { ?>
                            <a href="produk.php?kategori=<?php echo $kategori['nama']; ?>">
                                <li class="list-group-item"><?php echo $kategori['nama']; ?></li>
                            </a>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-lg-9">
                    <h3 class="text-center mb-3 army bold">Produk</h3>
                    <div class="row">
                        <?php
                            if($countdata<1){
                        ?>
                            <h4 class="text-center my-5 army">Produk yang anda cari tidak tersedia</h4>
                        <?php
                            }
                        ?>
                        <?php while($produk = mysqli_fetch_array($queryProduk)){ ?>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="image-box">
                                    <img src="image/<?php echo $produk['foto']; ?>" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body text-center">
                                    <h4 class="card-title army"><?php echo $produk['nama']; ?></h4>
                                    <p class="card-text text-truncate army"><?php echo $produk['detail']; ?></p>
                                    <p class="card-text text-harga">Rp. <?php echo $produk['harga']; ?></p>
                                    <a href="produk-detail.php?nama=<?php echo $produk['nama']; ?>" class="btn warna2 coksu">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
        <?php require "footer.php"; ?>
    
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome-free-6.5.2-web/js/all.min.js"></script>
</body>
</html>