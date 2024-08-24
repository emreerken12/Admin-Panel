<?php
// Veritabanı bağlantısı
include ('../database.php');

// POST verilerini al
$selected_name = $_POST['team_member'];
$name = $_POST['name'];
$position = $_POST['position'];
$description = $_POST['description'];
$facebook_url = $_POST['facebook_url'];
$instagram_url = $_POST['instagram_url'];
$twitter_url = $_POST['twitter_url'];
$linkedin_url = $_POST['linkedin_url'];
$pinterest_url = $_POST['pinterest_url'];

// Eski resmin yolunu almak için sorgu
$sql = "SELECT image_url FROM team_members_kurumsal WHERE name = '$selected_name'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$old_image_path = $row['image_url'];

// Eğer resim yüklendiyse, dosya adını al
$image_url = "";

if(isset($_FILES['image_url']) && $_FILES['image_url']['error'] == 0) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image_url"]["name"]);

    if (move_uploaded_file($_FILES["image_url"]["tmp_name"], $target_file)) {
        $image_url = $target_file;

        // Eğer eski resim varsa ve yeni resim yüklendiyse, eski resmi sil
        if (file_exists($old_image_path)) {
            unlink($old_image_path);
        }
    }
}

// Güncelleme sorgusunu oluştur
$sql = "UPDATE team_members_kurumsal SET 
    name = '$name', 
    position = '$position', 
    description = '$description', 
    facebook_url = '$facebook_url', 
    instagram_url = '$instagram_url', 
    twitter_url = '$twitter_url', 
    linkedin_url = '$linkedin_url', 
    pinterest_url = '$pinterest_url'";

// Eğer resim yüklendiyse, SQL sorgusuna ekle
if ($image_url != "") {
    $sql .= ", image_url = '$image_url'";
}

$sql .= " WHERE name = '$selected_name'";

// Sorguyu çalıştır
if (mysqli_query($conn, $sql)) {
    echo "Kayıt başarıyla güncellendi!";
    header('Location: ../ekibimiz_duzenle.php');
} else {
    echo "Hata: " . mysqli_error($conn);
}

// Veritabanı bağlantısını kapat
mysqli_close($conn);
?>
