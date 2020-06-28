<?php include('partials/header.php');
include('partials/dbconnect.php');
$id=$_GET['threadid'];
$sql="SELECT * FROM `threads` WHERE `id`=$id";
$res=mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($res))
    {   $catid=$row['thread_cat_id'];
        $title=$row['title'];
        $desc=$row['description'];
        $thread_user_id=$row['thread_user_id'];
        $sql2="SELECT * FROM `users` WHERE `user_id`='$thread_user_id'";
        $res2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($res2);
        $username=$row2['user_name'];
    }
    $sql="SELECT * FROM `category` WHERE `id`=$catid";
    $res=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($res))
        {   $name=$row['name'];
            $catdesc=$row['description'];
        }
?>

<?php 
$showAlert = false;
$method=$_SERVER['REQUEST_METHOD'];
// echo $method;
if ($method=='POST')
{
    // Insert new comments
    $comment = $_POST['comm'];
    $comment = str_replace("<","&lt",$comment);
    $comment = str_replace(">","&gt",$comment);
    $user_id = $_POST['user_id'];
    $sql="INSERT INTO `comments` ( `comment_content`, `thread_id`,`comment_by`, `comment_time`) VALUES ('$comment', '$id','$user_id', current_timestamp())";
    $res=mysqli_query($conn,$sql);
    $showAlert = true;
    if ($showAlert)
    {
        echo "<div class='alert alert-success' role='alert'>
              Comment added Successfully!
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
            </div>";
    }
}
?>

<div class="container">
    <div class="jumbotron">
        <h1>Welcome to <?php echo $name; ?> Forums</h1>
        <p class="lead"><?php echo $catdesc; ?>.</p>
    </div>
</div>
<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
{
echo '<div class="container">
        <form action="'.$_SERVER["REQUEST_URI"].'" method="post">
            <div class="form-group">
                <label for="comm">Comment</label>
                <input type="text" class="form-control" id="comm" name="comm" placeholder="type your Comment">
                <input type="hidden" name="user_id" value="'.$_SESSION['id'].'">
            </div>
            <button type="submit" class="btn btn-primary">POST Comment</button>
        </form>
    </div>';
}
else{
    echo "<h3 class='container text-center'>Log in to Comment</h3>";
}
?>
<div class="container">
    <h1><?php echo $title; ?>--Discussions</h1>
    <p class="text-center">**<?php echo $desc; ?>**<B>Posted By <?php echo $username ?> </B></p>
    
    <?php
    $id=$_GET['threadid'];
    $sql="SELECT * FROM `comments` WHERE `thread_id`=$id";
    $res=mysqli_query($conn,$sql);
    $noresult = true;
    while($row = mysqli_fetch_assoc($res))
        {   $noresult=false;
            $id = $row['comment_id'];
            $content=$row['comment_content'];
            $time=$row['comment_time'];
            $thread_user_id=$row['comment_by'];
            $sql2="SELECT * FROM `users` WHERE `user_id`='$thread_user_id'";
            $res2=mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_assoc($res2);
            $username=$row2['user_name'];

            echo '<div class="media my-4">
                    <img width="50px" src="images/comment_2.jpg" alt="..." class="mr-3">
                    <div class="media-body">
                    <p class="font-weight-bold my-0">'.$username.' at '.$time.'</p>
                        '.$content.'
                    </div>
                </div>';
        }
        if ($noresult)
        {
            echo "<h2>Be the first person to Ask any question</h2> 
            <style>#hid{ display:none;}</style>
            ";
        }
        ?>

</div>

<?php include('partials/footer.php') ?>
