<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>MAIN</title>
        <link href="css/main.css" type="text/css" rel="stylesheet">
        <link href="css/recommend.css" type="text/css" rel="stylesheet">
    </head>
    <body>
        <table>
            <tr>
                <td>
                    <a href="recommend.php">
                        <img src="img/logo.png" id="logo" href="#">
                    </a>
                </td>
                <td>
                    <ul class="menu">
                        <li>
                            <a href="recommend.php" id="main">Main</a>
                        </li>
                        <li>
                            <a href="review.php" id="recommend">Review</a>
                        </li>
                    </ul>
                </td>
                <?php
                    include 'authorize.php';
                    
                    if($login){
                        echo("<td><div class='button'>");
                        echo("<div class='eff'></div>
                        <a href='logout.php'>Logout</a>");
                        echo("</div></td>");
                    }
                    else{
                        echo("<td><div class='button'>");
                        echo("<div class='eff'></div>
                        <a href='login.html'>Login</a>");
                        echo("</div></td>");
                    }
                ?>
                <td>
                    <div class="button">
                        <div class="eff"></div>
                        <a href="signup.html">Sign Up</a>
                    </div>
                </td>
            </tr>
        </table>
        <div class="box">
            <table class="AttShow">
                <tr>
                    <div class="usertext">
                        <a>
                            <?php
                                if($login){
                                    $id = $_SESSION['id'];

                                    $conn = mysqli_connect("localhost", "root", "", "test");

                                    $sql_Att = "select 여행지명, 도, 시, 실내외, 계절, 이미지 from 여행지;";
                                    $result_Att = mysqli_query($conn, $sql_Att);

                                    if (!$result_Att) {
                                        echo("<script>alert('error!')</script>");
                                        exit;
                                    }

                                    $sql_User = "select 아이디 from 회원 WHERE 아이디 = '$id';";

                                    $result_User = mysqli_query($conn, $sql_User);
                                    $user_id = mysqli_fetch_row($result_User);

                                    echo("$user_id[0]");
                                }
                                else{
                                    echo("<script>location.replace('login.html')</script>");
                                }
                            ?>
                            님의 여행지 리뷰
                        </a>
                            <script type="text/javascript">
                                function getShow(num) {
                                    var traffic = document.getElementById('Traffic_' + num);
                                    if (traffic.style.display == 'none') {
                                        traffic.style.display = 'block';
                                    }
                                    else {
                                        traffic.style.display = 'none';
                                    }
                                }
                            </script>
                    </div>
                </tr>
                <tr>
                    <div class="select">
                        <a>여행지</a>
                    </div>
                    <input type="text" class="select" style="margin-top: 18px;">
                    <button type="submit" class="selectButt">검색하기</button>
                </tr>
                <div class="line"></div>
                <?php
                    if($login){
                        while($row_Att = mysqli_fetch_row($result_Att))
                        {
                            $sql_Review = "select 평점 from 리뷰 where 리뷰아이디 = '$id' and 리뷰여행지명 = '$row_Att[0]';";
                            $result_Review = mysqli_query($conn, $sql_Review);
                            $row_Review = mysqli_fetch_row($result_Review);

                            echo("<tr class='Att'> <td> <div class='AttCrop'>
                            <img src='$row_Att[5]' class='AttImg'> </div> </td>");
                            echo("<td> <div class='AttName'> <a href='#;' onclick='getShow(0)'>");
                            echo("$row_Att[0]");
                            echo("</a> </div> <div class='AttInfo'><a>");
                            echo("지역 - $row_Att[1] $row_Att[2] <br>");
                            echo("$row_Att[3] | 추천 계절 - $row_Att[4]");
                            echo("<tr class='Att'>");
                            echo("</a> </div> </td> </tr> <td colspan='2'>
                            <div class='TrafficArea' id='Traffic_0' style='display:none;'>
                            <div class='AttLine'></div>");

                            if($row_Review){
                                echo("<div class='select'><a>평점: $row_Review[0]</a></div>");
                                echo("<form action='write_review.php' method='post'>
                                <select class='select' style='margin-top: 18px;' name='review'>
                                <option value='5'>5</option>
                                <option value='4'>4</option>
                                <option value='3'>3</option>
                                <option value='2'>2</option>
                                <option value='1'>1</option> </select>
                                <input type='hidden' name='id' value='$user_id[0]'>
                                <input type='hidden' name='att' value='$row_Att[0]'>
                                <button type='submit' class='selectButt'>수정</button></form>
                                <form action='delete_review.php' method='post'>
                                <input type='hidden' name='id' value='$user_id[0]'>
                                <input type='hidden' name='att' value='$row_Att[0]'>
                                <button type='submit' class='selectButt'>삭제</button></form>");
                                echo("<tr> <td colspan='2'> <div class='AttLine'></div> </td> </tr>");
                            }
                            else{
                                echo("<div class='select'><a>평점: </a></div>
                                <form action='write_review.php' method='post'>
                                <select class='select' style='margin-top: 18px;' name='review'>
                                <option value='5'>5</option>
                                <option value='4'>4</option>
                                <option value='3'>3</option>
                                <option value='2'>2</option>
                                <option value='1'>1</option> </select>
                                <input type='hidden' name='id' value='$user_id[0]'>
                                <input type='hidden' name='att' value='$row_Att[0]'>
                                <button type='submit' class='selectButt'>등록</button></form>
                                <tr> <td colspan='2'> <div class='AttLine'></div> </td> </tr>");
                            }
                        }
                    }
                    else{
                        echo("<script>location.replace('login.html')</script>");
                    }
                ?>
            </table>
        </div>
    </body>
</html>