<?php
    session_start();
    $conn= mysqli_connect('localhost', 'root', '', 'test');
    $login = $_SESSION['id'];

    $sql_pre = "SELECT * FROM 회원 WHERE 아이디 = '$login'";
    $res_pre = mysqli_fetch_array(mysqli_query($conn, $sql_pre));

    $pw = $_POST['pw2'];
    $age = $_POST['age2'];
    $sex = $_POST['sex2'];
    $mbti = $_POST['mbti2'];

    $pw_pre = $res_pre['비밀번호'];
    $age_pre = $res_pre['나이'];
    $sex_pre = $res_pre['성별'];
    $mbti_pre = $res_pre['mbti'];

    $change_cnt = 0;

    if($pw==""){
        echo "<script>alert('비밀번호는 비울 수 없습니다!');";
        echo "window.location.href='mypage.php';</script>";
        exit;
    }

    if($pw!=$pw_pre){
        $change_cnt++;
    }
    if($age!=$age_pre){
        $change_cnt++;
    }
    if($sex!=$sex_pre){
        $change_cnt++;
    }
    if($mbti!=$mbti_pre){
        $change_cnt++;
    }

    if($change_cnt==0){
        echo "<script>alert('변경 사항이 없습니다!');";
        echo "location.href='mypage.php';</script>";
        exit;
    }

    $sql = "UPDATE 회원 SET 비밀번호 = '$pw', 나이 = '$age', 성별 = '$sex', mbti = '$mbti' WHERE 아이디 = '$login'";
    $res = mysqli_query($conn, $sql);

    if($res){
        echo "<script>alert('회원 정보 변경 완료!');";
        echo "location.href='mypage.php';</script>";
    }
?>