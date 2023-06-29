<?php
require_once __DIR__ . "/vendor/autoload.php";

$client = new MongoDB\Client("mongodb://localhost:27017");

// If we get to here without error we're good to go on
echo "Connected successfully to server <br> ";

// Select a database and collection
$db = $client->local;
$collection = $db->custpersonaldetails;

//get input from html below
$user_name = $_GET['search'];

// retrieve user information from custpersonaldetails collection
$result = $collection->find(['First_Name' => $user_name]);

$count = $collection->count(['First_Name' => $user_name]);

if ($count > 0) 
{
    foreach ($result as $row) 
    {
        // output retrieved user information
        echo "Cust ID: ". " ' " . $row["customer_id"]. " ' " . ",  ";
        echo "Title: ". " ' " . $row["Title"]. " ' " . ",  ";
        echo "First Name: ". " ' " . $row["First_Name"]. " ' ". ",  ";
        echo "Surname: ". " ' " . $row["Surname"]. " ' ". ",  ";
        echo "Mobile: ". " ' " . $row["Mobile"]. " ' ". ",  ";
        echo "Email Address: ". " ' " . $row["Email_Address"]. " ' ". ",  ";
        echo "Address Line 1: ". " ' " . $row["Address_Line_1"]. " ' ". ",  ";
        echo "Address Line 2: ". " ' " . $row["Address_Line_2"]. " ' ". ",  ";
        echo "Town: ". " ' " . $row["Town"]. " ' ". ",  ";
        echo "County: ". " ' " . $row["County/City"]. " ' ". ",  ";
        echo "Eircode: ". " ' " . $row["EIRCODE"]. " ' ". ",  ";
    }
} 
else 
{
    echo "No user address found";
}

?>

