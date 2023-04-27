<?php
// Connect to database
include('connectToDatabase.php');

// Retrieve the id parameter from the POST array
$id = $_POST['id'];

// Construct the delete query $sql = mysqli_query($conn, "DELETE FROM user_register WHERE id = '$id'");
$sql = "DELETE FROM user_register WHERE id = '$id'";

// Execute the delete query
if (mysqli_query($conn, $sql)) {
    /* echo "Record deleted successfully"; */
    header("Location: index.php");
    exit;
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
