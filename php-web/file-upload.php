<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $file_name = $_FILES['upload_file']['name'];
  $file_type = $_FILES['upload_file']['type'];
  $file_size = $_FILES['upload_file']['size'];
  $file_tmp_name = $_FILES['upload_file']['tmp_name'];
  $file_error = $_FILES['upload_file']['error'];

  move_uploaded_file($file_tmp_name, __DIR__ . "/files/$file_name");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') : ?>
    <table>
      <tr>
        <td>File Name</td>
        <td><?= $file_name ?></td>
      </tr>
      <tr>
        <td>File Type</td>
        <td><?= $file_type ?></td>
      </tr>
      <tr>
        <td>File Size</td>
        <td><?= $file_size ?></td>
      </tr>
      <tr>
        <td>File Temporary Name</td>
        <td><?= $file_tmp_name ?></td>
      </tr>
      <tr>
        <td>File Error</td>
        <td><?= $file_error ?></td>
      </tr>
    </table>
  <?php endif; ?>

  <form action="file-upload.php" method="POST" enctype="multipart/form-data">
    <label>File :
      <input type="file" name="upload_file">
    </label>

    <button type="submit">Upload</button>
  </form>
</body>

</html>