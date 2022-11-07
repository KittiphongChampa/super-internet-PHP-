<?php
session_start();
include('server.php');

$amount = 0;
!isset($_POST['amount']) ? null : $amount=$_POST['amount'];
$package=$_POST['package'];

define('OMISE_PUBLIC_KEY', 'pkey_test_5po2mkzsky7484ta8n0');
define('OMISE_SECRET_KEY', 'skey_test_5po2mluair6jdcygy04');
require_once 'omise-php/lib/Omise.php';

$data=OmiseCharge::create(array(
    'amount'=>$amount,
    'currency'=>'thb',
    'card'=>$_POST['omiseToken']
));

if($data['status']=='successful'){

    $username = $_SESSION['username'];
    $query = "SELECT * From user WHERE username = '$username'";
    if (mysqli_query($conn, $query)){
        $query = mysqli_query($conn, $query);
        $result = mysqli_fetch_assoc($query);
        $userid = $result['id'];
        $query = "UPDATE user SET package = '$package' WHERE username = '$username';";
        mysqli_query($conn, $query);

        echo "<script type=\"text/javascript\">";
        echo "alert(\"จ่ายเงินเรียบร้อย\");";
        echo"window.location='index.php';";
        echo "</script>";
    }else{
        echo "<script type=\"text/javascript\">";
        echo "alert(\"จ่ายเงินผิดพลาด\");";
        echo"window.location='index.php';";
        echo "</script>";
    }

}
?>