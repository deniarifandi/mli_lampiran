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
      <br>
      <br>
      <br>
      <h1>Converter Ma bro!</h1>

      <br>
      <br>

       <form action="print.php" method="POST">

      <div class="row">
        
        <div class="col-md-12">
          <h2>Class</h2>
          <input type="text" style="width:100%" rows="10" name="kelas" value="P1A" class="form-control"></input>
        </div>
        <br><br><br><br><br>
        <div class="col-md-12">
          <h2>Student (1 line per student)</h2>
          <textarea style="width:100%" rows="10" name="student" class="form-control">AITO JUNA JAZZVIKO BASTIAN
ARENDT LANA AVIE
CHLEO SUMMER DANIELLE BELL
DANIELLA RUTH EMMA PESIK
EDGAR MAHVEEN HARDINOTO
GILBERT NATHANIO HIDAYAT
GLORYANA AILSIE WIBOWO
GWYNN MISCHA NIKOLA
JACELLYNE ECCLESIE GWEEN R.P.
JASON ALEXANDER ENOVAN
MARC ETHAN WIJAYA
MAXIMILIAN KEENAN GANAPATIH R.
NADHERA ANEZKA IRAWAN
RE ARDHANARESWARI SRIWIYARTI S.
REINO SUGIHARTO
REVALINA ERCILIA WINATA
RICHMOND SONY PRAYOGO
ROBIN BASTIAN HERMAWAN
SEAN IMMANUEL WIJAYA
SKYLER PADRIC WIJAYA
WENING PUTRI GEMA
WILSON NUGROHO</textarea>
        </div>

      </div>

      <br>
      <br>
      <!-- Start Input English -->
      <div class="row">
        
        <div class="col-md-12">
          <h2>Objective English (1 line per objective)</h2>
          <textarea style="width:100%" rows="10" name="objective" class="form-control">Kegiatan Psikomotor Term 1  Memahami Teknik dasar bola besar dalam permainan bola basket(Dribbling) 
Memahami Teknik dasar bola besar dalam permainan bola basket(Shooting)  
Memahami gerak dasar psikomotor dalam olahraga Atletik (Atletik Modification) 
Memahami gerak dasar psikomotor dalam olahraga Atletik (Long Jump)
          </textarea>
        </div>

      </div>

      <br>
      <br>

       <div class="col-md-12">
          <h2>Nilai English (1 line per anak)</h2>
          <textarea style="width:100%" rows="10" name="nilai" class="form-control">90  81  90  81
89  90  89  90
88  88  88  88
82  93  82  93
88  81  88  81
80  94  80  94
84  88  84  88
88  87  88  87
80  87  80  87
81  80  81  80
90  81  90  81
91  83  91  83
91  86  91  86
89  92  89  92
89  90  89  90
92  86  92  86
88  81  88  81
91  84  91  84
87  89  87  89
92  88  92  88
89  90  89  90
91  90  91  90</textarea>
        </div>
        <br>
        <!-- End Input English -->

          <!-- Start Input Science -->
      <div class="row">
        
        <div class="col-md-12">
          <h2>Objective Science (1 line per objective)</h2>
          <textarea style="width:100%" rows="10" name="objectiveSci" class="form-control"></textarea>
        </div>

      </div>

      <br>
      <br>

       <div class="col-md-12">
          <h2>Nilai Science (1 line per anak)</h2>
          <textarea style="width:100%" rows="10" name="nilaiSci" class="form-control"></textarea>
        </div>
        <br>
        <!-- End Input Science -->

        <input class="btn btn-success" type="submit" id="submit_button" style="font-size: 30px; float: right;">

        <br>
        <br>
        <br>

    </div>



  </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>