<?php
require_once __DIR__ . "/vendor/autoload.php";

$client = new MongoDB\Client("mongodb://localhost:27017");

// If we get to here without error we're good to go on
echo "Connected successfully to server <br> ";

// Select a database and collection
$db = $client->local;
$collection = $db->customerpurchases;

// get input from html form below
$order_id = $_GET['order_id'];

// retrieve purchase information from customerpurchases collection
$result = $collection->find(['order_id' => (String) $order_id]);

$count = $collection->count(['order_id' => (String) $order_id]);

if ($count > 0) 
{
    foreach ($result as $row) 
    {
        // output retrieved purchase information
        echo "Order ID: ". " ' " . $row["order_id"]. " ' " . ",  ";
        echo "Customer ID: ". " ' " . $row["customer_id"]. " ' " . ",  ";
        if (is_string($row["date"])) 
        {
            echo "Date: ". " ' " . $row["date"]. " ' " . ",  ";
        } 
        else 
        {
            echo "Date: ". " ' " . $row["date"]->toDateTime()->format('d-m-Y H:i:s'). " ' " . ",  ";
        }
        echo "Items: ". " ' " . $row["items"]. " ' ". ",  ";
    }
} 
else 
{
    echo "No purchase found";
}
?>