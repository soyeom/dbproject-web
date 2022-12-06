<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MY PAGE</title>
        <link rel="stylesheet" href="css/signup.css">
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
        <div id="wrap">
            <div id="header" class="DonutJoinform">
                <h1 id="top_logo">
                    <span class="blind">
                        <div class="h_text">Profile</div>
                    </span>
                </h1>
            </div>
            <form method="post" id="user_form" action="edit_user.php">
            <div id="container">
                <div id="content">
                    <div class="join_content">
                        <div class="row_group">

                            <div class="join_row">
                                <h3 class="join_title">
                                    <label for="id">아이디</label>
                                </h3>
                                <span><?=$res['아이디']?></span>
                            </div>

                            <div class="join_row">
                                <h3 class="join_title">
                                    <label for="password">비밀번호</label>
                                </h3>
                                <span><a href="#">변경하기</a></span>
                                
                                <h3 class="join_title">
                                    <label for="age">나이</label>
                                </h3>
                                <span class="id_box int_pass_check" id="pswd2Img">
                                    <input type="text" name=age id=age placeholder="<?=$res['나이']?>">
                                </span>
                            </div>

                            <div class="join_row">
                                <h3 class="join_title">
                                    <label for="mbti">mbti</label>
                                </h3>
                                <span class="id_box gender_code">
                                    <select id="mbti" name="mbti" class="sel" aria-label="mbti">
                                        <option value="Intj">Intj</option>
                                        <option value="Entj">Entj</option>
                                        <option value="Enfj">Enfj</option>
                                        <option value="Infj">Infj</option>
                                        <option value="Istj">Istj</option>
                                        <option value="Estj">Estj</option>
                                        <option value="Entp">Entp</option>
                                        <option value="Intp">Intp</option>
                                        <option value="Enfp">Enfp</option>
                                        <option value="Infp">Infp</option>
                                        <option value="Estp">Estp</option>
                                        <option value="Istp">Istp</option>
                                        <option value="Esfp">Esfp</option>
                                        <option value="Isfp">Isfp</option>
                                        <option value="Isfj">Isfj</option>
                                        <option value="Esfj">Esfj</option>
                                    </select>
                                </span>
                            </div>
                            
                            <div class="join_row">
                                <h3 class="join_title">
                                    <label for="gender">성별</label>
                                </h3>
                                <div class="id_box gender_code">
                                    <select id="gender" name="gender" class="sel" aria-label="성별">
                                        <option value="M">남자</option>
                                        <option value="F">여자</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="btn_area">
                    <button type="submit" id="submit" class="btn_type btn_primary">
                        <span>EDIT</span>
                    </button>
                    <a href="delete_user.php" style="margin-top: 10px; display: flex; justify-content: center; align-items: center;">회원 탈퇴</a>
                </div>
            </div>
            </form>
        </div>
        <br></br>

        <div id="footer">
            <address>
                <em class="copy">컴퓨터융합소프트웨어학과</em>
                <em class="u_cri">박소연, 조정인</em>
            </address>
        </div>
    </body>
</html>