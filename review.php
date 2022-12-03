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
                    <a href="main.html">
                        <img src="img/logo.png" id="logo" href="#">
                    </a>
                </td>
                <td>
                    <ul class="menu">
                        <li>
                            <a href="main.html" id="main">Main</a>
                        </li>
                        <li>
                            <a href="recommend.php" id="recommend">Recommend</a>
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
                
                                    $sql = "select 리뷰번호, 리뷰여행지명, 평점, 작성일자 from 리뷰 where 리뷰아이디 = '$id';";
                                    $result = mysqli_query($conn, $sql);

                                    if (!$result) {
                                        echo("<script>alert('error!')</script>");
                                        exit;
                                    }

                                    $sql_user = "select 아이디 from 회원 WHERE 아이디 = '$id';";

                                    $result_user = mysqli_query($conn, $sql_user);
                                    $user_id = mysqli_fetch_row($result_user);

                                    echo("$user_id[0]");
                                }
                                else{
                                    
                                }
                            ?>
                            님의 여행지 리뷰
                        </a>
                    </div>
                </tr>
                <tr>
                    <div class="select">
                        <a>여행지</a>
                    </div>
                    <input type="text" class="select">
                    <button type="submit" class="selectButt">검색하기</button>
                </tr>
                <div class="line"></div>
                <?php
                    while($row = mysqli_fetch_row($result))
                    {
                        echo("<tr class='Att'>");
                        echo("<td> <div class='AttName'> <a>$row[0]</a></div>");
                        echo("<div class='AttInfo'><a>여행지명: $row[1] <br>");
                        echo("평점: $row[2] <br> 작성일자: $row[3]");
                        echo("</a> </div> </td> </tr>");
                    }
                ?>
            </table>
        </div>
    </body>
</html>