<?php
    $conn = mysqli_connect("localhost", "root", "", "test");

    $id = $_POST['id'];
    $att = $_POST['att'];
    $review = $_POST['review'];

    if(!$review){
        $sql = "delete from 리뷰 where 리뷰아이디='$id' and 리뷰여행지명='$att'";

        $result = mysqli_query($conn, $sql);

        echo "<script>location.replace('review.php');</script>";
        mysqli_close($conn);
    }
    else{
        $sql = "insert into 리뷰 (리뷰아이디, 리뷰여행지명, 평점) values ";
        $sql = $sql."('{$id}','{$att}',$review)";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>location.replace('review.php');</script>";
            mysqli_close($conn);
        }
}
?>