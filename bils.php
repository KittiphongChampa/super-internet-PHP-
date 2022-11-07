<?php 
    session_start();
    include('server.php');
    if(isset($_POST['package'])){
        $package = $_POST['package'];
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
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ชำระค่าอินเทอร์เน็ต</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="row no-gutter justify-content-center">
            <div class="content">
                <div class="promo">
                    <p class="p_bold"><?php echo $p_bold;?></p>
                    <p class="p_speed"><?php echo $p_speed;?></p>
                    <p class="p_topspeed"><?php echo $p_topspeed;?></p>
                    <p class="p_day"><?php echo $p_day;?></p>
                    <p class="p_timer"><?php echo $p_timer;?></p>
                    <p class="p_price"><?php echo $p_price;?></p>
                </div>
            </div>
        </div>
        <div class="row no-gutter justify-content-center">
            <form id="checkoutForm" method="POST" action="check-bils.php">
            <input type="hidden" value="<?php echo $package;?>" name="package" />
            <input type="hidden" value="<?php echo $amount;?>" name="amount" />

                <script type="text/javascript" src="https://cdn.omise.co/omise.js"
                    data-key="pkey_test_5po2mkzsky7484ta8n0" 
                    data-amount=<?php echo $amount;?>
                    data-currency="THB"
                    data-button-label="ชำระ" 
                    data-default-payment-method="credit_card">
                </script>
            </form>
        </div>
</body>

</html>