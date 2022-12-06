<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "test");

    $id = $_SESSION['id'];
    $sql = "delete from 회원 where 아이디='$id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>location.replace('main.php');</script>";
        mysqli_close($conn);
    }
    session_destroy();
?>