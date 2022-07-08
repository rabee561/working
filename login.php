<?php
include('data.php');


if(isset($_POST['email']) && $_POST['email'] && isset($_POST['password']) && $_POST['password']){
    $email = $_POST['email'];
    $password = md5($_POST['password'].$salt);

    $sql = "SELECT `id`, `email`, `date` FROM `users` WHERE `email`='".$email."' && `password`='".$password."' ";
    $data = $conn->query($sql);
    $row = $data->fetch_assoc();

    if($row){

        $token = md5($row['id'].$row['email']);
        
        
        
        setcookie("token", $token, time()+86400, '/');
        $_COOKIE['token'] = $token;
        
        $sql = "UPDATE `users` SET `token`='".$token."' WHERE `id`='".$row['id']."' ";
        $conn->query($sql);


    }
    
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
<br><br>
<?php
include('menu.php');
?>

    <style>
        a,h3 {
        margin: 20px;
        }  
    </style>

<h1>Login</h1>
    <br /><br />
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" >
        Email : <input type="email" name="email" /> 
        <br /><br />
        Password : <input type="password" name="password" />
        <br /><br />
        <input type="submit" value="Login" />
        <br /><br />
    </form>
</body>
</html>