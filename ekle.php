<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ad    = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $tc    = $_POST['tc'];
    $oda_no = $_POST['oda_no'];

    $stmt = $baglanti->prepare("INSERT INTO ogrenciler (ad, soyad, tc, oda_no) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sss", $ad, $soyad, $tc, $oda);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Öğrenci Ekle</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Öğrenci Ekle</h2>

<form method="post" class="form-container">
    <input type="text" name="ad" placeholder="Ad" required><br>
    <input type="text" name="soyad" placeholder="Soyad" required><br>
    <input type="text" name="tc" placeholder="TC" required><br>
   <input type="text" name="oda_no" placeholder="Oda No" required>

    <button type="submit">➕ Ekle</button>
</form>

</body>
</html>
