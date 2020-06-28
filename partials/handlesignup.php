<?php
$showerror = "false";
if($_SERVER['REQUEST_METHOD']=='POST')
{
    include 'dbconnect.php';

$username=$_POST['name'];
$useremail=$_POST['email'];
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];
// check whether user exist 
$exitsql="SELECT * FROM `users` WHERE `user_email` = '$useremail'";
$res=mysqli_query($conn,$exitsql);
$numrow = mysqli_num_rows($res);
if ($numrow>0)
{
    $showerror = "Email already in use";
}
else
{
    if($pass == $cpass)
    {
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $sql="INSERT INTO `users` (`user_name`, `user_email`, `user_pass`, `user_time`) VALUES ('$username', '$useremail', '$hash', current_timestamp())";
        $res=mysqli_query($conn,$sql);
        if($res)
        {
            $showAlert = true;
            header("location: /forum/index.php?signup=true");
            exit();
        }
    }
    else
    {
        $showerror = "Passwords do not match";
        header("location: /forum/index.php?signup=false&error=$showerror");
        
    }
}
header("location: /forum/index.php?signup=false&error=$showerror");
}
?>