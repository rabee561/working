<?php
include('data.php');
include('token.php');

if(isset($_POST['email']) && $_POST['email'] && isset($_POST['password']) && $_POST['password']){
          
        $email = $_POST['email'];
        $password = md5($_POST['password'].$salt);

        $sql = "SELECT `email` FROM `users` WHERE `email`='".$email."' ";
        $data = $conn->query($sql);
        $row = $data->fetch_assoc();

        if($row){
            echo 'هذا البريد مستخدم من قبل';
        }else{

            $sql = "INSERT INTO `users` (`email`, `password`, `date`) VALUES ('".$email."', '".$password."', '".time()."')";
            if ($conn->query($sql) === TRUE) {
                echo "good register";
                } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
}
?>

<br><br>
    <?php include ('menu.php');?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
      <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    
</body>
</html>


    <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3 h-5">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  
  <button type="submit" class="btn btn-primary" value="register">Submit</button>
</form>


</form>