<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Recommend</title>
        <link href="css/main.css" type="text/css" rel="stylesheet">
        <link href="css/recommend.css" type="text/css" rel="stylesheet">
        <?php
            $conn = mysqli_connect("localhost", "root", "", "test");
            
            $sql = "select 여행지명, 도, 시, 실내외, 계절, 이미지 from 여행지;";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo("<script>alert('error!')</script>");
                exit;
            }
        ?>
    </head>
    <body>
        <table>
            <tr>
                <td>
                    <a href="main.php">
                        <img src="img/logo.png" id="logo" href="#">
                    </a>
                </td>
                <td>
                    <ul class="menu">
                        <li>
                            <a href="main.php" id="main">Main</a>
                        </li>
                        <li>
                            <a href="recommend.html" id="recommend">Recommend</a>
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
                                    $sql_user = "select 아이디 from 회원 WHERE 아이디 = '$id';";

                                    $result_user = mysqli_query($conn, $sql_user);
                                    $user_id = mysqli_fetch_row($result_user);

                                    echo("$user_id[0]");
                                }
                                else{
                                    
                                }
                            ?>
                            님의 여행지 추천 리스트
                        </a>
                    </div>
                </tr>
                <tr>
                    <div class="select">
                        <a>추천</a>
                    </div>
                    <button type="submit" class="selectButt">성별</button>
                    <button type="submit" class="selectButt">나이</button>
                    <button type="submit" class="selectButt">MBTI</button>
                </tr>
                <div class="line"></div>
                <?php
                    while($row = mysqli_fetch_row($result))
                    {
                        echo("<tr class='Att'> <td> <div class='AttCrop'> <img src='$row[5]' class='AttImg'> </div> </td>");
                        echo("<td> <div class='AttName'> <a href='#'>");
                        echo("$row[0]");
                        echo("</a> </div> <div class='AttInfo'><a>");
                        echo("지역 - $row[1] $row[2] <br>");
                        echo("$row[3] | 추천 계절 - $row[4]");
                        echo("</a> </div> </td> </tr>");
                    }
                ?>
            </table>
        </div>
    </body>
</html>