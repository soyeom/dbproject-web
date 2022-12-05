<?php
    $conn = mysqli_connect("localhost", "root", "", "test");

    $review = $_POST['review'];

    $sql = "insert into 리뷰 values";
    $sql = $sql."('{$id}','{$passwd}',$age,'{$mbti}','{$gender}')";

    $result = mysqli_query($conn, $sql);

    mysqli_close($conn);
?>