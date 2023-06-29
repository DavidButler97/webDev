<?php

// Get the form data
$model = $_POST['model'];

require_once __DIR__ . "/vendor/autoload.php";

$client = new MongoDB\Client("mongodb://localhost:27017");

// If we get to here without error we're good to go on
echo "Connected successfully to server <br>";

// Select a database and collection
$db = $client->local;
$collection = $db->mobilephoneinfo;

// Define the delete function
function deleteMobilePhone($model) 
{
    global $collection;
    $result = $collection->deleteMany
    ([
        'Model' => (string)$model
    ]);
    return $result->getDeletedCount();
}

// Delete mobile phone records matching the input
$deleted_count = deleteMobilePhone($model);

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