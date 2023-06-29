<?php
//BACK END
//UPDATE part of CR"U"D
//server connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

//sql connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

//get input from CLI arguments
//$argv[0] is the php file
$user_id = $argv[1];
$user_title = $argv[2];
$user_emailaddress = $argv[3];
$user_mobile = $argv[4];
$user_addressline1 = $argv[5];
$user_addressline2 = $argv[6];
$user_town = $argv[7];
$user_county = $argv[8];
$user_eircode = $argv[9];

//update user info
$query1 = "UPDATE userInfo SET Title = '".$user_title."', Mobile = '".$user_mobile."', EmailAddress = '".$user_emailaddress."' WHERE ID = '".$user_id."'";
$result1 = mysqli_query($conn, $query1);

//update user address
$query2 = "UPDATE userAddress SET Address_Line_1 = '".$user_addressline1."', Address_Line_2 = '".$user_addressline2."', Town = '".$user_town."', County = '".$user_county."', Eircode = '".$user_eircode."' WHERE userInfoID = '".$user_id."'";
$result2 = mysqli_query($conn, $query2);

//information messages
if ($result1 && $result2) 
{
    if ($conn->affected_rows > 0) 
    {
        echo "Record updated successfully";
    } 
    else 
    {
        echo "No record found matching that id";
    }
} 
else 
{
    echo "Error updating record: " . $conn->error;
}

//close connection
$conn->close();
?>