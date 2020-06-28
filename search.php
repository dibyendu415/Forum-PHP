<?php include('partials/dbconnect.php') ?>
<?php include('partials/header.php') ?>

<div class="container">
    <h2 class="text-center">Search results for <?php echo $_GET['search'] ?></h2>
        <!-- Search Results -->
        <?php
        $noresults=true;
        $query=$_GET['search'];
        $sql="SELECT * FROM threads WHERE MATCH (title,description) against('$query')";
        $res=mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($res))
            {
                $title=$row['title'];
                $desc=$row['description'];
                $thread_id = $row['id'];
                $url="thread.php?threadid=".$thread_id;
                echo '<div class="result"> 
                <h3><a href="'.$url.'">'.$title.'</a></h3>
                <p>'.$desc.'</p>';
                $noresults=false; 
            } 
            if($noresults){
                echo '<h1>No results found</h1>';
            }

        ?>

    </div>
</div>


<?php include('partials/footer.php') ?>