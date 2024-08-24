<?php
// Veritabanı bağlantısı
include '../database.php';


// Formdan gelen verileri al
$name = $_POST['name'];
$position = $_POST['position'];
$description = $_POST['description'];
$facebook_url = $_POST['facebook_url'];
$instagram_url = $_POST['instagram_url'];
$twitter_url = $_POST['twitter_url'];
$linkedin_url = $_POST['linkedin_url'];
$pinterest_url = $_POST['pinterest_url'];
$image_url = '';

// Resim dosyasını yükle
if (isset($_FILES['image_url']) && $_FILES['image_url']['error'] == 0) {
    $target_dir = "uploads/";
    $image_url = $target_dir . basename($_FILES["image_url"]["name"]);

    // Dosyayı belirtilen dizine taşı
    if (!move_uploaded_file($_FILES["image_url"]["tmp_name"], $image_url)) {
        die("Dosya yükleme hatası.");
    }
}

// SQL sorgusu
$sql = "INSERT INTO team_members_kurumsal (
    name, 
    position, 
    description, 
    image_url, 
    facebook_url, 
    instagram_url, 
    twitter_url, 
    linkedin_url, 
    pinterest_url
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss", $name, $position, $description, $image_url, $facebook_url, $instagram_url, $twitter_url, $linkedin_url, $pinterest_url);

if ($stmt->execute()) {
    echo "Yeni ekip üyesi başarıyla eklendi.";
    header('Location: ../ekibimiz_ekle.php');
} else {
    echo "Ekleme hatası: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
