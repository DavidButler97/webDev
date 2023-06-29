<?php
require_once __DIR__ . "/vendor/autoload.php";

$client = new MongoDB\Client("mongodb://localhost:27017");

// If we get to here without error we're good to go on
echo "Connected successfully to server <br> ";

// Select a database and collection
$db = $client->local;
$collection = $db->custpersonaldetails;

function deleteCustomer($email, $phone, $name) 
{
    global $collection;
    $result = $collection->deleteMany
    ([
        'Email_Address' => $email,
        'Mobile' => $phone,
        'First_Name' => $name
    ]);
    return $result->getDeletedCount();
}

// Retrieve input from HTML form
$email = $_POST['Email_Address'];
$phone = $_POST['Mobile'];
$name = $_POST['First_Name'];

// Delete customer records matching the input
$deleted_count = deleteCustomer($email, $phone, $name);

// Check if any records were deleted
if ($deleted_count > 0) 
{
    echo "Deleted " . $deleted_count . " records successfully.";
} 
else 
{
    echo "No records found to delete.";
}
?>