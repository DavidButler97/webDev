<?php
//BACK END.
//CLI DELETE part of CRU"D"
    //server connection
    $servername = "localhost"; //refrence w3schools
    $username = "root";
    //no password
    $password = "";
    //database name
    $dbname = "users";

    //get input from CLI arguments
    //$argv[0] is the php file
    $user_firstname = $argv[1];
    $user_emailaddress = $argv[2];
    $user_mobile = $argv[3];

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

    //information messages
    if ($conn->query($query1) === TRUE) 
    {
        if ($conn->affected_rows > 0) 
        {
            echo "Record deleted successfully\n";
        } 
        else 
        {
            echo "No record found to delete\n";
        }
    } 
    else 
    {
        echo "Error deleting record: " . $conn->error . "\n";
    }

?>