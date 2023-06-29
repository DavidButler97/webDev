<?php
// Get the form data
$manufacturer = $_POST['manufacturer'];
$model = $_POST['model'];
$price = $_POST['price'];

require_once __DIR__ . "/vendor/autoload.php";

$client = new MongoDB\Client("mongodb://localhost:27017");

// If we get to here without error we're good to go on
echo "Connected successfully to server <br> ";

// Select a database and collection
$db = $client->local;
$collection = $db->mobilephoneinfo;

// Define the insert function
function insertPhoneInfo($manufacturer, $model, $price) 
{
    global $collection;

    // Define the insert query
    $insertOneResult = $collection->insertOne
    ([
        'Manufacturer' => $manufacturer,
        'Model' => $model,
        'Price' => $price
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
if (insertPhoneInfo($manufacturer, $model, $price)) 
{
    echo "Data inserted successfully";
} 
else 
{
    echo "Failed to insert data";
}

?>