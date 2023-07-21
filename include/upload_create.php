<?php
if($_SERVER['REQUEST_METHOD']=="POST")
$file=$_FILES["file"];
$name=$_POST["name"];

// storing array into variables
$fileName=$file['name'];
$fileTempName=$file['tmp_name'];
$fileErr=$file['error'];
$fileSize=$file['size'];

// take file name extension
$fileExt=explode(".",$fileName);
$actualExt=strtolower(end($fileExt)); //takes the last element and to l case

$allowed= array('jpg','png','jpeg');


// if the extension is in allowed
if(in_array($actualExt,$allowed)){
    // ensure there is no error
    if($fileErr == 0){
        if($fileSize <= 2097152){  //2 mb
            $fileNameNew=uniqid("IMG-",true).".".$actualExt;
            
            $fileDestination= '../uploads/'.$fileNameNew;
            
            move_uploaded_file($fileTempName,$fileDestination); // move from temp to desired folder
            header("Location: ../index.php");
            
            include "db.php";

            $sql="INSERT INTO employee(name,profile)
            VALUES('$name','$fileNameNew')";
            mysqli_query($connection,$sql);
            
        } 
        else{
            echo "Max Limit is 2mb";
        }
    }
    else{
        echo "There is an error uploading file!";
    }

}
else{
    echo "not updated";
}

?>