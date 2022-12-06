<?php
    session_start();
    $host = 'localhost';
    $user = 'root';
    $pw = '';
    $db_name = 'test';
    
    $conn = mysqli_connect($host, $user, $pw, $db_name); //db 연결
    
    //login.php에서 입력받은 id, password
    $id = $_POST['id'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM 회원 WHERE 아이디 = '$id' AND 비밀번호 = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    
    //결과가 존재하면 세션 생성
    if ($row != null) {
        $_SESSION['id'] = $row['아이디'];
        $_SESSION['password'] = $row['비밀번호'];
        echo "<script>location.replace('recommend.php');</script>";
        exit;
    }
    
    //결과가 존재하지 않으면 로그인 실패
    else {
        echo "<script>alert('Invalid username or password')</script>";
        echo "<script>location.replace('login.html');</script>";
        exit;
    }
?>