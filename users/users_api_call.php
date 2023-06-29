<?php
//BACK END.
//CREATE part of "C"RUD
    //server connection
    $servername = "localhost"; //refrence w3schools
    $username = "root";
    //no password
    $password = "";
    //database name
    $dbname = "users";

    //get input from html below
    $user_title = $_POST['title'];
    $user_firstname = $_POST['first_name'];
    $user_surname = $_POST['last_name'];
    $user_emailaddress = $_POST['email'];
    $user_mobile = $_POST['phone'];
    $user_addressline1 = $_POST['address_line_1'];
    $user_addressline2 = $_POST['address_line_2'];
    $user_town = $_POST['town'];
    $user_county = $_POST['county'];
    $user_eircode = $_POST['eircode'];

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
    $query1 = "INSERT INTO userinfo (Title, FirstName, Surname, Mobile, EmailAddress) VALUES ('".$user_title."', '".$user_firstname."', '".$user_surname."', '".$user_mobile."', '".$user_emailaddress."')";
    $result1 = mysqli_query($conn, $query1);

    $query2 = "INSERT INTO useraddress (userInfoID, Address_Line_1, Address_Line_2, Town, County, Eircode) VALUES (LAST_INSERT_ID(), '".$user_addressline1."', '".$user_addressline2."', '".$user_town."', '".$user_county."', '".$user_eircode."')";
    $result2 = mysqli_query($conn, $query2);

    //information messages
    if ($result1 === TRUE && $result2 ===TRUE) 
    {
        echo "New record created successfully";
    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>
