
<?php
// Database connection
$servername = "localhost"; // Change as per your DB settings
$username = "root";        // Change as per your DB settings
$password = "";            // Change as per your DB settings
$dbname = "lampiran";        // Change as per your DB name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get class and student details
$kelas = $_GET['kelas'] ?? ''; // Optionally use a default value if not provided

$sql = "SELECT students.student_name, classes.class_name, classes.id as class_id FROM students  JOIN classes ON students.class_id = classes.id WHERE class_id = $kelas";
$students_result = $conn->query($sql);

$student_array = [];
if ($students_result->num_rows > 0) {
    // Fetch the text block
    $row = $students_result->fetch_assoc();
    $fullText = $row['student_name'];
    $class = $row['class_name'];
    $classid = $row['class_id'];

    // Explode the text block by newlines into an array
    $lines = explode("\n", $fullText);

    // Output each line
    foreach ($lines as $line) {
        // echo $line . "<br>";
    }
} else {
    echo "No data found.";
}

// echo $lines[0];

$sql2 = "SELECT * FROM subjects WHERE class_id = $kelas";
$subjects_result = $conn->query($sql2);

$objective_array = [];

if ($subjects_result->num_rows > 0) {


    while( $row = $subjects_result->fetch_assoc()){
        $list_subjects_array[] = $row;
    }

} else {
    echo "No data found.";
}

$conn->close();
?>

<!-- Your HTML and logic for displaying -->

<?php

    $objective_array = [];

  
    for ($i=0; $i < count($list_subjects_array); $i++) { 
            $subjectName_array[$i] = $list_subjects_array[$i]['subject_name'];
            $nilaiArray[$i] = $list_subjects_array[$i]['nilai'];
            $objective_array[$i] = $list_subjects_array[$i]['objective'];
    }

  

    ?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <div class="container"> 
    <h1>Converter Ma bro!</h1>
    <br><br>
    <form action="updateData.php" method="POST">
      <div class="row">
        <div class="col-md-12">
          <h2>Class</h2>
          <input type="text" style="width:100%" rows="10" name="kelas" class="form-control" value="<?php echo $class; ?>"></input>
          <input type="text" style="width:100%" rows="10" name="kelasid" class="form-control" value="<?php echo $classid; ?>" readonly></input>
        </div>
        <div class="col-md-12">
          <h2>Student (1 line per student)</h2>
          <textarea style="width:100%" rows="10" name="student" class="form-control"><?php echo $fullText; ?></textarea>
        </div>
      </div>
      <br>

      <?php for ($i=1; $i < 100; $i++) { ?>
      
      <?php if (isset($subjectName_array[$i-1])) {
        ?>
      <div id="content_subject<?php echo $i; ?>">
      <?php } else{ ?>
      <div id="content_subject<?php echo $i; ?>" style="display: none;">
      <?php }?>

         <h3 style="color: red;">Subject ke <?php echo $i; ?></h3>
         <hr>
         <!-- Start Input 1 -->
         <div class="row">

          <div class="col-md-12">
           <h2>Nama Subject</h2>
           <input type="text" name="subject<?php echo $i; ?>" value="<?php if(isset($subjectName_array[$i-1])) echo $subjectName_array[$i-1];?>" class="form-control">
          </div>
           <br>
           <br>

           <div class="col-md-12">
            <h2>Objective (direct copy)</h2>
            <textarea style="width:100%" rows="10" name="objective<?php echo $i; ?>" class="form-control"><?php if(isset($subjectName_array[$i-1])) echo $objective_array[$i-1]; ?></textarea>
           </div>

          </div>
          <div class="col-md-12">
            <h2>Nilai (direct copy)</h2>
            <textarea style="width:100%" rows="10" name="nilai<?php echo $i; ?>" class="form-control"><?php if(isset($subjectName_array[$i-1])) echo $nilaiArray[$i-1] ?></textarea>
          </div>
          <br>
          <br><br><br><br>
      </div>
      <!-- End Input 1 -->

      <?php } ?>

       <a class="btn btn-warning" type="button" id="addsubject" style="font-size: 30px; width:100%;  float: right;" onclick="addSubject()">Add subject</a>
       <br>
       <br><br><br><br><br>
  <input class="btn btn-success" type="submit" id="submit_button" style="font-size: 30px; float: right;">
  <br><br>
</div>



</form>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


<script type="text/javascript">
  
  var index = <?php echo count($list_subjects_array)+1; ?>;

  function addSubject(){
    document.getElementById("content_subject"+index).style.display = "";
    index++;
    }

</script>