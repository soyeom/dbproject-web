<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'test');
    $id = $_GET['id'];
    $pw = $_POST['pw'];

    $sql = "SELECT * FROM 회원 WHERE 아이디 = '$id'";
    $res = mysqli_fetch_array(mysqli_query($conn, $sql));

    if($_SESSION['id'] != $id){
        echo "<script>alert('권한이 없습니다!');";
        echo "location.href='recommend.php';</script>";
    } else {
        if($res['비밀번호'] == $pw){
            echo "<script>alert('새 비밀번호를 입력해주세요!');";
            echo "opener.parent.change_pw(); window.close();</script>";
        } else {
            echo "<script>alert('비밀번호가 틀립니다.');";
            echo "opener.parent.location='mypage.php'; window.close();</script>";
        }
    }
?>