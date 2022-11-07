<?php 
    session_start();
    include('server.php');
    $query = "SELECT * FROM `user` ORDER BY `username`";
    $result = mysqli_query($conn,$query)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table style="width:100%" border="1">
        <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Address</th>
            <th>Tel</th>
            <th>ID card number</th>
            <th>Package</th>
        </tr>
        <?php
            foreach($result as $data){
                echo "<tr align=center>";
                echo "<td>".$data['username']."</td>";
                echo "<td>".$data['password']."</td>";
                echo "<td>".$data['address']."</td>";
                echo "<td>".$data['tel']."</td>";
                echo "<td>".$data['IDcardnumber']."</td>";
                echo "<td>".$data['package']."</td>";
                echo "</tr>";
            }
        ?>
        
    </table>
</body>
</html>