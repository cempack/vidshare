<?php
session_start();

function random_str(
  int $length = 64,
  string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
): string {
  if ($length < 1) {
    throw new \RangeException("Length must be a positive integer");
  }
  $pieces = [];
  $max = mb_strlen($keyspace, '8bit') - 1;
  for ($i = 0; $i < $length; ++$i) {
    $pieces []= $keyspace[random_int(0, $max)];
  }
  return implode('', $pieces);
}

$random = random_str(16);

$message = ''; 
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload')
{
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // sanitize file-name
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

    // check if file has one of the following extensions
    $allowedfileExtensions = array('png');

    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved
      $uploadFileDir = './videos/';
      $dest_path = $uploadFileDir . $newFileName;

      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      {

        $dst = "$random";
        if (!file_exists($dst) && !is_dir($dst)) 
        {
          mkdir($random);
          copy('play.php', "$random/index.php");
          $nom_file = "$random/fichier.txt";
          $texte = "$newFileName";

    // création du fichier
          $f = fopen($nom_file, "x+");
    // écriture
          fputs($f, $texte );
    // fermeture
          fclose($f);
          $message ='File is successfully uploaded.';
        }
        else $message = 'There was some error , please retry';
        unlink("videos/$newFileName");
        
      }
      else 
      {
        $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
      }
    }
    else
    {
      $message = 'Upload failed. Allowed file type: ' . implode(',', $allowedfileExtensions);
    }
  }
  else
  {
    $message = 'There is some error in the file upload. Please check the following error.<br>';
    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
  }
}
$link = "url.com/$random";
$_SESSION['message'] = $message;
$_SESSION['random'] = $random;
$_SESSION['fileType'] = $fileType;
$_SESSION['link'] = $link;
header("Location: index.php");