<?php 
    session_start();
    include('server.php');
    
    if(isset($_SESSION['username'])){
        header('location: home.php');
    }
    if(isset($_GET['text'])){

    $text=$_GET['text'];
    echo "<script type=\"text/javascript\">";
    echo "alert(\"$text\");";
    echo "</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super internet</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <nav>
        <a href="#" class="logo">Super Internet</a>
        <div class="container_0">
            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#register">
                สมัครสมาชิก
            </button>
            <div class="modal" id="register">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="center">
                            <h1>สมัครสมาชิก</h1>
                            <form action="register_db.php" method="post">
                                <div class="txt_field">
                                    <input type="text" name="username" required>
                                    <span></span>
                                    <label>ชื่อผู้ใช้</label>
                                </div>
                                <div class="txt_field">
                                    <input type="password" name="password" required>
                                    <span></span>
                                    <label>รหัสผ่าน</label>
                                </div>
                                <div class="txt_field">
                                    <input type="text" name="address" required>
                                    <span></span>
                                    <label>ที่อยู่</label>
                                </div>
                                <div class="txt_field">
                                    <input type="text" name="tel" required>
                                    <span></span>
                                    <label>เบอร์ติดต่อ</label>
                                </div>
                                <div class="txt_field">
                                    <input type="text" name="IDcardnumber" required>
                                    <span></span>
                                    <label>เลขบัตรประชาชน</label>
                                </div>
                                <input class="enter" type="submit" value="สมัครสมาชิก" name="reg_user">
                                <div class="signup_link" data-toggle="modal" data-target="#login" data-dismiss="modal">
                                    <p>เป็นสมาชิกแล้ว? <a href="#">เข้าสู่ระบบ</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container_1">
            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#login">
                เข้าสู่ระบบ
            </button>
            <div class="modal" id="login">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="center">
                            <h1>เข้าสู่ระบบ</h1>
                            <form action="login_db.php" method="post">
                                <div class="txt_field">
                                    <input type="text" name="username" id="user_admin" required>
                                    <span></span>
                                    <label>ชื่อผู้ใช้</label>
                                </div>
                                <div class="txt_field">
                                    <input type="password" name="password" id="ID_admin" required>
                                    <span></span>
                                    <label>รหัสผ่าน</label>
                                </div>
                                <input class="enter" type="submit" value="เข้าสู่ระบบ" name="login_user" id="submit" onclick="admin()">
                                <div class="signup_link" data-toggle="modal" data-target="#register"
                                    data-dismiss="modal">
                                    <p>ยังไม่เป็นสมาชิก? <a href="#">สมัครสมาชิก</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="content">
        <h2>รายละเอียดแพ็คเกจอินเทอร์เน็ต</h2>
        <div class="flexbox">
            <button type="button" class="item" data-toggle="modal" data-target="#promo_1">
                <p class="p_bold">เน็ตแรงๆ เหมาะกับเรียนออนไลน์</p>
                <p class="p_speed">ไม่จำกัด 20/10 Mbps</p>
                <p class="p_topspeed">เน็ตความเร็วสูงสุด</p>
                <p class="p_day">30 วัน</p>
                <p class="p_timer">ระยะเวลาการใช้งาน</p>
                <p class="p_price">99 บาท</p>
                <p class="register">สมัครเลย</p>
            </button>
            <button type="button" class="item" data-toggle="modal" data-target="#promo_1">
                <p class="p_bold">ใช้เรียนใช้เล่นโชเชี่ยลก็ไม่มีปัญหา</p>
                <p class="p_speed">ไม่จำกัด 50/10 Mbps</p>
                <p class="p_topspeed">เน็ตความเร็วสูงสุด</p>
                <p class="p_day">30 วัน</p>
                <p class="p_timer">ระยะเวลาการใช้งาน</p>
                <p class="p_price">199 บาท</p>
                <p class="register">สมัครเลย</p>
            </button>
            <button type="button" class="item" data-toggle="modal" data-target="#promo_1">
                <p class="p_bold it">เร็วแรงดูอะไรก็ไม่มีสะดุด</p>
                <p class="p_speed">ไม่จำกัด 100/10 Mbps</p>
                <p class="p_topspeed">เน็ตความเร็วสูงสุด</p>
                <p class="p_day">30 วัน</p>
                <p class="p_timer">ระยะเวลาการใช้งาน</p>
                <p class="p_price">399 บาท</p>
                <p class="register">สมัครเลย</p>
            </button>
            <button type="button" class="item" data-toggle="modal" data-target="#promo_1">
                <p class="p_bold it">เน็ต 499 เล่นแรงไม่มีสะดุด</p>
                <p class="p_speed">ไม่จำกัด 100/50 Mbps</p>
                <p class="p_topspeed">เน็ตความเร็วสูงสุด</p>
                <p class="p_day">30 วัน</p>
                <p class="p_timer">ระยะเวลาการใช้งาน</p>
                <p class="p_price">499 บาท</p>
                <p class="register">สมัครเลย</p>
            </button>
            <button type="button" class="item" data-toggle="modal" data-target="#promo_1">
                <p class="p_bold it">เร็วสุดในสามโลก</p>
                <p class="p_speed">ไม่จำกัด 200/100 Mbps</p>
                <p class="p_topspeed">เน็ตความเร็วสูงสุด</p>
                <p class="p_day">30 วัน</p>
                <p class="p_timer">ระยะเวลาการใช้งาน</p>
                <p class="p_price">899 บาท</p>
                <p class="register">สมัครเลย</p>
            </button>
            <div class="modal" id="promo_1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="center_1 modal-footer no-gutter justify-content-center">
                            <p class="pls_login">กรุณา Login เพื่อทำรายการ</p>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#login" data-dismiss="modal">Login</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="condition">
            <p class="p_condition">เงื่อนไข</p>
            <ul>
                <li>ผู้ใช้บริการต้องจ่ายเงินค่าติดตั้งอุปกรณ์ 300 บาท</li>
                <li>จ่ายเงินเมื่อถึงรอบเก็บค่าบริการ ไม่เช่นนั้นจะโดนตัดสัญญาณอินเทอร์เน็ต</li>
                <li>ณ ราคาจ่าย ยังไม่รวมภาษีมูลค่าเพิ่ม</li>
                <li>เมื่อยกเลิกการใช้งาน ผู้ใช้ต้องคืนอุปกรณ์</li>
                <li>ถ้าหากอุปกรณ์เสียหาย ผู้ใช้ต้องจ่ายค่าเสียหาย</li>
            </ul>
        </div>
    </div>
    <footer>
        <p>ติดต่อ Super Internet Call Center</p>
        <p>ค้นหาศูนย์บริการ</p>
        <h5>&copy;Super Internet.</h5>
    </footer>
</body>

</html>