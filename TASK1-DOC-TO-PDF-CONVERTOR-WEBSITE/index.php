<?php

include("vendor/autoload.php");

use \ConvertApi\ConvertApi;
ConvertApi::setApiSecret('j4NE0w5TnbgBlp5q');

$msg = "";
$contents = "";
$filename = "";


if(isset($_POST["submit"])){
   
   $filename = $_FILES["formFile"]["name"];
   $filepath = $_FILES["formFile"]["full_path"];
   $filetype = $_FILES["formFile"]["type"];
   $filetmp = $_FILES["formFile"]["tmp_name"];
   $dir = 'uploads/' .$filename;

   if ($filetype == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
        move_uploaded_file($filetmp,$dir);
        $result = ConvertApi::convert('pdf', [
          'File' => $dir,
      ], 'docx'
  );
  $result->saveFiles('converted_files');
  //$contents = $result->getFile()->getContents();

  if ($result){
    $msg = "<div class='alert alert-danger'>FILE CONVERTED</div>";
  
  }else{
    $msg = "<div class='alert alert-danger'>SOMETHING WRONG</div>";
  }
       
   }else{
    $msg = "<div class='alert alert-danger'>INVALID FILE FORMAT</div>";
   }
}
?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <title>DOCX to PDF - by KUNAL</title>
</head>

<body>
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-5 mx-auto">
        <div class="card border p-4 rounded bg-white">
          <div class="card-body">
            <h3 class="card-title mb-3">DOCX to PDF converter</h3>
            <?php echo $msg; ?>
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="formFile" class="form-label">Browse your file</label>
                <input class="form-control" type="file" id="formFile" name="formFile" required>
              </div>
              <button class="btn btn-primary" name="submit">Convert Now</button>
            </form>
          </div>
        </div>
       
       <?php
        
        $filename = str_replace(".docx",".pdf",$filename);
        echo '<a href="converted_files\\'.$filename.'"download>Download PDF Now</a>';

      ?>
      
      </div>
    </div>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
