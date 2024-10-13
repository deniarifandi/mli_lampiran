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

    $student_array = explode("\n",$_POST['student']);

    // all obje
    $objective_array = [];

    for ($i=1; $i < 100; $i++) { 
      if (isset($_POST['objective'.$i])) {
          if ($_POST['objective'.$i] != null) {
            $objective_array[$i] = explode("\n",$_POST['objective'.$i]);
          }
      }
    }

    // // all nilai
    // $nilai_array = [];

    // for ($i=1; $i < 100; $i++) { 
    //   if (isset($_POST['nilai'.$i])) {
    //       if ($_POST['nilai'.$i] != null) {
    //         $nilai_array[$i] = explode("\t",$_POST['nilai'.$i]);
    //       }
    //   }
    // }

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

  <?php for ($x=0; $x < count($student_array); $x++) { 

    ?>
    <!-- --------------- start lampiran -->
    <div class="row">
     <img src="Logo.png" style="max-width: 100%;">
     <h4 style="text-align:center">Holistic Progress Report</h4>
   </div>

   <table class="borderless" style="width:100%; border: 0px !important">

    <tr class="borderless">
      <td class="borderless" style="width:20%">Student Name</td>
      <td class="borderless" style="width:50%">: <?php echo $student_array[$x] ?></td>
      <td class="borderless" style="width:30%">Semester 1 AY 2024/2025</td>


    </tr>
    <tr class="borderless">
      <td class="borderless">Class</td>
      <td class="borderless">: <?php echo $_POST['kelas']; ?></td>
      <td class="borderless">Term : 1</td>

      
    </tr>
  </table>
  <br>


  <table style="width:100%">

    <tr>
      <td colspan="1" class="text-left"><h4 style="padding:0px; margin: 0px;">SUBJECT</h4></td> 
      <td colspan="4">
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
      ?>
      

        <?php 

        $checkNilai = 0;

        $nilai_explode_stu = explode("\n",$_POST['nilai'.$i+1]);
        $nilai_final = explode("\t",$nilai_explode_stu[$x]);

        for ($d=0; $d < count($nilai_final); $d++) { 
          $checkNilai += (float)$nilai_final[$d];
        }
        //echo $checkNilai;

        if($checkNilai!=0){
          ?>
          <tr id="subnameverif<?php echo $i+1; ?>">
          <td colspan="5"><h4 style="margin:0px; padding:0px"><?php echo $_POST['subject'.$i+1]; ?></h4></td>
        </tr>
          <?php
        }

        if($checkNilai!=0)
      for ($obj=0; $obj < count($objective_array[$i+1]); $obj++) { 
        ?>
        <tr>
          <td>
            <?php echo $objective_array[$i+1][$obj]; ?>
               <?php // echo $nilai_final[$obj]; ?>
          </td>
          <td>
            <img src="centang.png" style="max-width:20px;
            <?php 
              if ($nilai_final[$obj] < 91) {
                ?> display:none <?php
              }
            ?>
            ">
          </td> 
          <td>
            <img src="centang.png" style="max-width:20px;
            <?php 
              if ($nilai_final[$obj] > 90 || $nilai_final[$obj] < 83) {
                ?> display:none <?php
              }
            ?>
            ">
          </td> 
          <td>
            <img src="centang.png" style="max-width:20px;
            <?php 
              if ($nilai_final[$obj] > 82 || $nilai_final[$obj] < 75) {
                ?> display:none <?php
              }
            ?>
            ">
          </td> 
          <td>
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