<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id=$_GET['id'];
    // Retrieve the form data
    $file = $_FILES["files"];
    $nameDB = $_POST["emp_name"];

    // Storing array into variables
    $fileName = $file['name'];
    $fileType = $file['type'];
    $fileTempName = $file['tmp_name'];
    $fileErr = $file['error'];
    $fileSize = $file['size'];

    // Take the file name extension
    $fileExt = explode(".", $fileName);
    $actualExt = strtolower(end($fileExt)); // Take the last element and convert to lowercase

    $allowed = array('jpg', 'png', 'jpeg');

    // If the extension is in the allowed list and not empty
    if (!empty($fileName) && in_array($actualExt, $allowed)) {
        // Ensure there is no error
        if ($fileErr == 0) {
            if ($fileSize <= 2097152) { // 2 MB
                $fileNameNew = uniqid("IMG-", true) . "." . $actualExt;
                $fileDestination = '../uploads/' . $fileNameNew;

                // Move from temp to the desired folder
                move_uploaded_file($fileTempName, $fileDestination);

                // Include the database connection
                include "db.php";

                $query = "UPDATE employee SET name='$nameDB', profile='$fileNameNew' WHERE id='$id'";
                if (mysqli_query($connection, $query)) {
                    echo "File uploaded and database updated successfully.";
                } else {
                    echo "Error updating database: " . mysqli_error($connection);
                }

                header("Location: ../index.php");
                exit();
            } else {
                echo "Max Limit is 2 MB.";
            }
        } else {
            echo "There is an error uploading the file!";
        }
    } else {
        //if file is empty
        include "db.php";

        $query = "UPDATE employee SET name='$nameDB' WHERE id='$id'";
        if (mysqli_query($connection, $query)) {
            echo "Data added to the database successfully.";
        } else {
            echo "Error updating database: " . mysqli_error($connection);
        }

        header("Location: ../index.php"); 
        exit();
    }
}
?>