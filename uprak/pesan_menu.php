<?php
include 'db.php';
$success = false;
$message = '';
$total = 0;
$details = "";

// Proses pemesanan
if (isset($_POST['submit']) && isset($_POST['qty'])) {
    $qtys = $_POST['qty'];
    $success_orders = 0;

    foreach ($qtys as $id => $qty) {
        $qty = (int)$qty;
        if ($qty <= 0) continue;

        // Ambil data menu yang dipilih
        $stmt = $conn->prepare("SELECT * FROM menu WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result_menu = $stmt->get_result();

        if ($result_menu->num_rows > 0) {
            $item = $result_menu->fetch_assoc();

            if ($item['stok'] >= $qty) {
                // Update stok di database
                $new_stock = $item['stok'] - $qty;
                $stmt_update = $conn->prepare("UPDATE menu SET stok = ? WHERE id = ?");
                $stmt_update->bind_param("ii", $new_stock, $id);
                $stmt_update->execute();

                $subtotal = $item['harga'] * $qty;
                $total += $subtotal;
                $details .= "- {$item['nama']} ({$qty}x): Rp" . number_format($subtotal) . "<br>";
                $success_orders++;
            } else {
                $message .= "Stok tidak cukup untuk {$item['nama']}! Sisa: {$item['stok']}<br>";
            }
        }
    }

    if ($success_orders > 0) {
        $success = true;
        $message = "Pesanan berhasil! Total: Rp" . number_format($total) . "<br><br>Detail:<br>" . $details;
    } elseif (empty($message)) {
        $message = "Tidak ada item yang dipilih.";
    }
}

// Ambil semua menu
$menu_items = [];
$result = $conn->query("SELECT * FROM menu");
while ($row = $result->fetch_assoc()) {
    $menu_items[] = $row;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesan Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="stylemenu.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">Kantin</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            </ul>
        </div>
    </div>
</nav>

<section id="home" class="py-5 text-center">
    <div class="container">
        <h2>Pesan Menu Kantin</h2>
    </div>
</section>

<section class="py-4">
    <div class="container">
        <div class="content-box">
            <?php if ($message): ?>
                <div class="alert alert-<?= $success ? 'success' : 'danger' ?> text-center">
                    <?= $message ?>
                    <?php if ($success): ?>
                        <img src="assets/qr.png" alt="QR" class="qr-img">
                        <p class="mt-2">Silakan tunjukkan QR ini ke kasir kantin</p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-4">
                    <h4 class="text-center mb-3">Pilih Menu</h4>
                    
        <?php foreach ($menu_items as $item): 
            $stock_class = '';
            if ($item['stok'] == 0) {
                $stock_class = 'out-of-stock';
            } elseif ($item['stok'] < 5) {
                $stock_class = 'low-stock';
            } else {
                $stock_class = 'in-stock';
            }
        ?>
        <div class="menu-item">
            <img src="<?= $item['gambar'] ?>" alt="<?= $item['nama'] ?>" class="menu-img">
            <div class="menu-info">
                <div class="d-flex justify-content-between align-items-center">
                    <h5><?= $item['nama'] ?></h5>
                    <span class="kantin-badge"><?= $item['kantin'] ?></span>
                </div>
                <p>Rp<?= number_format($item['harga']) ?></p>
                <span class="stock-info <?= $stock_class ?>">
                    <?= $item['stok'] == 0 ? 'Stok habis' : 'Stok: ' . $item['stok'] ?>
                </span>
            </div>
            <div>
                <input type="number" name="qty[<?= $item['id'] ?>]" class="form-control mt-2 bg-dark text-white" min="0" max="<?= $item['stok'] ?>" value="0" <?= $item['stok'] == 0 ? 'disabled' : '' ?>>
            </div>
        </div>
            <?php endforeach; ?>
                </div>
                <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-success btn-lg">Pesan Sekarang</button>
                </div>
            </form>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php if ($success): ?>
<script>
    setTimeout(function() {
        alert("Terimakasih Sudah Memesan. Silakan ambil makanan Anda di kantin yang dipilih.");
    }, 500);
</script>
<?php endif; ?>
</body>
</html>
