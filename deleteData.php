<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<?php

include('connect.php');

// Get form data
$classid = $_GET['kelas'];

$id = $classid; // Specify the ID of the row to update
$newValue = "1"; // New value for the column

// SQL query to update one column
$sql = "UPDATE classes SET deleted = ? WHERE id = ?";

// Prepare and bind
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $newValue, $id); // "si" stands for string and integer

// Execute the statement
if ($stmt->execute()) {
    echo "Record Removed successfully!";
} else {
    echo "Error updating record: " . $conn->error;
}

// Close statement and connection
$stmt->close();
$conn->close();


?>

<a class="btn btn-warning" href="index.php">Back</a>