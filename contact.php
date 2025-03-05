<?php
$servername = "localhost";
$username = "root"; // غيّره إذا كنت تستخدم سيرفر آخر
$password = ""; // ضع كلمة مرور قاعدة البيانات إذا لزم الأمر
$dbname = "first_aid";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// استلام البيانات من النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    // إدخال البيانات في قاعدة البيانات
    $sql = "INSERT INTO contacts (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Thank you! Your message has been received.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// إغلاق الاتصال
$conn->close();
?>