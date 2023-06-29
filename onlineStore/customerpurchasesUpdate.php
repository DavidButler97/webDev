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

    // Define the update function
    function updateCustomerPurchase($order_id, $customer_id, $date, $items) 
    {
        global $collection;

        // Define the update query
        $query = ['order_id' => $order_id];
        $update = 
        [
            '$set' => 
            [
                'customer_id' => $customer_id,
                'date' => $date,
                'items' => $items
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
    if (updateCustomerPurchase($order_id, $customer_id, $date, $items)) 
    {
        echo "Data updated successfully";
    } 
    else 
    {
        echo "Failed to update data";
    }

?>