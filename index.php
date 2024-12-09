
<?php

include('connect.php');;

$sql = "SELECT * FROM classes where deleted = 0 order by class_name";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
  
 while( $row = $result->fetch_assoc()){
    $list_hasil_array[] = $row;
}
} else {
  echo "0 results";
}

// print_r($hasil_array);

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
    <h1>Converter Ma bro v2.0</h1>
    <br><br>
    
    
      <a class="btn btn-success" href="insert.php">Tambah Data</a>
      <br><br>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
          <th>No</th>
          <th>Kelas</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>

          <?php for ($i=0; $i < count($list_hasil_array); $i++) { 
            ?>
            <tr>
              <td><?php echo $i+1; ?></td>
              <td><?php echo $list_hasil_array[$i]['class_name'] ?></td>
              <td>
                <a class="btn btn-primary" href="edit.php?kelas=<?php echo $list_hasil_array[$i]['id'] ?>">Edit</a>
                <a class="btn btn-success" target="_blank" href="print.php?kelas=<?php echo $list_hasil_array[$i]['id'] ?>">Print</a>
                <a class="btn btn-danger" href="deleteData.php?kelas=<?php echo $list_hasil_array[$i]['id'] ?>">Hapus</a>
              </td>
            </tr>
            <?php 
          } ?>

          

        </tbody>
      </table>


   

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