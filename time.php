<?php
include('data.php');
include('token.php');

if(isset($_POST['type']) && $_POST['type']){

    @$sql = "INSERT INTO `starting` (`user_id`, `time`, `type`, `date`) VALUES
     ('".$user['id']."', '".time()."', '".$_POST['type']."', '".time()."')";
    $conn->query($sql);
   
}

?>