<?php
//BACK END
//UPDATE part of CR"U"D
//server connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

//sql connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}


  //get input from HTML form
  $user_id = $_POST['id'];
  $user_title = $_POST['title'];
  $user_emailaddress = $_POST['email'];
  $user_mobile = $_POST['phone'];
  $user_addressline1 = $_POST['address_line_1'];
  $user_addressline2 = $_POST['address_line_2'];
  $user_town = $_POST['town'];
  $user_county = $_POST['county'];
  $user_eircode = $_POST['eircode'];

  //update user info
    $query1 = "UPDATE userInfo SET Title = '".$user_title."', Mobile = '".$user_mobile."', EmailAddress = '".$user_emailaddress."' WHERE ID = '".$user_id."'";
    $result1 = mysqli_query($conn, $query1);

    //update user address
    $query2 = "UPDATE userAddress SET Address_Line_1 = '".$user_addressline1."', Address_Line_2 = '".$user_addressline2."', Town = '".$user_town."', County = '".$user_county."', Eircode = '".$user_eircode."' WHERE userInfoID = '".$user_id."'";
    $result2 = mysqli_query($conn, $query2);
  
  
    //information messages
    if ($result1 && $result2) 
    {
        if ($conn->affected_rows > 0) 
        {
            echo "Record updated successfully";
        } 
        else 
        {
            echo "No record found mtahcing that id";
        }
    } 
    else 
    {
        echo "Error updating record: " . $conn->error;
    }



//close connection
$conn->close();
?>