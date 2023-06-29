<?php
require_once __DIR__ . "/vendor/autoload.php";

$client = new MongoDB\Client("mongodb://localhost:27017");

// If we get to here without error we're good to go on
echo "Connected successfully to server <br> ";

// Select a database and collection
$db = $client->local;
$collection = $db->mobilephoneinfo;

// get input from html form below
$model = $_GET['model'];

// retrieve mobile phone information from mobilephoneinfo collection
$result = $collection->findOne(['Model' => (String) $model]);

if ($result) 
{
    // output retrieved mobile phone information
    echo "Manufacturer: ". " ' " . $result["Manufacturer"]. " ' " . ",  ";
    echo "Model: ". " ' " . $result["Model"]. " ' " . ",  ";
    echo "Price: ". " ' " . $result["Price"]. " ' ";
} 
else 
{
    echo "No mobile phone found";
}
?>