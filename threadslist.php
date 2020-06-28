<?php include('partials/header.php');
include('partials/dbconnect.php');
$id=$_GET['catid'];
$sql="SELECT * FROM `category` WHERE `id`=$id";
$res=mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($res))
    {
        $name=$row['name'];
        $desc=$row['description'];
    }
?>

<?php 
$showAlert = false;
$method=$_SERVER['REQUEST_METHOD'];
// echo $method;
if ($method=='POST')
{
    // Insert new thread
    $th_title = $_POST['title'];
    $th_desc = $_POST['desc'];

    $th_title = str_replace("<","&lt",$th_title);
    $th_title = str_replace(">","&gt",$th_title);

    $th_desc = str_replace("<","&lt",$th_desc);
    $th_desc = str_replace(">","&gt",$th_desc);


    $user_id = $_POST['user_id'];
    $sql="INSERT INTO `threads` (`title`, `description`, `thread_cat_id`, `thread_user_id`, `created`) VALUES ('$th_title', '$th_desc', '$id', '$user_id', current_timestamp())";
    $res=mysqli_query($conn,$sql);
    $showAlert = true;
    if ($showAlert)
    {
        echo "<div class='alert alert-success' role='alert'>
              Thread added Successfully!
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
        <p class="lead"><?php echo $desc; ?>.</p>
    </div>
</div>

<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
{
echo '<div class="container">
        <form action="'.$_SERVER["REQUEST_URI"].'" method="post">
            <div class="form-group">
                <label for="title">TITLE</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp"
                    placeholder="Enter your Question">
            </div>
            <div class="form-group">
                <label for="desc">Elaborate your query</label>
                <input type="text" class="form-control" id="desc" name="desc">
                <input type="hidden" name="user_id" value="'.$_SESSION['id'].'">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>';
}
else{
echo "<h3 class='container text-center'>Log in to post a question</h3>";
}
?>
<div class="container">
    <h1 id='hid'>Browse Questions</h1>
    <?php
    $id=$_GET['catid'];
    $sql="SELECT * FROM `threads` WHERE `thread_cat_id`=$id";
    $res=mysqli_query($conn,$sql);
    $noresult = true;
    while($row = mysqli_fetch_assoc($res))
        {   $noresult=false;
            $id = $row['id'];
            $title=$row['title'];
            $desc=$row['description'];
            $time=$row['created'];
            $thread_user_id=$row['thread_user_id'];
            $sql2="SELECT * FROM `users` WHERE `user_id`='$thread_user_id'";
            $res2=mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_assoc($res2);
            $username=$row2['user_name'];

            echo '<div class="media my-4">
                    <img width="50px" src="images/comment_2.jpg" alt="..." class="mr-3">
                    <div class="media-body">
                    <h5><a href="thread.php?threadid='.$id.'">'.$title.'</a></h5>
                        '.$desc.'
                    </div>
                    <p class="font-weight-bold my-0">'.$username.' at '.$time.'</p>
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