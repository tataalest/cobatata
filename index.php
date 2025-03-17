<?php
// Inisialisasi variabel untuk menyimpan nilai input dan error
$nama = $alamat = $shipping = $crunchybite = $payment = "";
$namaErr = $alamatErr = $shippingErr = $paymentErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi Nama
    $nama = $_POST["nama"];
    if (empty($nama)) {
        $namaErr = "Nama wajib diisi";
    }

    // Validasi Alamat
    $alamat = $_POST["alamat"];
    if (empty($alamat)) {
        $alamatErr = "Alamat wajib diisi";
    }

    // Validasi Jasa Pengiriman
    $shipping = $_POST["shipping"];
    if (empty($shipping)) {
        $shippingErr = "Jasa Pengiriman wajib dipilih";
    }

    // Validasi Metode Pembayaran
    $payment = $_POST["payment"];
    if (empty($payment)) {
        $paymentErr = "Metode Pembayaran wajib dipilih";
    }

    // Menyimpan pilihan CrunchyBite tanpa validasi khusus
    $crunchybite = $_POST["crunchybite"];
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pembelian CrunchyBite</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Form Pembelian CrunchyBite</h2>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>">
                <span class="error"><?php echo $namaErr ? "* $namaErr" : ""; ?></span>
            </div>

            <div class="form-group">
                <label for="crunchybite">Pilih Menu:</label>
                <select id="crunchybite" name="crunchybite">
                    <option value="Kastangel" <?php echo ($crunchybite == "Kastangel") ? "selected" : ""; ?>>Kastangel</option>
                    <option value="Nastar" <?php echo ($crunchybite == "Nastar") ? "selected" : ""; ?>>Nastar</option>
                    <option value="Kue Cubir" <?php echo ($crunchybite == "Kue Cubir") ? "selected" : ""; ?>>Kue Cubir</option>
                </select>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat Pengiriman:</label>
                <textarea id="alamat" name="alamat"><?php echo $alamat; ?></textarea>
                <span class="error"><?php echo $alamatErr ? "* $alamatErr" : ""; ?></span>
            </div>

            <div class="form-group">
                <label for="shipping">Jasa Pengiriman:</label>
                <select id="shipping" name="shipping">
                    <option value="" <?php echo ($shipping == "") ? "selected" : ""; ?>>Pilih Jasa Pengiriman</option>
                    <option value="JNE" <?php echo ($shipping == "JNE") ? "selected" : ""; ?>>JNE</option>
                    <option value="TIKI" <?php echo ($shipping == "TIKI") ? "selected" : ""; ?>>TIKI</option>
                    <option value="POS" <?php echo ($shipping == "POS") ? "selected" : ""; ?>>POS Indonesia</option>
                    <option value="GoSend" <?php echo ($shipping == "GoSend") ? "selected" : ""; ?>>GoSend</option>
                    <option value="GrabExpress" <?php echo ($shipping == "GrabExpress") ? "selected" : ""; ?>>GrabExpress</option>
                </select>
                <span class="error"><?php echo $shippingErr ? "* $shippingErr" : ""; ?></span>
            </div>

            <div class="form-group">
                <label for="payment">Metode Pembayaran:</label>
                <select id="payment" name="payment">
                    <option value="" <?php echo ($payment == "") ? "selected" : ""; ?>>Pilih Metode Pembayaran</option>
                    <option value="Transfer Bank" <?php echo ($payment == "Transfer Bank") ? "selected" : ""; ?>>Transfer Bank</option>
                    <option value="E-Wallet" <?php echo ($payment == "E-Wallet") ? "selected" : ""; ?>>E-Wallet</option>
                    <option value="COD" <?php echo ($payment == "COD") ? "selected" : ""; ?>>COD</option>
                    <option value="Kartu Kredit" <?php echo ($payment == "Kartu Kredit") ? "selected" : ""; ?>>Kartu Kredit</option>
                </select>
                <span class="error"><?php echo $paymentErr ? "* $paymentErr" : ""; ?></span>
            </div>

            <div class="button-container">
                <button type="submit">Beli CrunchyBite</button>
            </div>
        </form>
    </div>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !$namaErr && !$alamatErr && !$shippingErr && !$paymentErr) { ?>
    <div class="container">
        <h3>Data Pembelian:</h3>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th width="20%">Nama</th>
                        <th width="20%">Pilih Menu</th>
                        <th width="30%">Alamat Pengiriman</th>
                        <th width="15%">Jasa Pengiriman</th>
                        <th width="15%">Metode Pembayaran</th>
                    </tr>
                 </tbody>
            </table>
        </div>
    </div>
    <?php } ?>
</body>

</html>