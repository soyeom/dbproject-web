<?php
    $conn = mysqli_connect("localhost", "root", "", "test");

    $id = $_POST['id'];
    $att = $_POST['att'];
    $review = $_POST['review'];

    #기존 리뷰가 있는지 검사
    $sql = "select 평점 from 리뷰 where 리뷰아이디 = '$id' and 리뷰여행지명 = '$att'";
    $result_Review = mysqli_query($conn, $sql);
    $review_row = mysqli_fetch_row($result_Review);

    #기존 리뷰가 있는 경우 리뷰 수정
    if($review_row){
        $sql = "update 리뷰 set 평점 = $review where 리뷰아이디='$id' and 리뷰여행지명='$att'";
        $result = mysqli_query($conn, $sql);

        echo "<script>location.replace('review.php');</script>";
        mysqli_close($conn);
    }
    else{ #없는 경우 리뷰 생성
        $sql = "insert into 리뷰 (리뷰아이디, 리뷰여행지명, 평점) values ";
        $sql = $sql."('{$id}','{$att}',$review)";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>location.replace('review.php');</script>";
            mysqli_close($conn);
        }
}
?>