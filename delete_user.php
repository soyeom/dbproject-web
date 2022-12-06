<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "test");

    $id = $_SESSION['id'];
    $sql = "delete from 회원 where 아이디='$id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script> alert('회원 탈퇴 완료');
        location.replace('main.php');</script>";
        mysqli_close($conn);
    }
    session_destroy();
?>