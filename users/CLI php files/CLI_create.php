<?php
//BACK END.
//CLI CREATE part of "C"RUD
//server connection
$servername = "localhost"; //reference w3schools
$username = "root";
//no password
$password = "";
//database name
$dbname = "users";

// Get input from command line arguments
if ($argc < 11) 
{
  die("Error: Not enough arguments.\nUsage: php insert_data.php <title> <first_name> <last_name> <email> <phone> <address_line_1> <address_line_2> <town> <county> <eircode>\n");
}
//get input from command line arguments
//$argv[0] is the php file
$user_title = $argv[1];
$user_firstname = $argv[2];
$user_surname = $argv[3];
$user_emailaddress = $argv[4];
$user_mobile = $argv[5];
$user_addressline1 = $argv[6];
$user_addressline2 = $argv[7];
$user_town = $argv[8];
$user_county = $argv[9];
$user_eircode = $argv[10];

//sql connection
$conn = new mysqli($servername, $username, $password, $dbname); //reference w3 schools

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

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

// Close the database connection
$conn->close();
?>