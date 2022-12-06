<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MY PAGE</title>
        <?php
            session_start();

            if(!isset($_SESSION['id'])) {
                echo "<script>alert('비회원 입니다.');";
                echo "location.href = 'main.php';</sctipt>";
            }

            $conn = mysqli_connect('localhost', 'root', '', 'test');
            $login = $_SESSION['id'];
            $sql = "select * from 회원 where 아이디 = '$login';";

            $result = mysqli_query($conn, $sql);
            $res = mysqli_fetch_array($result);
        ?>
    </head>
    <body>
        <div class=mypage>
            <table>
                <tr>
                    <th>아이디</th>
                    <td><?=$res['아이디']?></td>
                </tr>
                <tr>
                    <th>나이</th>
                    <td><?=$res['나이']?></td>
                </tr>
                <tr>
                    <th>성별</th>
                    <td><?=$res['성별']?></td>
                </tr>
                <tr>
                    <th>MBTI</th>
                    <td><?=$res['mbti']?></td>
                </tr>
                <tr>
                    <td>
                        <button onclick="location.href='user_edit.php'">회원정보 수정</button>
                    </td>
                    <td>
                        <button onclick="location.href='user_delete.php'">회원 탈퇴</button>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>