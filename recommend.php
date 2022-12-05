<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Recommend</title>
        <link href="css/main.css" type="text/css" rel="stylesheet">
        <link href="css/recommend.css" type="text/css" rel="stylesheet">
        <?php
            $conn = mysqli_connect("localhost", "root", "", "test");
            

            $sql_Att = "select 여행지명, 도, 시, 실내외, 계절, 이미지 from 여행지;";
            $result_Att = mysqli_query($conn, $sql_Att);
            if (!$result_Att) {
                echo("<script>alert('error!')</script>");
                exit;
            }

            $sql_Tr = "select 출발시간, 도착시간, 출발장소, 도착장소, 교통수단 from 교통;";
            $result_Tr = mysqli_query($conn, $sql_Tr);
            if (!$result_Tr) {
                echo("<script>alert('error!')</script>");
                exit;
            }
        ?>
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

            function getTrain(num) {
                var train = document.getElementById('train_' + num);
                if (train.style.display == 'none') {
                    train.style.display = 'block';
                }
                else {
                    train.style.display = 'none';
                }
            }

            function getBus(num) {
                var bus = document.getElementById('bus_' + num);
                if (bus.style.display == 'none') {
                    bus.style.display = 'block';
                }
                else {
                    bus.style.display = 'none';
                }
            }

            function NotService() {
                alert('서비스 준비중입니다.');
            }

        </script>
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
                                    $sql_user = "select 아이디 from 회원 WHERE 아이디 = '$id';";

                                    $result_user = mysqli_query($conn, $sql_user);
                                    $user_id = mysqli_fetch_row($result_user);

                                    echo("$user_id[0]");
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
                    $num = 0;
                    while($row_Att = mysqli_fetch_row($result_Att))
                    {
                        echo("<tr class='Att'> <td> <div class='AttCrop'>
                        <img src='$row_Att[5]' class='AttImg'> </div> </td>");
                        echo("<td> <div class='AttName'> <a href='#;' onclick='getShow($num)'>");
                        echo("$row_Att[0]");
                        echo("</a> </div> <div class='AttInfo'><a>");
                        echo("지역 - $row_Att[1] $row_Att[2] <br>");
                        echo("$row_Att[3] | 추천 계절 - $row_Att[4]");
                        echo("</a> </div> </td> <tr> <td colspan='2'>
                        <div class='TrafficArea' id='Traffic_$num' style='display:none;'>
                        <div class='AttLine'></div>
                        <div class='select'><a>이동 수단</a></div>
                        <div class='selectButt'> <a href='#;' onclick='getTrain($num)'>기차</a> </div>
                        <div class='selectButt'> <a href='#;' onclick='getBus($num)'>버스</a> </div>
                        <div class='selectButt'> <a href='#;' onclick='NotService()'>비행기</a> </div>
                        <div class='selectButt'> <a href='#;' onclick='NotService()'>자동차</a> </div>
                        </div> </td> </tr> </tr>
                        <tr> <td colspan='2'> <div class='train' id='train_$num' style='display:none;'>
                        <a id='t_$num'>train</a>
                        </div> </tr> </td>
                        <tr> <td colspan='2'> <div class='bus' id='bus_$num' style='display:none;'>
                        <a id='b_$num'>bus</a>
                        </div> </tr> </td>
                        <tr> <td colspan='2'> <div class='AttLine'></div> </td> </tr>");
                        $num++;
                    }
                ?>
                
            </table>
        </div>
    </body>
</html>