<?php
if(isset($_COOKIE['token']) && $_COOKIE['token']){
    $sql = "SELECT `id`, `email`, `date` FROM `users` WHERE `token`='".$_COOKIE['token']."' ";
    $data = $conn->query($sql);
    $user = $data->fetch_assoc();
    if($user){
        ?>
        <form class="user">
        Hello again <?=$user['email'];?>
        </form>
        <?php 
        
    }
}
?>

<style>
    .user{
        font-size: 20px
    }
</style>