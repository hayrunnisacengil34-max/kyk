<?php
include("config.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $baglanti->prepare("UPDATE ogrenciler SET cikis_saat = NOW() WHERE id = ?");
    
    if (!$stmt) {
        die("Sorgu hatası: " . $baglanti->error);
    }

    $stmt->bind_param("i", $id);

    if (!$stmt->execute()) {
        die("Execute hatası: " . $stmt->error);
    }

    $stmt->close();
}

header("Location: index.php");
exit;
?>