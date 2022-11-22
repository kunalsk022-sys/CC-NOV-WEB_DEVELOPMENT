
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
          </div>
          <a download="<?php echo $contents; ?>" href="converted_files/<?php echo $contents; ?>" class="btn btn-primary" name="submit">DOWNLOAD</a>
        </div>
      </div>
    </div>
  </div>
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
