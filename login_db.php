<?php
    session_start();
    include('server.php');

    if (isset($_POST['login_user'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT * From user WHERE username = '$username' AND password = '$password' ";

        $_SESSION['username'] = $username;
        if (mysqli_query($conn, $query)){
            $query = mysqli_query($conn, $query);
            $result = mysqli_fetch_assoc($query);
            $_SESSION['username'] = $result['username'];
            $_SESSION['password'] = $result['password'];
            $_SESSION['IDcardnumber'] = $result['IDcardnumber'];
            header('location: home.php');
        }else{
            echo 
            "<script>
                    alert('Wrong username/password combination');
                    window.location.href='index.php';
            </script>";
        }
    }
?>