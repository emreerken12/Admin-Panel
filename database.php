<?php

// Bağlantı bilgileri
$servername = "localhost";
$username = "root"; // Kendi kullanıcı adınızı buraya yazın
$password = ""; // Kendi şifrenizi buraya yazın
$dbname = "ucuzbiletsepet_db";

// Bağlantı oluşturma
$conn = new mysqli($servername, $username, $password, $dbname);
$conn -> set_charset("utf8");
// Bağlantı kontrolü
if ($conn->connect_error) {
    die("Bağlantı başarısız: " . $conn->connect_error);
} else {

}
$mysqli = new mysqli($servername, $username, $password, $dbname);
if ($mysqli->connect_error) {
    die('Bağlantı hatası: ' . $mysqli->connect_error);
}


?>