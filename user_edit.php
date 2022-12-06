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
        <script>
            function check_pw() {
                var id = document.getElementById("id").innerHTML;
                var url = "check_pw.php?id=" + id;
                window.open(url, "chkpw", 'width=500,height=800, scrollbars=no, resizable=no');
            }
            function change_pw() {
                document.getElementById("pw").disabled = false;
                document.getElementById("pw_button").value = "확정";
                document.getElementById("pw_button").style.color = "hotpink";
                document.getElementById("pw_button").setAttribute("onclick", "decide_pw()");
            }
            function decide_pw() {
                document.getElementById("submit").disabled = false;
                document.getElementById("pw2").value = document.getElementById("pw").value;
                document.getElementById("pw").disabled = true;
                document.getElementById("pw_button").disabled = true;
                document.getElementById("pw_button").value = "확정됨";
                document.getElementById("pw_button").style.color = "#ccc";
            }

            function change_age() {
                document.getElementById("age").disabled = false;
                document.getElementById("age_button").value = "확정";
                document.getElementById("age_button").style.color = "hotpink";
                document.getElementById("age_button").setAttribute("onclick", "decide_age()");
            }
            function decide_age() {
                document.getElementById("submit").disabled = false;
                document.getElementById("age2").value = document.getElementById("age").value;
                document.getElementById("age").disabled = true;
                document.getElementById("age_button").disabled = true;
                document.getElementById("age_button").value = "확정됨";
                document.getElementById("age_button").style.color = "#ccc";
            }

            function change_sex() {
                document.getElementById("sex").disabled = false;
                document.getElementById("sex_button").value = "확정";
                document.getElementById("sex_button").style.color = "hotpink";
                document.getElementById("sex_button").setAttribute("onclick", "decide_sex()");
            }
            function decide_sex() {
                document.getElementById("submit").disabled = false;
                document.getElementById("sex2").value = document.getElementById("sex").value;
                document.getElementById("sex").disabled = true;
                document.getElementById("sex_button").disabled = true;
                document.getElementById("sex_button").value = "확정됨";
                document.getElementById("sex_button").style.color = "#ccc";
            }

            function change_mbti() {
                document.getElementById("mbti").disabled = false;
                document.getElementById("mbti_button").value = "확정";
                document.getElementById("mbti_button").style.color = "hotpink";
                document.getElementById("mbti_button").setAttribute("onclick", "decide_mbti()");
            }
            function decide_mbti() {
                document.getElementById("submit").disabled = false;
                document.getElementById("mbti2").value = document.getElementById("mbti").value;
                document.getElementById("mbti").disabled = true;
                document.getElementById("mbti_button").disabled = true;
                document.getElementById("mbti_button").value = "확정됨";
                document.getElementById("mbti_button").style.color = "#ccc";
            }
        </script>
    </head>
    <body>
        <div class=mypage_edit>
            <form method="post" action="user_edit_ok.php">
                <table>
                    <tr>
                        <th>아이디</th>
                        <td><span id=id><?=$res['아이디']?></span></td>
                    </tr>
                    <tr>
                        <th>비밀번호</th>
                        <td>
                            <input type="password" name=pw id=pw disabled placeholder="필수 입력 사항입니다." value="<?=$res['비밀번호']?>">
                            <input type=button id=pw_button value="변경" onclick="check_pw();">
                        </td>
                        <input type="hidden" name=pw2 id=pw2 value="<?=$res['비밀번호']?>">
                    </tr>
                    <tr>
                        <th>나이</th>
                        <td>
                            <input type="text" name=age id=age disabled value="<?=$res['나이']?>">
                            <input type=button id=age_button value="변경" onclick="change_age();">
                        </td>
                        <input type="hidden" name=age2 id=age2 value="<?=$res['나이']?>">
                    </tr>
                    <tr>
                        <th>성별</th>
                        <td>
                            <input type="text" name=sex id=sex disabled value="<?=$res['성별']?>">
                            <input type=button id=sex_button value="변경" onclick="change_sex();">
                        </td>
                        <input type="hidden" name=sex2 id=sex2 value="<?=$res['성별']?>">
                    </tr>
                    <tr>
                        <th>MBTI</th>
                        <td>
                            <input type="text" name=mbti id=mbti disabled value="<?=$res['mbti']?>">
                            <input type=button id=mbti_button value="변경" onclick="change_mbti();">
                        </td>
                        <input type="hidden" name=mbti2 id=mbti2 value="<?=$res['mbti']?>">
                    </tr>
                </table>
                <input disabled id=submit type=submit value="완료">
            </form>
        </div>
    </body>
</html>