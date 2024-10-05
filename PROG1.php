
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belanja Diskon</title>
    <style>
        body {
            font-family: 'Helvetica Neue', sans-serif;
            background-color: #eef2f3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #ffffff;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            text-align: center;
        }
        h1 {
            color: #2c3e50;
            margin-bottom: 25px;
            font-size: 28px;
            font-weight: bold;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
            color: #34495e;
        }
        input[type="text"], select {
            width: calc(100% - 20px);
            padding: 15px;
            margin-bottom: 20px;
            border: 2px solid #bdc3c7;
            border-radius: 10px;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus, select:focus {
            border-color: #2980b9;
        }
        button {
            background-color: #e74c3c;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #c0392b;
        }
        h2 {
            color: #2c3e50;
            margin: 15px 0;
            font-size: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Kalkulator Diskon Belanja</h1>
    <form method="POST">
        <label for="member">Status Member</label>
        <select name="member" id="member">
            <option value="yes">Ya</option>
            <option value="no">Tidak</option>
        </select>

        <label for="total">Total Belanja</label>
        <input type="text" id="total" name="total" placeholder="Masukkan total belanja" required>

        <button type="submit" name="submit">Hitung Diskon</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $is_member = $_POST['member'] === 'yes';
        $total_belanja = floatval($_POST['total']);
        $diskon = 0;
        $potongan = 0;

        if ($is_member) {
            if ($total_belanja >= 1000000) {
                $diskon = 15;
                $potongan = 10; 
            } elseif ($total_belanja >= 500000) {
                $diskon = 10;
                $potongan = 10; 
            } else {
                $potongan = 10; 
            }
        } else {
            if ($total_belanja >= 1000000) {
                $diskon = 10;
            } elseif ($total_belanja >= 500000) {
                $diskon = 5;
            } else {
                $diskon = 0; 
            }
        }

        $jumlah_diskon = ($diskon / 100) * $total_belanja;
        $potongan_diskon = ($potongan / 100) * $total_belanja;
        $total_bayar = $total_belanja - $jumlah_diskon - $potongan_diskon;

        if ($diskon > 0) {
            echo "<h2>Diskon: $diskon%</h2>";
            echo "<h2>Jumlah Diskon: Rp " . number_format($jumlah_diskon, 0, ',', '.') . "</h2>";
        }
        
        if ($potongan > 0) {
            echo "<h2>Potongan: $potongan%</h2>";
            echo "<h2>Jumlah Potongan: Rp " . number_format($potongan_diskon, 0, ',', '.') . "</h2>";
        }

        echo "<h2>Total Bayar: Rp " . number_format($total_bayar, 0, ',', '.') . "</h2>";
    }
    ?>
</div>

</body>
</html>
