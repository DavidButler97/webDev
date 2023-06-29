<?php
require_once __DIR__ . "/vendor/autoload.php";

$client = new MongoDB\Client("mongodb://localhost:27017");

// If we get to here without error we're good to go on
echo "Connected successfully to server <br> ";

// Select a database and collection
$db = $client->local;
$collection = $db->custpersonaldetails;

// Define the insert function
function insertCustomer($details) 
{
  global $collection;
  
  // Define the insert query
  $insertOneResult = $collection->insertOne($details);
  
  // Check if the insert was successful
  if ($insertOneResult->getInsertedCount() > 0) 
  {
    return true;
  } 
  else 
  {
    return false;
  }
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
  // Get form data
  $details = 
  [
    'customer_id' => $_POST['customer_id'],
    'Title' => $_POST['Title'],
    'First_Name' => $_POST['First_Name'],
    'Surname' => $_POST['Surname'],
    'Mobile' => $_POST['Mobile'],
    'Email_Address' => $_POST['Email_Address'],
    'Address_Line_1' => $_POST['Address_Line_1'],
    'Address_Line_2' => $_POST['Address_Line_2'],
    'Town' => $_POST['Town'],
    'County/City' => $_POST['County/City'],
    'EIRCODE' => $_POST['EIRCODE']
  ];

  // Insert data into MongoDB
  if (insertCustomer($details)) 
  {
    echo "Data inserted successfully";
  } 
  else 
  {
    echo "Failed to insert data";
  }
}
?>




