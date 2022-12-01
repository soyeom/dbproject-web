<?php
    $conn = mysqli_connect("localhost", "root", "", "test");

    $id = $_POST['id'];
    $passwd = $_POST['password'];
    $age = $_POST['age'];
    $mbti = $_POST['mbti'];
    $gender = $_POST['gender'];
    
    $sql = "insert into 회원 values";
    $sql = $sql."('{$id}','{$passwd}',$age,'{$mbti}','{$gender}')";

    $result = mysqli_query($conn, $sql);

    mysqli_close($conn);
?>