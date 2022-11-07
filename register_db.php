<?php
    session_start();
    include('server.php');


    if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $tel = mysqli_real_escape_string($conn, $_POST['tel']);
        $IDcardnumber = mysqli_real_escape_string($conn, $_POST['IDcardnumber']);

        $user_check_query = "SELECT * FROM user WHERE username = '$username' OR IDcardnumber='$IDcardnumber' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        $text='';
        if(!isset($result['username'])){ 
            echo 'success';
            $sql = "INSERT INTO user (username, password, address, tel, IDcardnumber) VALUES ('$username', '$password', '$address', '$tel', '$IDcardnumber')";
            mysqli_query($conn, $sql);
            $text = "สมัครสมาชิกสำเร็จ";
            header('location: index.php');
        }else{
            if ($result['username']==$username){
                $text = "มีคนใช้ชื่อนี้ไปแล้ว";
            }
            if ($result['IDcardnumber']==$IDcardnumber){
                $text = "เลขบัตรประชาชนซ้ำ";
            }
        }
        header('location: index.php?text=' . $text);
    }
?>