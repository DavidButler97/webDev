<?php
//BACK END.
//DELETE part of CRU"D"
    //server connection
    $servername = "localhost"; //refrence w3schools
    $username = "root";
    //no password
    $password = "";
    //database name
    $dbname = "users";

    //get input from html below
    $user_firstname = $_POST['first_name'];
    $user_emailaddress = $_POST['email'];
    $user_mobile = $_POST['phone'];

    //sql connection
    $conn = new mysqli($servername, $username, $password, $dbname); //refrence w3 schools

    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }
    //in php the '.' operator is for concatenating strings
    // store sql query in variable
    //Assuming you have already established a connection to your database
    $query1 = "Delete FROM userInfo WHERE EmailAddress= '$user_emailaddress' && Mobile ='$user_mobile' && FirstName ='$user_firstname'";
    //$result1 = mysqli_query($conn, $query1);

    //information messages
    if ($conn->query($query1) === TRUE) 
    {
        if ($conn->affected_rows > 0) 
        {
            echo "Record deleted successfully";
        } 
        else 
        {
            echo "No record found to delete";
        }
    } 
    else 
    {
        echo "Error deleting record: " . $conn->error;
    }

?>
