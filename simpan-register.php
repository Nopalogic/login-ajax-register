<?php
    include('koneksi.php');

    $nama_lengkap = $_POST['nama_lengkap'];
    $username     = $_POST['username'];
    $password     = MD5($_POST['password']);

    $query = "insert into users (nama_lengkap, username, password) values ('$nama_lengkap','$username','$password')";

    if($connection->query($query)){
        echo "success";
    } else {
        echo "error";
    }
?>