<?php

include('connect.php');;

// Get class and student details
$kelas = $_GET['kelas'] ?? ''; // Optionally use a default value if not provided

$sql = "SELECT * FROM students  JOIN classes ON students.class_id = classes.id WHERE class_id = $kelas";
$students_result = $conn->query($sql);

$student_array = [];
if ($students_result->num_rows > 0) {
    // Fetch the text block
    $row = $students_result->fetch_assoc();
    $fullText = $row['student_name'];
    $class = $row['class_name'];

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
    // Fetch the text block
    // $row = $subjects_result->fetch_assoc();

    while( $row = $subjects_result->fetch_assoc()){
        $list_subjects_array[] = $row;
    }



    // $fullTextSub = $row['objective'];
    // $fullTextNilai = $row['nilai'];

    // Explode the text block by newlines into an array
    // $objective_array = explode("\t", $fullTextSub);

    // // Output each line
    // foreach ($objective_array as $line) {
    //     // echo $line . "<br>";
    // }
} else {
    echo "No data found.";
}
// print_r($list_subjects_array);
// print_r($list_subjects_array[0]['id']);

// while ($row = $subjects_result->fetch_assoc()) {
//     $objective_array[$row['subject_name']][] = [
//         'objective' => $row['objective'],
//         'grade' => $row['nilai'],
//     ];
// }

// echo $objective_array[];

// echo json_encode($objective_array);

// $subject_stmt->close();
$conn->close();
?>

<!-- Your HTML and logic for displaying -->


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>

</head>

<style type="text/css">
  @media print {
    .pagebreak { page-break-before: always; } /* page-break-after works, as well */
  }
</style>
<?php

    $objective_array = [];

    for ($i=1; $i < 100; $i++) { 
      if (isset($list_subjects_array[$i])) {
          if ($list_subjects_array[$i]['objective'] != null) {
            $subjectName_array[$i] = $list_subjects_array[$i]['subject_name'];
            $nilaiArray[$i] = $list_subjects_array[$i]['nilai'];
            $objective_array[$i] = explode("\t",$list_subjects_array[$i]['objective']);
          }
      }
    }

    for ($i=0; $i < count($list_subjects_array); $i++) { 
            $subjectName_array[$i] = $list_subjects_array[$i]['subject_name'];
            $nilaiArray[$i] = $list_subjects_array[$i]['nilai'];
            $objective_array[$i] = explode("\t",$list_subjects_array[$i]['objective']);
    }

    

    // echo $subjectName_array[1];
    // echo $objective_array[1][1];
    // print_r($nilaiArray[1]);

    ?>


<style type="text/css">
  table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    font-size: 12px;
    padding:5px;
  }

  .borderless{
    border: 0px solid black !important;
    font-size: 15px;
  }

  h3{
    margin: 0px;
    padding: 0px;
  }

</style>
<body style="width:90%; padding-left:4%">

  <?php for ($x=0; $x < count($lines); $x++) { 

    ?>
    <!-- --------------- start lampiran -->
    <div class="row">
     <img src="Logo.png" style="max-width: 100%;">
     <h4 style="text-align:center">Holistic Progress Report</h4>
   </div>

   <table class="borderless" style="width:100%; border: 0px !important">

    <tr class="borderless">

      <td class="borderless" style="width:20%">Student Name</td>
      <td class="borderless" style="width:50%">: <?php echo $lines[$x] ?></td>
      <td class="borderless" style="width:30%">Semester 1 AY 2024/2025</td>


    </tr>
    <tr class="borderless">
      <td class="borderless">Class</td>
      <td class="borderless">: <?php echo $class ?></td>
      <td class="borderless">Term : 2</td>

      
    </tr>
  </table>
  <br>




<table style="width:100%">

    <tr>
      <td colspan="1" class="text-left"><h4 style="padding:0px; margin: 0px;">SUBJECT</h4></td> 
      <td colspan="4" style="text-align:center">
        Formative Assessment
      </td>
    </tr>
    <tr>
      <td style="width:60%" class="text-left"><h5 style="padding:0px; margin: 0px;">Learning Outcome</h5></td> 
      <td style="width:10%; text-align: center;">
        A
      </td>
      <td style="width:10%;text-align: center;">
        B
      </td>
      <td style="width:10%;text-align: center;">
        C
      </td>
      <td style="width:10%;text-align: center;">
        D
      </td>
    </tr>


    <?php for ($i=0; $i < count($objective_array); $i++) { 
      $checkNilai = 0;
      // echo $objective_array[];
      ?>
      

        <?php 

        $checkNilai = 0;

        $nilai_explode_stu = explode("\n",$nilaiArray[$i]);
        $nilai_explode_stu = 

        $nilai_final = explode("\t",$nilai_explode_stu[$x]);

        for ($d=0; $d < count($nilai_final); $d++) { 
          $checkNilai += (float)$nilai_final[$d];
        }
        //echo $checkNilai;

        if($checkNilai!=0){
          ?>
          <tr id="subnameverif<?php echo $i; ?>">
          <td colspan="5"><h4 style="margin:0px; padding:0px"><?php echo $subjectName_array[$i]; ?></h4></td>
        </tr>
          <?php
        }

        if($checkNilai!=0)
      for ($obj=0; $obj < count($objective_array[$i]); $obj++) { 
        ?>
        <tr>
          <td>
            <?php echo $objective_array[$i][$obj]; ?>
               <?php // echo $nilai_final[$obj]; ?>
          </td>
          <td style="text-align:center">
            <img src="centang.png" style="max-width:20px;
            <?php 
              if ($nilai_final[$obj] < 91) {
                ?> display:none <?php

              }
            ?>
            ">
            
          </td> 
          <td style="text-align:center">
            <img src="centang.png" style="max-width:20px;
            <?php 
              if ($nilai_final[$obj] > 90 || $nilai_final[$obj] < 83) {
                ?> display:none <?php
              }
            ?>
            ">
          </td> 
          <td style="text-align:center">
            <img src="centang.png" style="max-width:20px;
            <?php 
              if ($nilai_final[$obj] > 82 || $nilai_final[$obj] < 75) {
                ?> display:none <?php
              }
            ?>
            ">
          </td> 
          <td style="text-align:center">
            <img src="centang.png" style="max-width:20px;
            <?php 
              if ($nilai_final[$obj] > 74 || $nilai_final[$obj] <= 0) {
                ?> display:none <?php
              }
            ?>
            ">
          </td> 
         
        </tr>
        <?php
      }
      ?>

    <?php } ?>

    


<!-- -------------------------------------------------- -->

    <tr>
      <td colspan="5" style="padding: 10px;">
       Formative Assessment Conversion Grades :<br>
       A: (91-100)<br>
       B: (83-90)<br>
       C: (75-82)<br>
       D: (≤74)<br>

     </td>
   </tr>

 </table>



 <div class="pagebreak"> </div>
 <!-- --------------- end lampiran -->
 <?php
} ?>

</body>
</html>
