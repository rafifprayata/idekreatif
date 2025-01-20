<?php
session_start();

$nama = $_SESSION["nama"];
$role = $_SESSION["role"];

$notification = $_SESSION['notification'] ?? null;
if ($notofication) {
    unset($_SESSION['notification']);
}