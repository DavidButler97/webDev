<?php
//BACK END.
//CLI RETREIVE part of C"R"UD
//server connection
$servername = "localhost"; //reference w3schools
$username = "root";
//no password
$password = "";
//database name
$dbname = "users";

//get input from CLI arguments
//$argv[0] is the php file
if (isset($argv[1])) {
    $user_name = $argv[1];
} else {
    echo "Please enter a search query.\n";
    exit;
}

//sql connection
$conn = new mysqli($servername, $username, $password, $dbname); //reference w3 schools

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// retrieve user information and address from userInfo and userAddress tables
$query = "SELECT * FROM userInfo
          JOIN userAddress ON userinfo.ID = useraddress.UserInfoID
          WHERE userInfo.FirstName = '$user_name'";
$result = mysqli_query($conn, $query);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // output retrieved user information and address
        echo "Title: ". " ' " . $row["Title"]. " ' " . ",  ";
        echo "First Name: ". " ' " . $row["FirstName"]. " ' ". ",  ";
        echo "Surname: ". " ' " . $row["Surname"]. " ' ". ",  ";
        echo "Mobile: ". " ' " . $row["Mobile"]. " ' ". ",  ";
        echo "Email Address: ". " ' " . $row["EmailAddress"]. " ' ". ",  ";
        echo "Address Line 1: ". " ' " . $row["Address_Line_1"]. " ' ". ",  ";
        echo "Address Line 2: ". " ' " . $row["Address_Line_2"]. " ' ". ",  ";
        echo "Town: ". " ' " . $row["Town"]. " ' ". ",  ";
        echo "County: ". " ' " . $row["County"]. " ' ". ",  ";
        echo "Eircode: ". " ' " . $row["Eircode"]. " ' ". ",  ";
    }
} else {
    echo "No user address found";
}

$conn->close();
?>