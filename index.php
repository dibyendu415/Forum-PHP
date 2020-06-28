<?php include('partials/header.php') ?>
<?php include('partials/dbconnect.php') ?>

<div class="container">
    <h2 class="text-center">Welcome to FORUM categoies</h2>
    <div class="row">
        <!-- using for loop to iterate through categories -->
        <?php 
    $sql="SELECT * FROM `category`";
    $res=mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($res))
    {
        $id = $row['id'];
        $name=$row['name'];
        $desc=$row['description'];
        echo '<div class="col-md-3">
                <div class="card my-5" style="width: 18rem;">
                    <img class="card-img-top" src="https://source.unsplash.com/500x400/?coding,'.$name.'" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">'.$name.'</h5>
                        <p class="card-text">'.$desc.'....</p>
                        <a href="threadslist.php?catid='.$id.'" class="btn btn-primary">Explore</a>
                    </div>
                </div>
            </div>';
    }
    ?>
    </div>
</div>


<?php include('partials/footer.php') ?>