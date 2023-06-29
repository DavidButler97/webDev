<?php
// Get the form data
$order_id = $_POST['order_id'];
$customer_id = $_POST['customer_id'];
$date = $_POST['date'];
$items = $_POST['items'];

require_once __DIR__ . "/vendor/autoload.php";

$client = new MongoDB\Client("mongodb://localhost:27017");

// If we get to here without error we're good to go on
echo "Connected successfully to server <br>";

// Select a database and collection
$db = $client->local;
$collection = $db->customerpurchases;

// Define the insert function
function insertCustomerPurchase($order_id, $customer_id, $date, $items) 
{
    global $collection;

    // Define the insert query
    $insertOneResult = $collection->insertOne
    ([
        'order_id' => $order_id,
        'customer_id' => $customer_id,
        'date' => $date,
        'items' => $items
    ]);

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

// Insert data into MongoDB
if (insertCustomerPurchase($order_id, $customer_id, $date, $items)) 
{
    echo "Data inserted successfully";
} 
else 
{
    echo "Failed to insert data";
}
?>