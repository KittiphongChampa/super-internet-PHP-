<?php 
    session_start();
    include('server.php');
    if (!isset($_SESSION['username'])){
        header('location: index.php');
    }else{
        $username=$_SESSION['username'];
        $query = "SELECT * FROM user WHERE username = '$username' ";
        if (mysqli_query($conn, $query)){
            $query = mysqli_query($conn, $query);
            $result = mysqli_fetch_assoc($query);
            $package = "";
            if($result['package'] !== NULL && $result['package'] !== "NULL"){
                $package = $result['package'];
                $query = "SELECT * FROM package WHERE package = '$package' ";
                if (mysqli_query($conn, $query)){
                    $query = mysqli_query($conn, $query);
                    $result = mysqli_fetch_assoc($query);
                    $p_bold = $result['p_bold'];
                    $p_speed = $result['p_speed'];
                    $p_topspeed = $result['p_topspeed'];
                    $p_day = $result['p_day'];
                    $p_timer = $result['p_timer'];
                    $p_price = $result['p_price'];
                    $amount = $result['amount'];
                }
            }else{
                $p_bold = "คุณไม่มีแพ็คเกจ";
                $p_speed = "";
                $p_topspeed = "";
                $p_day = "";
                $p_timer = "";
                $p_price = "";
                $amount = "";
            }
        }
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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <a href="#" class="logo">Super Internet</a>
        <!-- <div class="logout">
        </div> -->
        <div class="logout">
            <?php if (isset($_SESSION['username'])) : ?>
                <p><a href="logout.php" style="color: red;">Logout</a></p>
            <?php endif ?>
        </div>
        <div class="show_name">
            <a href="#" data-toggle="modal" data-target="#profile">
            <?php if (isset($_SESSION['username'])) : ?>
                <p><strong><?php echo $_SESSION['username']; ?></strong></p>
            <?php endif ?>
            </a>
        </div>
    </nav>
    <div class="content">
        <h2>รายละเอียดแพ็คเกจอินเทอร์เน็ต</h2>
        <div class="flexbox">
            <button type="button" class="item" data-toggle="modal" data-target="#register1">
                <p class="p_bold">เน็ตแรงๆ เหมาะกับเรียนออนไลน์</p>
                <p class="p_speed">ไม่จำกัด 20/10 Mbps</p>
                <p class="p_topspeed">เน็ตความเร็วสูงสุด</p>
                <p class="p_day">30 วัน</p>
                <p class="p_timer">ระยะเวลาการใช้งาน</p>
                <p class="p_price">99 บาท</p>
                <p class="register">สมัครเลย</p>
            </button>
            <button type="button" class="item" data-toggle="modal" data-target="#register2">
                <p class="p_bold">ใช้เรียนใช้เล่นโชเชี่ยลก็ไม่มีปัญหา</p>
                <p class="p_speed">ไม่จำกัด 50/10 Mbps</p>
                <p class="p_topspeed">เน็ตความเร็วสูงสุด</p>
                <p class="p_day">30 วัน</p>
                <p class="p_timer">ระยะเวลาการใช้งาน</p>
                <p class="p_price">199 บาท</p>
                <p class="register">สมัครเลย</p>
            </button>
            <button type="button" class="item" data-toggle="modal" data-target="#register3">
                <p class="p_bold it">เร็วแรงดูอะไรก็ไม่มีสะดุด</p>
                <p class="p_speed">ไม่จำกัด 100/10 Mbps</p>
                <p class="p_topspeed">เน็ตความเร็วสูงสุด</p>
                <p class="p_day">30 วัน</p>
                <p class="p_timer">ระยะเวลาการใช้งาน</p>
                <p class="p_price">399 บาท</p>
                <p class="register">สมัครเลย</p>
            </button>
            <button type="button" class="item" data-toggle="modal" data-target="#register4">
                <p class="p_bold it">เน็ต 499 เล่นแรงไม่มีสะดุด</p>
                <p class="p_speed">ไม่จำกัด 100/50 Mbps</p>
                <p class="p_topspeed">เน็ตความเร็วสูงสุด</p>
                <p class="p_day">30 วัน</p>
                <p class="p_timer">ระยะเวลาการใช้งาน</p>
                <p class="p_price">499 บาท</p>
                <p class="register">สมัครเลย</p>
            </button>
            <button type="button" class="item" data-toggle="modal" data-target="#register5">
                <p class="p_bold it">เร็วสุดในสามโลก</p>
                <p class="p_speed">ไม่จำกัด 200/100 Mbps</p>
                <p class="p_topspeed">เน็ตความเร็วสูงสุด</p>
                <p class="p_day">30 วัน</p>
                <p class="p_timer">ระยะเวลาการใช้งาน</p>
                <p class="p_price">899 บาท</p>
                <p class="register">สมัครเลย</p>
            </button>
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
    <div class="modal" id="register1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="center1">
                    <h1>สมัครแพ็คเก็จ</h1>
                    <hr class="hr">
                    <form method="post" action="bils.php">
                        <input class="disabled" type="text" name="package" value="เน็ตแรงๆ เหมาะกับเรียนออนไลน์">
                        <div class="container-fluid">
                            <div class="row no-gutter justify-content-center">
                                <div class="promotion col-4">
                                    <p class="p_bold">เน็ตแรงๆ เหมาะกับเรียนออนไลน์</p>
                                    <p class="p_speed">ไม่จำกัด 20/10 Mbps</p>
                                    <p class="p_topspeed">เน็ตความเร็วสูงสุด</p>
                                    <p class="p_day">30 วัน</p>
                                    <p class="p_timer">ระยะเวลาการใช้งาน</p>
                                    <p class="p_price">99 บาท</p>
                                </div>
                            </div>
                        </div>
                        <input class="select" type="submit" value="เลือก" name="submit" />
                        <input type="hidden" value="package99" name="package" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="register2">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="center1">
                    <h1>สมัครแพ็คเก็จ</h1>
                    <hr>
                    <form method="post" action="bils.php">
                        <input class="disabled" type="text" name="package" value="ใช้เรียนใช้เล่นโชเชี่ยลก็ไม่มีปัญหา">
                        <div class="container-fluid">
                            <div class="row no-gutter justify-content-center">
                                <div class="promotion col-4">
                                    <p class="p_bold">ใช้เรียนใช้เล่นโชเชี่ยลก็ไม่มีปัญหา</p>
                                    <p class="p_speed">ไม่จำกัด 50/10 Mbps</p>
                                    <p class="p_topspeed">เน็ตความเร็วสูงสุด</p>
                                    <p class="p_day">30 วัน</p>
                                    <p class="p_timer">ระยะเวลาการใช้งาน</p>
                                    <p class="p_price">199 บาท</p>
                                </div>
                            </div>
                        </div>
                        <input class="select" type="submit" value="เลือก" name="submit" />
                        <input type="hidden" value="package199" name="package" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="register3">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="center1">
                    <h1>สมัครแพ็คเก็จ</h1>
                    <hr>
                    <form method="post" action="bils.php">
                        <input class="disabled" type="text" name="package" value="เร็วแรงดูอะไรก็ไม่มีสะดุด">
                        <div class="container-fluid">
                            <div class="row no-gutter justify-content-center">
                                <div class="promotion col-4">
                                    <p class="p_bold it">เร็วแรงดูอะไรก็ไม่มีสะดุด</p>
                                    <p class="p_speed">ไม่จำกัด 100/10 Mbps</p>
                                    <p class="p_topspeed">เน็ตความเร็วสูงสุด</p>
                                    <p class="p_day">30 วัน</p>
                                    <p class="p_timer">ระยะเวลาการใช้งาน</p>
                                    <p class="p_price">399 บาท</p>
                                </div>
                            </div>
                        </div>
                        <input class="select" type="submit" value="เลือก" name="submit" />
                        <input type="hidden" value="package399" name="package" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="register4">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="center1">
                    <h1>สมัครแพ็คเก็จ</h1>
                    <hr>
                    <form method="post" action="bils.php">
                        <input class="disabled" type="text" name="package" value="เน็ต 499 เล่นแรงไม่มีสะดุด">
                        <div class="container-fluid">
                            <div class="row no-gutter justify-content-center">
                                <div class="promotion col-4">
                                    <p class="p_bold it">เน็ต 499 เล่นแรงไม่มีสะดุด</p>
                                    <p class="p_speed">ไม่จำกัด 100/50 Mbps</p>
                                    <p class="p_topspeed">เน็ตความเร็วสูงสุด</p>
                                    <p class="p_day">30 วัน</p>
                                    <p class="p_timer">ระยะเวลาการใช้งาน</p>
                                    <p class="p_price">499 บาท</p>
                                </div>
                            </div>
                        </div>
                        <input class="select" type="submit" value="เลือก" name="submit" />
                        <input type="hidden" value="package499" name="package" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="register5">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="center1">
                    <h1>สมัครแพ็คเก็จ</h1>
                    <hr>
                    <form method="post" action="bils.php">
                        <input class="disabled" type="text" name="package" value="เร็วสุดในสามโลก">
                        <div class="container-fluid">
                            <div class="row no-gutter justify-content-center">
                                <div class="promotion col-4">
                                    <p class="p_bold it">เร็วสุดในสามโลก</p>
                                    <p class="p_speed">ไม่จำกัด 200/100 Mbps</p>
                                    <p class="p_topspeed">เน็ตความเร็วสูงสุด</p>
                                    <p class="p_day">30 วัน</p>
                                    <p class="p_timer">ระยะเวลาการใช้งาน</p>
                                    <p class="p_price">899 บาท</p>
                                </div>                   
                            </div>
                        </div>
                        <input class="select" type="submit" value="เลือก" name="submit" />
                        <input type="hidden" value="package899" name="package" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="profile">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="center2">
                    <h1>Profile</h1>
                    <hr>
                    <div class="container-fluid">
                        <div class="row no-gutter justify-content-center">
                            <div class="promotion col-4">
                                <p class="p_bold it"><?php echo $p_bold;?></p>
                                <p class="p_speed"><?php echo $p_speed;?></p>
                                <p class="p_topspeed"><?php echo $p_topspeed;?></p>
                                <p class="p_day"><?php echo $p_day;?></p>
                                <p class="p_timer"><?php echo $p_timer;?></p>
                                <p class="p_price"><?php echo $p_price;?></p>
                            </div>                   
                            <div class="data col-6" >
                                <?php 
                                    echo "<h3> <b>Username : </b>".$_SESSION['username']."</h3>";
                                    echo "<h3> <b>Password : </b>".$_SESSION['password']."</h3>";
                                ?>
                            </div>
                        </div>
                        <div class="row no-gutter justify-content-start">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>