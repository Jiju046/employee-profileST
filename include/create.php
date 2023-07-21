
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

        <h3 class="my-5">Add Employee Profile</h3>
        <form action="upload_create.php" enctype="multipart/form-data" method="post">
            <!-- name -->
        <div class="my-3">
            <label class="form-label" for="name">Employee Name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <!-- file upload -->
            <div class="my-3">
                <label for="file" class="form-label">Upload Your File</label>
                <input class="form-control" type="file" id="file" name="file">

            </div>
            <button class="btn btn-success">Upload</button>
        </form>
        <a href="../index.php">Back to home</a>
    </div>
    
</body>
</html>