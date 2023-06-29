<?php
require_once __DIR__ . "/vendor/autoload.php";

$client = new MongoDB\Client("mongodb://localhost:27017");

// If we get to here without error we're good to go on
echo "Connected successfully to server <br> ";

// Select a database and collection
$db = $client->local;
$collection = $db->customerpurchases;

// Define the delete function
function deleteCustomerPurchase($order_id) 
{
    global $collection;
    $result = $collection->deleteMany
    ([
        'order_id' => (string)$order_id
    ]);
    return $result->getDeletedCount();
}

// Retrieve input from HTML form
$order_id = $_POST['order_id'];

// Delete customer purchase records matching the input
$deleted_count = deleteCustomerPurchase($order_id);

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