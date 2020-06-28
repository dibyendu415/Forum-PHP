<?php
$showerror = "false";
if($_SERVER['REQUEST_METHOD']=='POST')
{
    include 'dbconnect.php';


$useremail=$_POST['email'];
$pass=$_POST['pass'];

// check whether user exist 
$sql="SELECT * FROM `users` WHERE `user_email` = '$useremail'";
$res=mysqli_query($conn,$sql);
$numrow = mysqli_num_rows($res);
if ($numrow == 1)
{
    $row = mysqli_fetch_assoc($res);
    
    if(password_verify($pass,$row['user_pass']))
    // if($pass==$row['user_pass'])
    {
        session_start();
        $_SESSION['loggedin']= true;
        $_SESSION['id']=$row['user_id'];
        $_SESSION['user_name']=$row['user_name'];
        $_SESSION['user_email']= $useremail;
        echo "logged in".$useremail;
    }
    else
    {
        echo "error";
    }
    // header("location: /forum/index.php");
}
}
?>