<html>
<body>
  <form action="" method="post"  enctype="multipart/form-data">
   <input type="file" class="form-control-file" id="thumbnail" name="thumbnail" required accept="image/*">
<input type="submit" name="submit" value="submit"/>
</form>
</body>
</html>
<?php

if (isset($_POST['submit'])) {
$thumbnail_path = "img/thumbnail/";

if (isset($_FILES['thumbnail']['tmp_name'])) 
{

  $thumbnail_name = basename($_FILES['thumbnail']['name']);

 $thumbnail_destination = $thumbnail_path . $thumbnail_name;


    $tmp_path = $_FILES['thumbnail']['tmp_name'];
move_uploaded_file($tmp_path, $thumbnail_destination);
    echo "Temporary path of the uploaded image: " . $tmp_path;
} else {
    echo "No file uploaded or an error occurred.";
}
}
?>