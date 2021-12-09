 <?php
 session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
  <title>PHP File Upload</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <center>
    <?php
    if (isset($_SESSION['message']) && $_SESSION['message'])
    {
      printf('<b>%s</b>', $_SESSION['message']);
      unset($_SESSION['message']);
    }
    ?>

    <form method="POST" action="upload.php" enctype="multipart/form-data">
      <div>
        <span>Upload a File:</span>
        <br><br>
        <div class="upload-form">
          <input type="file" name="uploadedFile" />
        </div>
      </div>
      <br><br><br>

      <input type="submit" name="uploadBtn" value="Upload" />
      <br><span>Take your link :</span>
      <?php 
      try {
       printf('<b>%s</b>', $_SESSION['link']);
       unset($_SESSION['link']);
     }
     catch(Exception $e) {
      echo '';
    }

    ?>


  </form></center>
</body>
</html>