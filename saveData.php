<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<?php

include('connect.php');

// Get form data
$class_name = $_POST['kelas'];
$student = $_POST['student']; // Split students by new lines

// Insert class into classes table
$stmt = $conn->prepare("INSERT INTO classes (class_name) VALUES (?)");
$stmt->bind_param("s", $class_name);
$stmt->execute();
$class_id = $conn->insert_id;

// Insert students into students table
$stmt = $conn->prepare("INSERT INTO students (class_id, student_name) VALUES (?, ?)");

    $stmt->bind_param("is", $class_id, $student);
    $stmt->execute();


// Insert subjects into subjects table
for ($i = 1; $i < 100; $i++) {
    if (!empty($_POST["subject$i"])) {
        $subject_name = $_POST["subject$i"];
        $objective = $_POST["objective$i"];
        $nilai = $_POST["nilai$i"];

        $stmt = $conn->prepare("INSERT INTO subjects (class_id, subject_name, objective, nilai) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $class_id, $subject_name, $objective, $nilai);
        $stmt->execute();
    }
}

$stmt->close();
$conn->close();

echo "Data saved successfully!";

?>

<a class="btn btn-warning" href="index.php">Back</a>