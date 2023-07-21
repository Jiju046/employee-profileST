<?php 

include "db.php";
if(isset($_GET["id"])){
    $id=$_GET["id"];

    $query="SELECT * FROM employee WHERE id='$id'";
    $result=mysqli_query($connection,$query);

    if($result->num_rows==1){
        $row=$result->fetch_assoc();
        $name=$row['name'];
        $profile=$row['profile'];
    }
}  
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
    <div class="container my-5">
        <h3>Profile Preview</h3>

        <div class="card my-5" style="width: 20%;">
            <img src="../uploads/<?php echo $profile; ?>" class="card-img-top" alt="..." height="250">
        </div>
        
</div>
<p>Employee Name:  <?php echo $name; ?></p>
<a href="../index.php">Back to Home</a>
    </div>


    
</body>
</html>