<?php
session_start();
require_once("../config.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $coon->qurey($sql);

    if ($result->num_rows> 0){
        $row = $result->fetch_assoc();

        if (password_verify($password, $row["password"])) {
            $_SESSION["username"] = $username;
            $_SESSION["name"] = $row["name"];
            $_SESSION["role"] = $row["role"];
            $_SESSION["user_id"] = $row["user_id"];

            $_SESSION['notification'] = [
                'type' => 'primary',
                'massage' => 'selamat datang kembali'
            ];
            header('Location: ../dashboard.php');
            axit();
        }else {
            $_SESSION['notification'] = [
                'type' => 'danger',
                'massage' => 'username atau password salah'
            ];
        }
    } else {
        $_SESSION['notification'] = [
            'type' =>'danger',
            'massage' => 'username atau password salah',

        ];
    }
    header('location: ../dashboard.php');
    exit();
}
$coon->close();
?>