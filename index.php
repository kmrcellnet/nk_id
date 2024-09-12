<?php
// Koneksi ke database
include 'db.php';

// Mengambil produk dari database
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Selamat Datang di Toko Online</h1>
        <nav>
            <a href="index.php">Beranda</a>
            <a href="cart.php">Keranjang</a>
        </nav>
    </header>

    <section class="products">
        <h2>Produk Tersedia</h2>
        <div class="product-list">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="product">
                    <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                    <h3><?php echo $row['name']; ?></h3>
                    <p>Harga: Rp <?php echo $row['price']; ?></p>
                    <a href="product.php?id=<?php echo $row['id']; ?>" class="btn">Lihat Produk</a>
                </div>
            <?php } ?>
        </div>
    </section>
</body>
</html>
