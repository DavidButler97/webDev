<?php

// Get the form data
$model = $_POST['model'];
$price = $_POST['price'];

require_once __DIR__ . "/vendor/autoload.php";

$client = new MongoDB\Client("mongodb://localhost:27017");

// If we get to here without error we're good to go on
echo "Connected successfully to server <br> ";

// Select a database and collection
$db = $client->local;
$collection = $db->mobilephoneinfo;

// Define the update function
function updatePhoneInfo($model, $price) 
{
    global $collection;

    // Define the update query
    $query = ['Model' => $model];
    $update = 
    [
        '$set' => 
        [
            'Price' => $price
        ]
    ];

    $updateResult = $collection->updateOne($query, $update);

    // Check if the update was successful
    if ($updateResult->getModifiedCount() > 0) 
    {
        return true;
    } 
    else 
    {
        return false;
    }
}

// Update data in MongoDB
if (updatePhoneInfo($model, $price)) 
{
    echo "Data updated successfully";
} 
else 
{
    echo "Failed to update data";
}
?>






