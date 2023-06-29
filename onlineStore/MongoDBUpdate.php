<?php
require_once __DIR__ . "/vendor/autoload.php";

function updateCustomer($customer_id, $new_title, $new_first_name, $new_last_name, $new_email, $new_mobile, $new_address_line_1, $new_address_line_2, $new_town, $new_county, $new_eircode) {
    // Connect to the MongoDB server
    $client = new MongoDB\Client("mongodb://localhost:27017");

    // Select a database and collection
    $db = $client->local;
    $collection = $db->custpersonaldetails;

    // Update customer record in the collection
    $update_result = $collection->updateOne
    (
        ['customer_id' => $customer_id],
        ['$set' => 
        [
            'Title' => $new_title,
            'First_Name' => $new_first_name,
            'Surname' => $new_last_name,
            'Email_Address' => $new_email,
            'Mobile' => $new_mobile,
            'Address_Line_1' => $new_address_line_1,
            'Address_Line_2' => $new_address_line_2,
            'Town' => $new_town,
            'County/City' => $new_county,
            'EIRCODE' => $new_eircode
        ]]
    );

    // Check if the update was successful
    if ($update_result->getModifiedCount() == 1) 
    {
        return true;
    } 
    else 
    {
        return false;
    }
}

// Retrieve input from HTML form
$customer_id = $_POST['customer_id'];
$new_title = $_POST['Title'];
$new_first_name = $_POST['First_Name'];
$new_last_name = $_POST['Surname'];
$new_email = $_POST['Email_Address'];
$new_mobile = $_POST['Mobile'];
$new_address_line_1 = $_POST['Address_Line_1'];
$new_address_line_2 = $_POST['Address_Line_2'];
$new_town = $_POST['Town'];
$new_county = $_POST['County/City'];
$new_eircode = $_POST['EIRCODE'];

// Update customer record
if (updateCustomer($customer_id, $new_title, $new_first_name, $new_last_name, $new_email, $new_mobile, $new_address_line_1, $new_address_line_2, $new_town, $new_county, $new_eircode)) 
{
    echo "Record updated successfully.";
} 
else 
{
    echo "Failed to update record.";
}
?>
