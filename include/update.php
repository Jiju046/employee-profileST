<?php

include "./db.php";

// take data from db and view
if(isset($_GET['id'])){

    $id=$_GET['id'];
    $query="SELECT * FROM employee WHERE id='$id'";
    $result=$connection->query($query);
    if($result->num_rows > 0){
        $row=$result->fetch_assoc();
        $name=$row['name'];
        $profile=$row['profile'];
    }
    else{
        header("Location: ../index.php");
        exit(); //show output and terminate script
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container">

        <h3 class="my-5">Update Employee Profile</h3>
        <form action="./upload_update.php?id=<?php echo $id; ?>" enctype="multipart/form-data" method="post">
            <!-- name -->
        <div class="my-3">
            <label class="form-label" for="name">Employee Name</label>
            <input type="text" class="form-control" name="emp_name" id="name" value="<?php echo $name; ?>">
        </div>
        <!-- file upload -->
            <div class="my-3">
                <label for="file" class="form-label">Upload Your File</label>
                <input class="form-control" type="file" id="file" name="files">
                
                <!-- view current image -->
                <div class="my-4">
                    <p>Current Profile picture</p>
                    <img src="../uploads/<?php echo $profile; ?>" width="100">
                </div>

            </div>
            <button class="btn btn-success">Update</button>
        </form>
        <a href="../index.php">Back to home</a>
    </div>
    
</body>
</html>