<?php
// Veritabanı bağlantısı
include '../database.php';

print_r($_POST);

$id = 1;
$heading_subheading = $_POST['heading_subheading'];
$about_text = $_POST['about_text'];
$image_url = '';

// Mevcut görsel URL'sini veritabanından al
$sql_get_image = "SELECT image_url FROM about_us_kurumsal WHERE id = ?";
$stmt_get_image = $conn->prepare($sql_get_image);
$stmt_get_image->bind_param("i", $id);
$stmt_get_image->execute();
$result = $stmt_get_image->get_result();
$row = $result->fetch_assoc();
$old_image_url = $row['image_url'];
$stmt_get_image->close();

// Görsel yüklendiyse
if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] == 0) {
    $target_dir = "uploads/";
    $image_url = $target_dir . basename($_FILES["image_url"]["name"]);

    // Dosyayı belirtilen dizine taşı
    if (!move_uploaded_file($_FILES["image_url"]["tmp_name"], $image_url)) {
        die("Dosya yükleme hatası.");
    }

    // Eski görseli kontrol et ve sil
    if (file_exists($old_image_url)) {
        unlink($old_image_url);
    }
} else {
    // Görsel yüklenmediyse, eski görsel URL'sini kullan
    $image_url = $old_image_url;
}

// SQL sorgusu
$sql = "UPDATE about_us_kurumsal SET 
    heading = ?, 
    about_text = ?, 
    image_url = ?
    WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssi", $heading_subheading, $about_text, $image_url, $id);

if ($stmt->execute()) {
    echo "Kayıt başarıyla güncellendi.";
    header('Location: ../hakkimizda.php');
    exit(); // Yönlendirme sonrası kodun çalışmasını durdur
} else {
    echo "Güncelleme hatası: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
