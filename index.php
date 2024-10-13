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
    <form action="print.php" method="POST" target="_blank">
      <div class="row">
        <div class="col-md-12">
          <h2>Class</h2>
          <input type="text" style="width:100%" rows="10" name="kelas" class="form-control"></input>
        </div>
        <div class="col-md-12">
          <h2>Student (1 line per student)</h2>
          <textarea style="width:100%" rows="10" name="student" class="form-control"></textarea>
        </div>
      </div>
      <br>

      <?php for ($i=1; $i < 100; $i++) { ?>
     
      <div id="content_subject<?php echo $i; ?>" style="display: none;">
         <h3 style="color: red;">Subject ke <?php echo $i; ?></h3>
         <hr>
         <!-- Start Input 1 -->
         <div class="row">

          <div class="col-md-12">
           <h2>Nama Subject</h2>
           <input type="text" name="subject<?php echo $i; ?>" class="form-control">
          </div>
           <br>
           <br>

           <div class="col-md-12">
            <h2>Objective (1 line per objective)</h2>
            <textarea style="width:100%" rows="10" name="objective<?php echo $i; ?>" class="form-control"></textarea>
           </div>

          </div>
          <div class="col-md-12">
            <h2>Nilai (direct copy)</h2>
            <textarea style="width:100%" rows="10" name="nilai<?php echo $i; ?>" class="form-control"></textarea>
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
  
  var index = 1;

  function addSubject(){
    document.getElementById("content_subject"+index).style.display = "";
    index++;
    }

</script>