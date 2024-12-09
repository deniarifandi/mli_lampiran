<?php
// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$db = "lampiran";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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
        $subject_name = trim($_POST["subject$i"]);
        $objective = trim($_POST["objective$i"]);
        $nilai = trim($_POST["nilai$i"]);

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