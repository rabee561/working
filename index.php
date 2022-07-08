<?php
include('data.php');
include('token.php');

if(isset($_POST['type']) && $_POST['type']){

    @$sql = "INSERT INTO `starting` (`user_id`, `time`, `type`, `date`) VALUES
     ('".$_POST['user_id']."', '".time()."', '".$_POST['type']."', '".time()."')";
    $conn->query($sql);
   
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<link rel="stylesheet" href="index.css">

    <br><br>
    <?php
    include('menu.php');
    ?>

    
    
   


<h2>time work</h2>

<form action="<?php $_SERVER['PHP_SELF'];?>" method = "POST">
    <input type="hidden" name="type" value = "start">
    <input type="hidden" name="user_id" value = "<?=$user['id'];?>">
    <input type="submit" value="start" type="button" class="btn btn-primary">
</form>

<form action="<?php $_SERVER['PHP_SELF'];?>" method = "POST">
    <input type="hidden" name="type" value = "end">
    <input type="hidden" name="user_id" value = "<?=$user['id'];?>">
    <input type="submit" value="end" type="button" class="btn btn-outline-danger">
</form>

<table border="5">
        <td>
           email
        </td>
        <td>
            Time
        </td>
        <td>
            Type
        </td>
    </tr>
    <? 
    $data = $conn->query("SELECT * FROM `starting` ORDER BY `date` DESC");
    for($i=0;$i<$data->num_rows;$i++){
        $row = $data->fetch_assoc();
        ?>
    <tr>
        <td> 
            <?
            $sql3 = "SELECT `email` FROM `users` WHERE `id`='".$row['user_id']."' ";
            $data3 = $conn->query($sql3);
            $row3 = $data3->fetch_assoc();
            echo @$row3['email'];
            ?>
        </td>
        <td> 
            <?
            echo date('Y-m-d H:i:s', $row['time']);
            ?>
        </td>
        <td> 
            <?=$row['type'];?>
        </td>
    </tr>
    <?
    }
    ?>
   
</table>


</body>
</html>